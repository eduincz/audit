this.wp=this.wp||{},this.wp.mediaUtils=function(e){var t={};function n(r){if(t[r])return t[r].exports;var i=t[r]={i:r,l:!1,exports:{}};return e[r].call(i.exports,i,i.exports,n),i.l=!0,i.exports}return n.m=e,n.c=t,n.d=function(e,t,r){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(n.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var i in e)n.d(r,i,function(t){return e[t]}.bind(null,i));return r},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=402)}({0:function(e,t){!function(){e.exports=this.wp.element}()},1:function(e,t){!function(){e.exports=this.wp.i18n}()},12:function(e,t,n){"use strict";function r(e){if(void 0===e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return e}n.d(t,"a",(function(){return r}))},13:function(e,t,n){"use strict";n.d(t,"a",(function(){return a}));var r=n(36);var i=n(28),o=n(37);function a(e,t){return Object(r.a)(e)||function(e,t){if("undefined"!=typeof Symbol&&Symbol.iterator in Object(e)){var n=[],r=!0,i=!1,o=void 0;try{for(var a,c=e[Symbol.iterator]();!(r=(a=c.next()).done)&&(n.push(a.value),!t||n.length!==t);r=!0);}catch(e){i=!0,o=e}finally{try{r||null==c.return||c.return()}finally{if(i)throw o}}return n}}(e,t)||Object(i.a)(e,t)||Object(o.a)()}},15:function(e,t,n){"use strict";function r(e){return(r=Object.setPrototypeOf?Object.getPrototypeOf:function(e){return e.__proto__||Object.getPrototypeOf(e)})(e)}n.d(t,"a",(function(){return r}))},16:function(e,t,n){"use strict";n.d(t,"a",(function(){return a}));var r=n(26);var i=n(35),o=n(28);function a(e){return function(e){if(Array.isArray(e))return Object(r.a)(e)}(e)||Object(i.a)(e)||Object(o.a)(e)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}},17:function(e,t,n){"use strict";function r(e,t){for(var n=0;n<t.length;n++){var r=t[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}function i(e,t,n){return t&&r(e.prototype,t),n&&r(e,n),e}n.d(t,"a",(function(){return i}))},18:function(e,t,n){"use strict";function r(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}n.d(t,"a",(function(){return r}))},19:function(e,t,n){"use strict";function r(e,t){return(r=Object.setPrototypeOf||function(e,t){return e.__proto__=t,e})(e,t)}function i(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function");e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,writable:!0,configurable:!0}}),t&&r(e,t)}n.d(t,"a",(function(){return i}))},2:function(e,t){!function(){e.exports=this.lodash}()},20:function(e,t,n){"use strict";n.d(t,"a",(function(){return o}));var r=n(40),i=n(12);function o(e,t){return!t||"object"!==Object(r.a)(t)&&"function"!=typeof t?Object(i.a)(e):t}},23:function(e,t){!function(){e.exports=this.regeneratorRuntime}()},26:function(e,t,n){"use strict";function r(e,t){(null==t||t>e.length)&&(t=e.length);for(var n=0,r=new Array(t);n<t;n++)r[n]=e[n];return r}n.d(t,"a",(function(){return r}))},28:function(e,t,n){"use strict";n.d(t,"a",(function(){return i}));var r=n(26);function i(e,t){if(e){if("string"==typeof e)return Object(r.a)(e,t);var n=Object.prototype.toString.call(e).slice(8,-1);return"Object"===n&&e.constructor&&(n=e.constructor.name),"Map"===n||"Set"===n?Array.from(n):"Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)?Object(r.a)(e,t):void 0}}},35:function(e,t,n){"use strict";function r(e){if("undefined"!=typeof Symbol&&Symbol.iterator in Object(e))return Array.from(e)}n.d(t,"a",(function(){return r}))},36:function(e,t,n){"use strict";function r(e){if(Array.isArray(e))return e}n.d(t,"a",(function(){return r}))},37:function(e,t,n){"use strict";function r(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}n.d(t,"a",(function(){return r}))},38:function(e,t){!function(){e.exports=this.wp.apiFetch}()},40:function(e,t,n){"use strict";function r(e){return(r="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}n.d(t,"a",(function(){return r}))},402:function(e,t,n){"use strict";n.r(t),n.d(t,"MediaUpload",(function(){return h})),n.d(t,"uploadMedia",(function(){return M}));var r=n(18),i=n(17),o=n(12),a=n(20),c=n(15),l=n(19),u=n(2),s=n(0),f=n(1);function p(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Date.prototype.toString.call(Reflect.construct(Date,[],(function(){}))),!0}catch(e){return!1}}var d=window.wp,m=[],b=function(e){return Object(u.pick)(e,["sizes","mime","type","subtype","id","url","alt","link","caption"])},y=function(e){return d.media.query({order:"ASC",orderby:"post__in",post__in:e,posts_per_page:-1,query:!0,type:"image"})},h=function(e){Object(l.a)(s,e);var t,n=(t=s,function(){var e,n=Object(c.a)(t);if(p()){var r=Object(c.a)(this).constructor;e=Reflect.construct(n,arguments,r)}else e=n.apply(this,arguments);return Object(a.a)(this,e)});function s(e){var t,i=e.allowedTypes,a=e.gallery,c=void 0!==a&&a,l=e.unstableFeaturedImageFlow,u=void 0!==l&&l,p=e.modalClass,m=e.multiple,b=void 0!==m&&m,y=e.title,h=void 0===y?Object(f.__)("Select or Upload Media"):y;if(Object(r.a)(this,s),(t=n.apply(this,arguments)).openModal=t.openModal.bind(Object(o.a)(t)),t.onOpen=t.onOpen.bind(Object(o.a)(t)),t.onSelect=t.onSelect.bind(Object(o.a)(t)),t.onUpdate=t.onUpdate.bind(Object(o.a)(t)),t.onClose=t.onClose.bind(Object(o.a)(t)),c)t.buildAndSetGalleryFrame();else{var v={title:h,multiple:b};i&&(v.library={type:i}),t.frame=d.media(v)}return p&&t.frame.$el.addClass(p),u&&t.buildAndSetFeatureImageFrame(),t.initializeListeners(),t}return Object(i.a)(s,[{key:"initializeListeners",value:function(){this.frame.on("select",this.onSelect),this.frame.on("update",this.onUpdate),this.frame.on("open",this.onOpen),this.frame.on("close",this.onClose)}},{key:"buildAndSetGalleryFrame",value:function(){var e=this.props,t=e.addToGallery,n=void 0!==t&&t,r=e.allowedTypes,i=e.multiple,o=void 0!==i&&i,a=e.value,c=void 0===a?m:a;if(c!==this.lastGalleryValue){var l;this.lastGalleryValue=c,this.frame&&this.frame.remove(),l=n?"gallery-library":c&&c.length?"gallery-edit":"gallery",this.GalleryDetailsMediaFrame||(this.GalleryDetailsMediaFrame=d.media.view.MediaFrame.Post.extend({galleryToolbar:function(){var e=this.state().get("editing");this.toolbar.set(new d.media.view.Toolbar({controller:this,items:{insert:{style:"primary",text:e?d.media.view.l10n.updateGallery:d.media.view.l10n.insertGallery,priority:80,requires:{library:!0},click:function(){var e=this.controller,t=e.state();e.close(),t.trigger("update",t.get("library")),e.setState(e.options.state),e.reset()}}}}))},editState:function(){var e=this.state("gallery").get("selection"),t=new d.media.view.EditImage({model:e.single(),controller:this}).render();this.content.set(t),t.loadEditor()},createStates:function(){this.on("toolbar:create:main-gallery",this.galleryToolbar,this),this.on("content:render:edit-image",this.editState,this),this.states.add([new d.media.controller.Library({id:"gallery",title:d.media.view.l10n.createGalleryTitle,priority:40,toolbar:"main-gallery",filterable:"uploaded",multiple:"add",editable:!1,library:d.media.query(Object(u.defaults)({type:"image"},this.options.library))}),new d.media.controller.EditImage({model:this.options.editImage}),new d.media.controller.GalleryEdit({library:this.options.selection,editing:this.options.editing,menu:"gallery",displaySettings:!1,multiple:!0}),new d.media.controller.GalleryAdd])}}));var s=y(c),f=new d.media.model.Selection(s.models,{props:s.props.toJSON(),multiple:o});this.frame=new this.GalleryDetailsMediaFrame({mimeType:r,state:l,multiple:o,selection:f,editing:!(!c||!c.length)}),d.media.frame=this.frame,this.initializeListeners()}}},{key:"buildAndSetFeatureImageFrame",value:function(){var e=d.media.view.MediaFrame.Select.extend({featuredImageToolbar:function(e){this.createSelectToolbar(e,{text:d.media.view.l10n.setFeaturedImage,state:this.options.state})},editState:function(){var e=this.state("featured-image").get("selection"),t=new d.media.view.EditImage({model:e.single(),controller:this}).render();this.content.set(t),t.loadEditor()},createStates:function(){this.on("toolbar:create:featured-image",this.featuredImageToolbar,this),this.on("content:render:edit-image",this.editState,this),this.states.add([new d.media.controller.FeaturedImage,new d.media.controller.EditImage({model:this.options.editImage})])}}),t=y(this.props.value),n=new d.media.model.Selection(t.models,{props:t.props.toJSON()});this.frame=new e({mimeType:this.props.allowedTypes,state:"featured-image",multiple:this.props.multiple,selection:n,editing:!!this.props.value}),d.media.frame=this.frame}},{key:"componentWillUnmount",value:function(){this.frame.remove()}},{key:"onUpdate",value:function(e){var t=this.props,n=t.onSelect,r=t.multiple,i=void 0!==r&&r,o=this.frame.state(),a=e||o.get("selection");a&&a.models.length&&n(i?a.models.map((function(e){return b(e.toJSON())})):b(a.models[0].toJSON()))}},{key:"onSelect",value:function(){var e=this.props,t=e.onSelect,n=e.multiple,r=void 0!==n&&n,i=this.frame.state().get("selection").toJSON();t(r?i:i[0])}},{key:"onOpen",value:function(){if(this.updateCollection(),this.props.value){if(!this.props.gallery){var e=this.frame.state().get("selection");Object(u.castArray)(this.props.value).forEach((function(t){e.add(d.media.attachment(t))}))}y(Object(u.castArray)(this.props.value)).more()}}},{key:"onClose",value:function(){var e=this.props.onClose;e&&e()}},{key:"updateCollection",value:function(){var e=this.frame.content.get();if(e&&e.collection){var t=e.collection;t.toArray().forEach((function(e){return e.trigger("destroy",e)})),t.mirroring._hasMore=!0,t.more()}}},{key:"openModal",value:function(){this.props.gallery&&this.buildAndSetGalleryFrame(),this.frame.open()}},{key:"render",value:function(){return this.props.render({open:this.openModal})}}]),s}(s.Component),v=n(23),O=n.n(v),g=n(5),j=n(43),w=n(16),S=n(13),_=n(38),x=n.n(_),E=n(47);function T(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);t&&(r=r.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,r)}return n}function k(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?T(Object(n),!0).forEach((function(t){Object(g.a)(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):T(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}function A(e){if("undefined"==typeof Symbol||null==e[Symbol.iterator]){if(Array.isArray(e)||(e=function(e,t){if(!e)return;if("string"==typeof e)return P(e,t);var n=Object.prototype.toString.call(e).slice(8,-1);"Object"===n&&e.constructor&&(n=e.constructor.name);if("Map"===n||"Set"===n)return Array.from(n);if("Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n))return P(e,t)}(e))){var t=0,n=function(){};return{s:n,n:function(){return t>=e.length?{done:!0}:{done:!1,value:e[t++]}},e:function(e){throw e},f:n}}throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}var r,i,o=!0,a=!1;return{s:function(){r=e[Symbol.iterator]()},n:function(){var e=r.next();return o=e.done,e},e:function(e){a=!0,i=e},f:function(){try{o||null==r.return||r.return()}finally{if(a)throw i}}}}function P(e,t){(null==t||t>e.length)&&(t=e.length);for(var n=0,r=new Array(t);n<t;n++)r[n]=e[n];return r}function I(e){return e?Object(u.flatMap)(e,(function(e,t){var n=e.split("/"),r=Object(S.a)(n,1)[0],i=t.split("|");return[e].concat(Object(w.a)(Object(u.map)(i,(function(e){return"".concat(r,"/").concat(e)}))))})):e}function M(e){return F.apply(this,arguments)}function F(){return(F=Object(j.a)(O.a.mark((function e(t){var n,r,i,o,a,c,l,p,d,m,b,y,h,v,g,j,S,_,x,T,P,M,F,G,U,D;return O.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:n=t.allowedTypes,r=t.additionalData,i=void 0===r?{}:r,o=t.filesList,a=t.maxUploadFileSize,c=t.onError,l=void 0===c?u.noop:c,p=t.onFileChange,d=t.wpAllowedMimeTypes,m=void 0===d?null:d,b=Object(w.a)(o),y=[],h=function(e,t){Object(E.revokeBlobURL)(Object(u.get)(y,[e,"url"])),y[e]=t,p(Object(u.compact)(y))},v=function(e){return!n||Object(u.some)(n,(function(t){return Object(u.includes)(t,"/")?t===e:Object(u.startsWith)(e,"".concat(t,"/"))}))},g=I(m),j=function(e){return Object(u.includes)(g,e)},S=function(e){e.message=[Object(s.createElement)("strong",{key:"filename"},e.file.name),": ",e.message],l(e)},_=[],x=A(b),e.prev=10,x.s();case 12:if((T=x.n()).done){e.next=31;break}if(P=T.value,!g||!P.type||j(P.type)){e.next=17;break}return S({code:"MIME_TYPE_NOT_ALLOWED_FOR_USER",message:Object(f.__)("Sorry, this file type is not permitted for security reasons."),file:P}),e.abrupt("continue",29);case 17:if(!P.type||v(P.type)){e.next=20;break}return S({code:"MIME_TYPE_NOT_SUPPORTED",message:Object(f.__)("Sorry, this file type is not supported here."),file:P}),e.abrupt("continue",29);case 20:if(!(a&&P.size>a)){e.next=23;break}return S({code:"SIZE_ABOVE_LIMIT",message:Object(f.__)("This file exceeds the maximum upload size for this site."),file:P}),e.abrupt("continue",29);case 23:if(!(P.size<=0)){e.next=26;break}return S({code:"EMPTY_FILE",message:Object(f.__)("This file is empty."),file:P}),e.abrupt("continue",29);case 26:_.push(P),y.push({url:Object(E.createBlobURL)(P)}),p(y);case 29:e.next=12;break;case 31:e.next=36;break;case 33:e.prev=33,e.t0=e.catch(10),x.e(e.t0);case 36:return e.prev=36,x.f(),e.finish(36);case 39:M=0;case 40:if(!(M<_.length)){e.next=59;break}return F=_[M],e.prev=42,e.next=45,C(F,i);case 45:G=e.sent,U=k({},Object(u.omit)(G,["alt_text","source_url"]),{alt:G.alt_text,caption:Object(u.get)(G,["caption","raw"],""),title:G.title.raw,url:G.source_url}),h(M,U),e.next=56;break;case 50:e.prev=50,e.t1=e.catch(42),h(M,null),D=void 0,D=Object(u.has)(e.t1,["message"])?Object(u.get)(e.t1,["message"]):Object(f.sprintf)(Object(f.__)("Error while uploading file %s to the media library."),F.name),l({code:"GENERAL",message:D,file:F});case 56:++M,e.next=40;break;case 59:case"end":return e.stop()}}),e,null,[[10,33,36,39],[42,50]])})))).apply(this,arguments)}function C(e,t){var n=new window.FormData;return n.append("file",e,e.name||e.type.replace("/",".")),Object(u.forEach)(t,(function(e,t){return n.append(t,e)})),x()({path:"/wp/v2/media",body:n,method:"POST"})}},43:function(e,t,n){"use strict";function r(e,t,n,r,i,o,a){try{var c=e[o](a),l=c.value}catch(e){return void n(e)}c.done?t(l):Promise.resolve(l).then(r,i)}function i(e){return function(){var t=this,n=arguments;return new Promise((function(i,o){var a=e.apply(t,n);function c(e){r(a,i,o,c,l,"next",e)}function l(e){r(a,i,o,c,l,"throw",e)}c(void 0)}))}}n.d(t,"a",(function(){return i}))},47:function(e,t){!function(){e.exports=this.wp.blob}()},5:function(e,t,n){"use strict";function r(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}n.d(t,"a",(function(){return r}))}});