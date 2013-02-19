!function(factory) {

	if(typeof define === 'function' && define.amd) define(['jquery'], factory);
	else TogglePanel = factory(jQuery);
}
(function($) {

	var count = 0,
		name = 'TogglePanel',
		namespace = 'togglepanel',
		hyphenNamespace = 'toggle-panel',
		timeouts = [],
		isIpad = !!navigator.userAgent.match(/iPad/i),
		$window = $(window),
		$html = $(document.documentElement).addClass('js'),
		$body = $(document.body);

	// http://stackoverflow.com/questions/3046791/inserting-html5-video-using-javascript-for-ipad
	function fixIpadVideo(context) {

		Array.prototype.slice.call(context.querySelectorAll('video')).forEach(function(video) {

			video.parentNode.insertBefore(video.cloneNode(true), video);
			video.parentNode.removeChild(video);
		});
	}

	$.fn[name] = function(options) {

		function F(element, options) {

			var idNamespace = hyphenNamespace + '-' + count++,
				deferred = $.Deferred(),
				$element = $(element),
				ariaControls = $element.attr('aria-controls'),
				$header = ariaControls ? $element : $element.children().first(),
				$content = ariaControls ? $('#' + ariaControls) : $element.children().slice(1);

			$content = $content
			.wrapAll('<div><div></div></div>')
			.parent()
			.parent()
			.addClass(hyphenNamespace + '-content');

			if(isIpad) fixIpadVideo(element);

			// merge defaults and options
			options = $.extend(true, {
				ajax: {
					enabled: $element.hasClass('ajax'),
					message: {
						defaultError: 'An error occured. Please try again later.',
						notFound: '404: The requested content could not be found.',
						timeout: 'The requested content could not be delivered in a timely fashion.',
					},
					retry: {
						times: 2,
					},
					selector: '[role="main"] > *',
				},
			},
			options);

			// options set via data attributes take precedence

			if(options.ajax.enabled) {

				if(!options.ajax.settings || !options.ajax.settings.url) {
				
					var $anchor = $content.children().find('a');

					options.ajax.settings.url = $anchor.attr('href');

					if($anchor.data('ajax-selector')) options.ajax.selector = $anchor.data('ajax-selector');
				}

				$.ajaxPrefilter(function(options, originalOptions, jqXHR) {

					if(typeof jqXHR.retry !== 'function') jqXHR.retry = function() { return this; };
				});
			}

			if($header.data('expanded-text')) options.expandedText = $header.data('expanded-text');
			if(options.expandedText) options.collapsedText = $header.html();

			var self = {
					version: '1.0.0',

					destroy: function() {

						for(var i=0; i < timeouts.length; i++) clearTimeout(timeouts[i]);

						$header.removeAttr('role')

						if(!ariaControls) $header.removeAttr('aria-controls');

						$content
						.removeClass('transition')
						.children()
						.children()
						.unwrap()
						.unwrap();

						$element
						.removeAttr('aria-expanded tabindex')
						.removeClass('transition')
						.removeData(namespace)
						.filter('[id="' + idNamespace + '"]').removeAttr('id')
						.end()
						.add([window, document.body, $header[0]])
						.off('.' + idNamespace)
						.end()
						.trigger(namespace + 'destroy');

						return self;
					},

					collapse: function() {

						if(options.collapsedText) $header.html(options.collapsedText);

						$content.height(0);

						$element
						.attr('aria-expanded', element.ariaExpanded = false)
						.removeClass('expanded')
						.trigger(namespace + 'collapse');
	
						return self;
					},

					expand: function() {

						options.beforeExpand(deferred);

						deferred.always(function(html) {

							if(html)
							$content
							.children()
							.empty()
							.append(html);

							if(options.expandedText) $header.html(options.expandedText);

							$content.height($content.children().outerHeight());

							$element
							.attr('aria-expanded', element.ariaExpanded = true)
							.addClass('expanded')
							.trigger(namespace + 'expand');
						});

						return self;
					},

					toggle: function() {

						return self[element.ariaExpanded ? 'collapse' : 'expand']();
					},

					resize: function() {

						if(element.ariaExpanded) $content.height($content.children().outerHeight());

						return self;
					},

					extensions: {
						ajax: {
							load: function(deferred) {

								if(!element.ariaBusy && deferred.state() !== 'resolved' && deferred.state() !== 'rejected') {

									$element.attr({
										'aria-busy': element.ariaBusy = true,
										'aria-live': 'polite',
									});

									$.ajax(options.ajax.settings)
									.retry(options.ajax.retry)
									.always(function() {

										element.ariaBusy = false;
										$element.removeAttr('aria-busy');
									})
									.done(function(data) {

										deferred.resolve($('<html></html>').html(data).find(options.ajax.selector));
									})
									.fail(function(data) {

										deferred.reject('<p>' +
										({
											'Not Found': options.ajax.message.notFound,
											'timeout': options.ajax.message.timeout,
										}
										[data.statusText] || options.ajax.message.defaultError)
										+ '</p>');
									});
								}
							}
						},

						hashWatch: function() {

							var that = {
								changeHash: function(hash, $target) {

									var id = $target[0].id;

									$target[0].id = '';
									location.hash = hash;
									$target[0].id = id;

									return that;
								},

								expand: function(hash, event) {

									var $target = ('#' + element.id === hash ? $element : $element.find(hash));

									if($target.length) {

										if(event) event.preventDefault();

										self.expand();
										that.changeHash(hash, $target);

										setTimeout(function() {

											$html
											.add($body)
											.animate({
												scrollTop: $target.offset().top,
											});
										},
										250);
									}

									return that;
								},
							};
							
							$body
							// hash anchor activation
							.on('click.' + idNamespace, 'a[href^="#"]:not([href="#"])', function(event) {

								that.expand($(event.target).attr('href'), event);
							})
							// navigation e.g. back button
							.on('hashchange.' + idNamespace, function() {

								that.expand(location.hash);
							});

							return that.expand(location.hash);
						},

						pauseMedia: function() {

							$element.on(namespace + 'collapse.' + idNamespace, function() {

								$content
								.find('audio, video')
								.each(function() {

									this.pause();
								});
							});
						},

						saveState: function(storage) {

							if(typeof storage !== 'object') return;

							var that = {
								remove: function() {

									storage.removeItem(idNamespace);

									return that;
								},

								load: function() {

									var item = storage.getItem(idNamespace),
										data = JSON.parse(item);

									if(data && data.expanded) self.expand();

									return that;
								},

								save: function() {

									storage.setItem(idNamespace, JSON.stringify({expanded: element.ariaExpanded}));
								
									return that;
								},
							};

							// the iPad dynamic video element bug also disables the window.unload event, therefore we fallback to saving on every collapse and expand
							if(isIpad) $element.on(namespace + 'expand.'  + idNamespace + ' ' + namespace + 'collapse.' + idNamespace, that.save);
							else $window.on('unload.' + idNamespace, that.save);

							return that.load();
						},
					},
				};

			if(!options.beforeExpand) options.beforeExpand = options.ajax.enabled ? self.extensions.ajax.load : function(deferred) { deferred.resolve(); };

			($.resize ? $element : $window).on('resize.' + idNamespace, self.resize);

			$header
			.attr('role', 'button')
			.on('click.' + idNamespace, function(event) {

				event.preventDefault();

				self.toggle();
			});

			$element
			.attr('tabindex', 0)
			.on('keydown.' + idNamespace, function(event) {

				if(event.keyCode === 32 && event.target === element) self.toggle();
			});

			if(!$header.attr('aria-controls')) $header.attr('aria-controls', element.id || (element.id = idNamespace));

			timeouts.push(setTimeout(function() {

				self.collapse();

				if(options.hashWatch) self.extensions.hashWatch();
				if(options.pauseMedia) self.extensions.pauseMedia();
				if(options.saveState) self.extensions.saveState({'local': localStorage, 'session': sessionStorage}[options.saveState]);

				timeouts.push(setTimeout(function() {

					$content.addClass('transition');
					$element.addClass('transition');
				}));
			}));

			return self;
		}

		var args = Array.prototype.slice.call(arguments, 1);

		return this.each(function(index) {

			var $this = $(this);

			// method call : instantiation
			$this.data(namespace) ?
			(typeof $this.data(namespace)[options] === 'function' ? $this.data(namespace)[options].apply(this, args) : $.error(name + ' method name "' + options + '" does not exist.'))
			: $this.data(namespace, F(this, options));
		});
	}
});