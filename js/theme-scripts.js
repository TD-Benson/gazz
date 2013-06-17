
/*!
* FitVids 1.0
*
* Copyright 2011, Chris Coyier - http://css-tricks.com + Dave Rupert - http://daverupert.com
* Credit to Thierry Koblentz - http://www.alistapart.com/articles/creating-intrinsic-ratios-for-video/
* Released under the WTFPL license - http://sam.zoy.org/wtfpl/
*
* Date: Thu Sept 01 18:00:00 2011 -0500
*/
(function(e){"use strict";e.fn.fitVids=function(t){var n={customSelector:null};var r=document.createElement("div"),i=document.getElementsByTagName("base")[0]||document.getElementsByTagName("script")[0];r.className="fit-vids-style";r.innerHTML="­<style>               .fluid-width-video-wrapper {                 width: 100%;                              position: relative;                       padding: 0;                            }                                                                                   .fluid-width-video-wrapper iframe,        .fluid-width-video-wrapper object,        .fluid-width-video-wrapper embed {           position: absolute;                       top: 0;                                   left: 0;                                  width: 100%;                              height: 100%;                          }                                       </style>";i.parentNode.insertBefore(r,i);if(t){e.extend(n,t)}return this.each(function(){var t=["iframe[src*='player.vimeo.com']","iframe[src*='www.youtube.com']","iframe[src*='www.youtube-nocookie.com']","iframe[src*='fast.wistia.com']","embed"];if(n.customSelector){t.push(n.customSelector)}var r=e(this).find(t.join(","));r.each(function(){var t=e(this);if(this.tagName.toLowerCase()==="embed"&&t.parent("object").length||t.parent(".fluid-width-video-wrapper").length){return}var n=this.tagName.toLowerCase()==="object"||t.attr("height")&&!isNaN(parseInt(t.attr("height"),10))?parseInt(t.attr("height"),10):t.height(),r=!isNaN(parseInt(t.attr("width"),10))?parseInt(t.attr("width"),10):t.width(),i=n/r;if(!t.attr("id")){var s="fitvid"+Math.floor(Math.random()*999999);t.attr("id",s)}t.wrap('<div class="fluid-width-video-wrapper"></div>').parent(".fluid-width-video-wrapper").css("padding-top",i*100+"%");t.removeAttr("height").removeAttr("width")})})}})(jQuery);
/*! Responsive Menu */
/*! http://tinynav.viljamis.com v1.1 by @viljamis */
(function(a,i,g){a.fn.tinyNav=function(j){var b=a.extend({active:"selected",header:"",label:""},j);return this.each(function(){g++;var h=a(this),d="tinynav"+g,f=".l_"+d,e=a("<select/>").attr("id",d).addClass("tinynav "+d);if(h.is("ul,ol")){""!==b.header&&e.append(a("<option/>").text(b.header));var c="";h.addClass("l_"+d).find("a").each(function(){c+='<option value="'+a(this).attr("href")+'">';var b;for(b=0;b<a(this).parents("ul, ol").length-1;b++)c+="- ";c+=a(this).text()+"</option>"});e.append(c);
b.header||e.find(":eq("+a(f+" li").index(a(f+" li."+b.active))+")").attr("selected",!0);e.change(function(){i.location.href=a(this).val()});a(f).after(e);b.label&&e.before(a("<label/>").attr("for",d).addClass("tinynav_label "+d+"_label").append(b.label))}})}})(jQuery,this,0);
/*!
 * jQuery Selectbox plugin 0.2
 */
(function(e,t){function s(){this._state=[];this._defaults={classHolder:"sb-holder",classHolderDisabled:"sb-holder-disabled",classSelector:"sb-selector",classOptions:"sb-options",classGroup:"sb-group",classSub:"sb-sub",classDisabled:"sb-disabled",classToggleOpen:"sb-toggle-open",classToggle:"sb-toggle",classFocus:"sb-focus",speed:200,effect:"slide",onChange:null,onOpen:null,onClose:null}}var n="selectbox",r=false,i=true;e.extend(s.prototype,{_isOpenSelectbox:function(e){if(!e){return r}var t=this._getInst(e);return t.isOpen},_isDisabledSelectbox:function(e){if(!e){return r}var t=this._getInst(e);return t.isDisabled},_attachSelectbox:function(t,s){function g(){var t,n,r=this.attr("id").split("_")[1];for(t in u._state){if(t!==r){if(u._state.hasOwnProperty(t)){n=e("select[sb='"+t+"']")[0];if(n){u._closeSelectbox(n)}}}}}function y(){var n=arguments[1]&&arguments[1].sub?true:false,r=arguments[1]&&arguments[1].disabled?true:false;arguments[0].each(function(s){var o=e(this),f=e("<li>"),d;if(o.is(":selected")){l.text(o.text());p=i}if(s===m-1){f.addClass("last")}if(!o.is(":disabled")&&!r){d=e("<a>",{href:"#"+o.val(),rel:o.val()}).text(o.text()).bind("click.sb",function(n){if(n&&n.preventDefault){n.preventDefault()}var r=c,i=e(this),s=r.attr("id").split("_")[1];u._changeSelectbox(t,i.attr("rel"),i.text());u._closeSelectbox(t)}).bind("mouseover.sb",function(){var t=e(this);t.parent().siblings().find("a").removeClass(a.settings.classFocus);t.addClass(a.settings.classFocus)}).bind("mouseout.sb",function(){e(this).removeClass(a.settings.classFocus)});if(n){d.addClass(a.settings.classSub)}if(o.is(":selected")){d.addClass(a.settings.classFocus)}d.appendTo(f)}else{d=e("<span>",{text:o.text()}).addClass(a.settings.classDisabled);if(n){d.addClass(a.settings.classSub)}d.appendTo(f)}f.appendTo(h)})}if(this._getInst(t)){return r}var o=e(t),u=this,a=u._newInst(o),f,l,c,h,p=r,d=o.find("optgroup"),v=o.find("option"),m=v.length;o.attr("sb",a.uid);e.extend(a.settings,u._defaults,s);u._state[a.uid]=r;o.hide();f=e("<div>",{id:"sb-holder_"+a.uid,"class":a.settings.classHolder,tabindex:o.attr("tabindex")});l=e("<a>",{id:"sb-selector_"+a.uid,href:"#","class":a.settings.classSelector,click:function(n){n.preventDefault();g.apply(e(this),[]);var r=e(this).attr("id").split("_")[1];if(u._state[r]){u._closeSelectbox(t)}else{u._openSelectbox(t)}}});c=e("<a>",{id:"sb-toggle_"+a.uid,href:"#","class":a.settings.classToggle,click:function(n){n.preventDefault();g.apply(e(this),[]);var r=e(this).attr("id").split("_")[1];if(u._state[r]){u._closeSelectbox(t)}else{u._openSelectbox(t)}}});c.appendTo(f);h=e("<ul>",{id:"sb-options_"+a.uid,"class":a.settings.classOptions,css:{display:"none"}});o.children().each(function(t){var n=e(this),r,i={};if(n.is("option")){y(n)}else if(n.is("optgroup")){r=e("<li>");e("<span>",{text:n.attr("label")}).addClass(a.settings.classGroup).appendTo(r);r.appendTo(h);if(n.is(":disabled")){i.disabled=true}i.sub=true;y(n.find("option"),i)}});if(!p){l.text(v.first().text())}e.data(t,n,a);f.data("uid",a.uid).bind("keydown.sb",function(t){var r=t.charCode?t.charCode:t.keyCode?t.keyCode:0,i=e(this),s=i.data("uid"),o=i.siblings("select[sb='"+s+"']").data(n),a=i.siblings(["select[sb='",s,"']"].join("")).get(0),f=i.find("ul").find("a."+o.settings.classFocus);switch(r){case 37:case 38:if(f.length>0){var l;e("a",i).removeClass(o.settings.classFocus);l=f.parent().prevAll("li:has(a)").eq(0).find("a");if(l.length>0){l.addClass(o.settings.classFocus).focus();e("#sb-selector_"+s).text(l.text())}}break;case 39:case 40:var l;e("a",i).removeClass(o.settings.classFocus);if(f.length>0){l=f.parent().nextAll("li:has(a)").eq(0).find("a")}else{l=i.find("ul").find("a").eq(0)}if(l.length>0){l.addClass(o.settings.classFocus).focus();e("#sb-selector_"+s).text(l.text())}break;case 13:if(f.length>0){u._changeSelectbox(a,f.attr("rel"),f.text())}u._closeSelectbox(a);break;case 9:if(a){var o=u._getInst(a);if(o){if(f.length>0){u._changeSelectbox(a,f.attr("rel"),f.text())}u._closeSelectbox(a)}}var c=parseInt(i.attr("tabindex"),10);if(!t.shiftKey){c++}else{c--}e("*[tabindex='"+c+"']").focus();break;case 27:u._closeSelectbox(a);break}t.stopPropagation();return false}).delegate("a","mouseover",function(t){e(this).addClass(a.settings.classFocus)}).delegate("a","mouseout",function(t){e(this).removeClass(a.settings.classFocus)});l.appendTo(f);h.appendTo(f);f.insertAfter(o);e("html").live("mousedown",function(t){t.stopPropagation();e("select").selectbox("close")});e([".",a.settings.classHolder,", .",a.settings.classSelector].join("")).mousedown(function(e){e.stopPropagation()})},_detachSelectbox:function(t){var i=this._getInst(t);if(!i){return r}e("#sb-holder_"+i.uid).remove();e.data(t,n,null);e(t).show()},_changeSelectbox:function(t,n,r){var s,o=this._getInst(t);if(o){s=this._get(o,"onChange");e("#sb-selector_"+o.uid).text(r)}n=n.replace(/\'/g,"\\'");e(t).find("option[value='"+n+"']").attr("selected",i);if(o&&s){s.apply(o.input?o.input[0]:null,[n,o])}else if(o&&o.input){o.input.trigger("change")}},_enableSelectbox:function(t){var i=this._getInst(t);if(!i||!i.isDisabled){return r}e("#sb-holder_"+i.uid).removeClass(i.settings.classHolderDisabled);i.isDisabled=r;e.data(t,n,i)},_disableSelectbox:function(t){var s=this._getInst(t);if(!s||s.isDisabled){return r}e("#sb-holder_"+s.uid).addClass(s.settings.classHolderDisabled);s.isDisabled=i;e.data(t,n,s)},_optionSelectbox:function(t,i,s){var o=this._getInst(t);if(!o){return r}o[i]=s;e.data(t,n,o)},_openSelectbox:function(t){var r=this._getInst(t);if(!r||r.isOpen||r.isDisabled){return}var s=e("#sb-options_"+r.uid),o=parseInt(e(window).height(),50),u=e("#sb-holder_"+r.uid).offset(),a=e(window).scrollTop(),f=s.prev().height(),l=o-(u.top-a)-f/2,c=this._get(r,"onOpen");s.css({top:f+"px",maxHeight:l-f+"px"});r.settings.effect==="fade"?s.fadeIn(r.settings.speed):s.slideDown(r.settings.speed);e("#sb-toggle_"+r.uid).addClass(r.settings.classToggleOpen);this._state[r.uid]=i;r.isOpen=i;if(c){c.apply(r.input?r.input[0]:null,[r])}e.data(t,n,r)},_closeSelectbox:function(t){var i=this._getInst(t);if(!i||!i.isOpen){return}var s=this._get(i,"onClose");i.settings.effect==="fade"?e("#sb-options_"+i.uid).fadeOut(i.settings.speed):e("#sb-options_"+i.uid).slideUp(i.settings.speed);e("#sb-toggle_"+i.uid).removeClass(i.settings.classToggleOpen);this._state[i.uid]=r;i.isOpen=r;if(s){s.apply(i.input?i.input[0]:null,[i])}e.data(t,n,i)},_newInst:function(e){var t=e[0].id.replace(/([^A-Za-z0-9_-])/g,"\\\\$1");return{id:t,input:e,uid:Math.floor(Math.random()*99999999),isOpen:r,isDisabled:r,settings:{}}},_getInst:function(t){try{return e.data(t,n)}catch(r){throw"Missing instance data for this selectbox"}},_get:function(e,n){return e.settings[n]!==t?e.settings[n]:this._defaults[n]}});e.fn.selectbox=function(t){var n=Array.prototype.slice.call(arguments,1);if(typeof t=="string"&&t=="isDisabled"){return e.selectbox["_"+t+"Selectbox"].apply(e.selectbox,[this[0]].concat(n))}if(t=="option"&&arguments.length==2&&typeof arguments[1]=="string"){return e.selectbox["_"+t+"Selectbox"].apply(e.selectbox,[this[0]].concat(n))}return this.each(function(){typeof t=="string"?e.selectbox["_"+t+"Selectbox"].apply(e.selectbox,[this].concat(n)):e.selectbox._attachSelectbox(this,t)})};e.selectbox=new s;e.selectbox.version="0.2"})(jQuery)

jQuery(window).resize(function() {
	fullHeightContent();
});
jQuery(window).load(function () {
	fullHeightContent();

	jQuery(".postlist-img img").fadeIn(500);

		// clone image
		jQuery('.postlist-img img').each(function(){
			var el = jQuery(this);
			el.css({"position":"absolute"}).wrap("<div class='img_wrapper' style='display: inline-block'>").clone().addClass('img_grayscale').css({"position":"absolute","z-index":"998","opacity":"0"}).insertBefore(el).queue(function(){
				var el = jQuery(this);
				el.parent().css({"width":this.width,"height":this.height});
				el.dequeue();
			});
			//this.src = grayscale(this.src);
		});

		// Fade image
		jQuery('.postlist-img img').mouseover(function(){
			jQuery(this).parent().find('img:first').stop().animate({opacity:1}, 500);
		})
		jQuery('.img_grayscale').mouseout(function(){
			jQuery(this).stop().animate({opacity:0}, 1000);
		});



});

function fullHeightContent(){
	var windowHeight = jQuery(window).height();
	jQuery('#container').css('min-height', windowHeight + 'px');
}

function ctrMainContent(){
	var windowHeight = jQuery(window).height();
	var maincontentHeight = jQuery('#container>div#wrapper').height();
	var margTop = 0;
	if (windowHeight > maincontentHeight){
		margTop = (windowHeight - maincontentHeight)/2;
		jQuery('#container div#wrapper').css('margin-top', margTop + 'px');
	}
}

function grayscale(src){
	var canvas = document.createElement('canvas');
	var ctx = canvas.getContext('2d');
	var imgObj = new Image();
	imgObj.src = src;
	canvas.width = imgObj.width;
	canvas.height = imgObj.height;
	ctx.drawImage(imgObj, 0, 0);
	var imgPixels = ctx.getImageData(0, 0, canvas.width, canvas.height);
	for(var y = 0; y < imgPixels.height; y++){
		for(var x = 0; x < imgPixels.width; x++){
			var i = (y * 4) * imgPixels.width + x * 4;
			var avg = (imgPixels.data[i] + imgPixels.data[i + 1] + imgPixels.data[i + 2]) / 3;
			imgPixels.data[i] = avg;
			imgPixels.data[i + 1] = avg;
			imgPixels.data[i + 2] = avg;
		}
	}
	ctx.putImageData(imgPixels, 0, 0, 0, 0, imgPixels.width, imgPixels.height);
	return canvas.toDataURL();
}

jQuery(".comment-reply-link").click(function() {
  //jQuery("#respond").slideDown("slow");
  jQuery("#respond").hide().slideDown('slow');

});
