(window.webpackJsonpruntime=window.webpackJsonpruntime||[]).push([[9],{reOo:function(t,e,i){"use strict";i.r(e),i.d(e,"init",function(){return I});var n=i("mnMc"),r=i.n(n),s=i("eLKs"),a=i.n(s),o=i("UtpJ"),h=i.n(o),c=i("0lTi"),l=i.n(c),u=i("RXMP"),d=i.n(u),f=i("a0dU"),g=i.n(f),m=i("OBge"),v=i.n(m),p=i("SPx3"),_=i.n(p),y=i("06Pm"),w=i.n(y),b=i("kA7L"),A=i.n(b),D=i("J66h"),L=function(){function t(e){var i=this,n=e.container;w()(this,t),this._positionHandlers={start:function(){i.handle.style.setProperty("left","0"),i._clipAfterImg(0)},center:function(t){i.handle.style.setProperty("left",""),i._clipAfterImg(t.width/2)},end:function(t){i.handle.style.setProperty("left","".concat(t.width,"px")),i._clipAfterImg(t.width)}},this.container=n,this.doc=this.container.ownerDocument.documentElement,this._initialized=this.initSizes();var r=this.handle.getBoundingClientRect();this.offset={left:r.width/2,top:r.height/2},this._bindMethods(),this.handle.style.setProperty("left",""),this.handle.addEventListener("touchstart",this.startDragging),this.handle.addEventListener("mousedown",this.startDragging),this.observer=new MutationObserver(this.updateData),this.observer.observe(this.container,{attributes:!0,childList:!1,subtree:!1})}return A()(t,[{key:"initSizes",value:function(){var t=_()(g.a.mark(function t(){return g.a.wrap(function(t){for(;;)switch(t.prev=t.next){case 0:return this.beforeImg=this.container.querySelector(".baf__img-preview.baf__before"),this.afterImg=this.container.querySelector(".baf__img-preview.baf__after"),this.innerAfterImg=this.afterImg.querySelector("img"),this.handle=this.container.querySelector(".baf__handle"),t.next=6,v.a.all([this._waitForImgLoad(this.beforeImg),this._waitForImgLoad(this.innerAfterImg)]);case 6:this._rePosition(),this.container.ownerDocument.defaultView.addEventListener("resize",this._rePosition),this.container.ownerDocument.defaultView.addEventListener("orientationchange",this._rePosition);case 9:case"end":return t.stop()}},t,this)}));return function(){return t.apply(this,arguments)}}()},{key:"release",value:function(){this.observer.disconnect(),this.handle.removeEventListener("touchstart",this.startDragging),this.handle.removeEventListener("mousedown",this.startDragging),this.container.ownerDocument.defaultView.removeEventListener("resize",this._rePosition),this.container.ownerDocument.defaultView.removeEventListener("orientationchange",this._rePosition),this._stopTrackingMouseEvents()}},{key:"startDragging",value:function(t){this.container.classList.add("baf__dragging"),this.container.classList.add("user-interacting"),this.containerRect=this.container.getBoundingClientRect();var e=this.handle.getBoundingClientRect(),i=E(t).clientX;this.handle.style.transform="translate(".concat(i-this.containerRect.left-e.width/2,"px, -50%)"),this.handle.style.left="",this._startTrackingMouseEvents()}},{key:"performUpdates",value:function(t){var e=E(t).clientX;this.movedTo=this._calculateMoveTo(e),this.handle.style.transform="translate(".concat(this.movedTo-this.offset.left,"px, -50%)"),this._clipAfterImg(this.movedTo)}},{key:"_calculateMoveTo",value:function(t){var e=t-this.containerRect.left,i=Math.max(0,e);return e>this.containerRect.width?this.containerRect.width:i}},{key:"updatesAfterDrag",value:function(){this.container.classList.remove("baf__dragging"),this.container.classList.remove("user-interacting"),this.handle.style.setProperty("transform",""),this.handle.style.setProperty("left","".concat(this.movedTo,"px")),this._stopTrackingMouseEvents()}},{key:"updateData",value:function(t){var e,i=this;d()(e=l()(t)).call(e,function(t){if("data-ext"===t.attributeName){var e=i.extractData();i.applyData(e)}})}},{key:"extractData",value:function(){return JSON.parse(D.Base64.decode(this.container.dataset.ext))}},{key:"applyData",value:function(t){var e=t.imgBefore,i=t.imgBeforeAlt,n=t.imgAfter,r=t.imgAfterAlt,s=t.beforeText,a=t.afterText,o=t.beforeTextVisible,h=t.afterTextVisible;this.beforeImg.src=e||this.beforeImg.src,this.beforeImg.setAttribute("alt",i),this.innerAfterImg.src=n||this.innerAfterImg.src,this.innerAfterImg.setAttribute("alt",r);var c=this.container.querySelector(".baf__title"),l=this.container.querySelector(".baf__title.baf__before");c.innerText=s,c.classList.toggle("baf__title--hidden",!o),l.innerText=a,l.classList.toggle("baf__title--hidden",!h),this._initialized=this.initSizes()}},{key:"_rePosition",value:function(){var t=getComputedStyle(this.container),e=t.width,i=t.height;this.afterImg.style.width=e,this.afterImg.style.height=i;var n=this.container.getBoundingClientRect();this.handle.style.setProperty("left","");var r=this.extractData().initialPosition;(this._positionHandlers[r]||this._positionHandlers.center)(n)}},{key:"_clipAfterImg",value:function(t){this.afterImg.style.transform="translate(".concat(t,"px, 0)"),this.innerAfterImg.style.transform="translate(-".concat(t,"px, 0)")}},{key:"_stopTrackingMouseEvents",value:function(){this.doc.removeEventListener("touchmove",this.performUpdates,{passive:!0,capture:!0}),this.doc.removeEventListener("mousemove",this.performUpdates,{passive:!0,capture:!0}),this.doc.removeEventListener("touchend",this.updatesAfterDrag,{capture:!0}),this.doc.removeEventListener("mouseup",this.updatesAfterDrag,{capture:!0})}},{key:"_startTrackingMouseEvents",value:function(){this.doc.addEventListener("touchmove",this.performUpdates,{passive:!0,capture:!0}),this.doc.addEventListener("mousemove",this.performUpdates,{passive:!0,capture:!0}),this.doc.addEventListener("touchend",this.updatesAfterDrag,{capture:!0}),this.doc.addEventListener("mouseup",this.updatesAfterDrag,{capture:!0})}},{key:"_waitForImgLoad",value:function(t){return new v.a(function(e){var i;t.onload=function(){window.requestAnimationFrame(e)},t.src=h()(i=t.src).call(i)})}},{key:"_bindMethods",value:function(){var t,e,i,n,r;this.startDragging=a()(t=this.startDragging).call(t,this),this.performUpdates=a()(e=this.performUpdates).call(e,this),this.updatesAfterDrag=a()(i=this.updatesAfterDrag).call(i,this),this.updateData=a()(n=this.updateData).call(n,this),this._rePosition=a()(r=this._rePosition).call(r,this)}}]),t}();L.displayName="BeforeAndAfter";var k={};function I(t){var e=l()(document.querySelectorAll(".dmBeforeAndAfter"));return d()(e).call(e,function(t){k[t.id]&&k[t.id].release(),k[t.id]=new L({container:t})}),k[(t||{}).id]||{}}function E(t){var e;return r()(e=t.type).call(e,"touch")?(t.touches||t.changedTouches)[0]:t}}}]);