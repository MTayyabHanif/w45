!function(e){typeof define=="function"&&define.amd?define(e):Index=e()}(function(){return function(e,t){var n={version:"1.0.5",loop:!1,removed:[],added:[],active:[],first:t||0,last:e,span:e-(t||0)+1,back:[],set:function(e){n.curr=r(e);var t=[n.curr];return(n.prev=n.curr-1)<n.first||t.unshift(n.prev),(n.next=n.curr+1)>n.last||t.push(n.next),n.prev=r(n.prev),n.next=r(n.next),typeof _=="function"&&(n.removed=_.difference(n.active,t),n.added=_.difference(t,n.active)),n.active=t,n.back[0]&&(n.direction=n.curr>n.back[0].prev?1:-1),n.back.unshift({prev:n.prev,curr:n.curr,next:n.next}),n}},r=function(e){return n.loop?e>n.last?n.first:e<n.first?n.last:e:Math.min(Math.max(e,n.first),n.last)};return n}});