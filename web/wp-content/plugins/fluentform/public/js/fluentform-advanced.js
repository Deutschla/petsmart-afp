(()=>{"use strict";const e=function(e,t){var n=t.find(".jss-ff-el-net-promoter");n.length&&e.each(n,(function(t,n){e(n).on("click","label",(function(t){var n=e(this);n.addClass("active"),n.prevAll().removeClass("active"),n.nextAll().removeClass("active")}))}))};var t=function(e){!function(e){e.on("click",".js-repeat .repeat-plus",(function(e){var t=jQuery(this),n=t.closest(".ff-el-repeat"),a=parseInt(n.data("max_repeat")),i=n.find(".ff-t-cell:first-child .ff-el-input--content > input").length;if(!(a&&a<=i)){a&&a-i==1&&n.find(".repeat-plus").hide();var r=t.closest("div"),o=r.index(),f=t.closest(".ff-el-input--content").find(".ff-t-cell").length;t.closest(".ff-el-input--content").find(".ff-t-cell").each((function(e,t){var n=jQuery(this).find(".ff-el-form-control:last-child"),a=n.attr("tabindex"),i=n.clone(),r={value:"",id:"ffrpt-"+(new Date).getTime()+e};a&&(r.tabIndex=parseInt(a)+f),i.prop(r),i.insertAfter(n)})),r.clone().insertAfter(r),t.closest(".ff-el-input--content").find(".ff-t-cell").eq(0).find("input:eq(".concat(o+1,")")).focus()}})),e.on("click",".js-repeat .repeat-minus",(function(e){var t=!1,n=jQuery(this),a=n.closest("div");n.closest(".ff-el-repeat").find(".repeat-plus").show(),n.closest(".ff-el-input--content").find(".ff-t-cell").each((function(){var e=a.index(),n=jQuery(this).find(".ff-el-form-control:eq("+e+")");a.siblings().length&&(t=n.remove().length)})),t&&a.remove()}))}(e),function(e){e.on("click",".js-repeater .repeat-plus",(function(e){var t=jQuery(this),n=t.closest("table"),a=t.closest("tr"),i=parseInt(n.attr("data-max_repeat")),r=n.find("tbody tr").length;if(i&&r==i)n.addClass("repeat-maxed");else{var o=a.clone();o.find("td").each((function(e,t){var n=jQuery(this).find(".ff-el-form-control:last-child"),a=(n.attr("tabindex"),"ffrpt-"+(new Date).getTime()+e),i=(n.data("name"),{value:"",id:a});n.prop(i)})),o.insertAfter(a);var f=n.attr("data-root_name"),l=0;n.find("tbody tr").each((function(e,t){jQuery(this).find(".ff-el-form-control").each((function(t,n){var a=jQuery(n);0==e&&(l=a.attr("tabindex")),a.prop({name:f+"["+e+"][]"}),a.attr("data-name",f+"_"+t+"_"+e),l&&a.attr("tabindex",l)}))})),o.find(".ff-el-form-control")[0].focus(),n.trigger("repeat_change"),i&&r+1==i&&n.addClass("repeat-maxed")}})),e.on("click",".js-repeater .repeat-minus",(function(e){var t=jQuery(this),n=t.closest("table");if(1!=n.find("tbody tr").length){t.closest("tr").remove(),n.removeClass("repeat-maxed");var a=n.attr("data-root_name");n.find("tbody tr").each((function(e,t){jQuery(this).find(".ff-el-form-control").each((function(t,n){jQuery(n).prop({name:a+"["+e+"][]"})}))})),n.trigger("repeat_change")}}))}(e)};function n(e){return n="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},n(e)}function a(e,t){for(var n=0;n<t.length;n++){var a=t[n];a.enumerable=a.enumerable||!1,a.configurable=!0,"value"in a&&(a.writable=!0),Object.defineProperty(e,a.key,a)}}const i=function(){function e(t,n){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),this.fields=t,this.formData=n,this.counter=0,this.field_statues={}}var t,i,r;return t=e,(i=[{key:"setFields",value:function(e){this.fields=e}},{key:"setFormData",value:function(e){this.formData=e}},{key:"getCalculatedStatuses",value:function(){for(var e=0,t=Object.keys(this.fields);e<t.length;e++){var n=t[e],a=this.fields[n];this.field_statues[n]=this.evaluate(a,n)}return this.field_statues}},{key:"evaluate",value:function(e,t){var n=this,a=!1;if(e.status){this.counter++;var i=e.type,r=1;"any"==i&&(r=0),e.conditions.forEach((function(e){var a=n.getItemEvaluateValue(e,n.formData[e.field]);a&&n.fields[e.field]&&e.field!=t&&(a=n.evaluate(n.fields[e.field],e.field)),"any"==i?a&&(r=1):!a&&r&&(r=!1)})),a=1==r}return e.status&&e.conditions.length&&!a||e.container_condition&&(a=this.evaluate(e.container_condition)),a}},{key:"getItemEvaluateValue",value:function(e,t){return t=t||null,"numeric"===jQuery("[name='".concat(e.field,"']")).attr("inputmode")&&t&&(t=t.replace(/[^0-9.-]/g,"")),"="==e.operator?"object"==n(t)?null!==t&&-1!=t.indexOf(e.value):t==e.value:"!="==e.operator?"object"==n(t)?null!==t&&-1==t.indexOf(e.value):t!=e.value:">"==e.operator?t&&t>Number(e.value):"<"==e.operator?t&&t<Number(e.value):">="==e.operator?t&&t>=Number(e.value):"<="==e.operator?t&&t<=Number(e.value):"startsWith"==e.operator?t.startsWith(e.value):"endsWith"==e.operator?t.endsWith(e.value):"contains"==e.operator?null!==t&&-1!=t.indexOf(e.value):"doNotContains"==e.operator?null!==t&&-1==t.indexOf(e.value):"test_regex"==e.operator&&new RegExp(e.value,"g").test(t)}}])&&a(t.prototype,i),r&&a(t,r),Object.defineProperty(t,"prototype",{writable:!1}),e}();const r=function(e,t,n){var a,r,o,f,l,s="."+n.form_instance;(a={},r={},o=function(n){e.each(n,(function(e,t){var n=l(e).closest(".has-conditions");t?(setTimeout((function(){n.addClass("ff_cond_v")}),100),n.removeClass("ff_excluded").slideDown(200)):(setTimeout((function(){n.removeClass("ff_cond_v")}),100),n.addClass("ff_excluded").slideUp(200))})),t.trigger("do_calculation")},f=function(){var n={};return e.each(a,(function(a,i){var r=i.prop("type")||i.attr("data-type");if("radio"==r)n[a]="",i.each((function(t,i){e(i).is(":checked")&&(n[a]=e(i).val())}));else if("checkbox"==r)a=a.replace("[]",""),n[a]=[],i.each((function(t,i){e(i).is(":checked")&&n[a].push(e(i).val())}));else if("select-multiple"==r){a=a.replace("[]","");var o=i.val();n[a]=o||[]}else if("file"==r){var f="";t.find("input[name="+a+"]").closest(".ff-el-input--content").find(".ff-uploaded-list").find(".ff-upload-preview[data-src]").each((function(t,n){f+=e(this).data("src")})),n[a]=f}else n[a]=i.val()})),n},l=function(t){var n=e(s),a=e("[data-name='"+t+"']",n);return(a=a.length?a:e("[name='"+t+"']",n)).length?a:e("[name='"+t+"[]']",n)},{init:function(){if(n.conditionals){e.each(n.conditionals,(function(t,n){t&&e.each(n.conditions,(function(e,t){var n=l(t.field);a[n.prop("name")]=n}))})),r=f();var t=new i(n.conditionals,r);e.each(a,(function(e,n){n.on("change",(function(){r=f(),t.setFormData(r),o(t.getCalculatedStatuses())}))})),o(t.getCalculatedStatuses())}}}).init()};function o(e){return o="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},o(e)}function f(e){return function(e){if(Array.isArray(e))return l(e)}(e)||function(e){if("undefined"!=typeof Symbol&&null!=e[Symbol.iterator]||null!=e["@@iterator"])return Array.from(e)}(e)||function(e,t){if(!e)return;if("string"==typeof e)return l(e,t);var n=Object.prototype.toString.call(e).slice(8,-1);"Object"===n&&e.constructor&&(n=e.constructor.name);if("Map"===n||"Set"===n)return Array.from(e);if("Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n))return l(e,t)}(e)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function l(e,t){(null==t||t>e.length)&&(t=e.length);for(var n=0,a=new Array(t);n<t;n++)a[n]=e[n];return a}function s(e,t,n,a){var i=0,r="";n.stepAnimationDuration=parseInt(n.stepAnimationDuration);var o="yes"==t.find(".ff-step-container").attr("data-enable_step_data_persistency"),l=!1;o&&(l="yes"==t.find(".ff-step-container").attr("data-enable_step_page_resume"));var s=!!window.fluentFormVars.is_rtl,c=!1,d=function(t){var a=t.response,i=t.step_completed;jQuery.each(a,(function(t,a){if(a){var i=Object.prototype.toString.call(a);if("[object Object]"===i){var r=jQuery("[data-name=".concat(t,"]"));if(r.length&&"tabular-element"===r.attr("data-type"))jQuery.each(a,(function(n,a){var i=jQuery('[name="'.concat(t,"[").concat(n,']\\[\\]"]'));jQuery.each(i,(function(t,n){-1!=jQuery.inArray(e(n).val(),a)&&e(n).prop("checked",!0).change()}))}));else if("chained-select"===r.attr("data-type")){var o={meta_key:r.find("select:first").attr("data-meta_key"),form_id:r.closest("form").attr("data-form_id"),action:"fluentform_get_chained_select_options",filter_options:"all",keys:a};jQuery.getJSON(n.ajaxUrl,o).then((function(e){jQuery.each(e,(function(e,t){var n=r.find("select[data-key='".concat(e,"']"));0!=n.attr("data-index")&&jQuery.each(t,(function(e,t){n.append(jQuery("<option />",{value:t,text:t}))})),n.attr("disabled",!1).val(a[e])}))}))}else jQuery.each(a,(function(e,n){jQuery('[name="'.concat(t,"[").concat(e,']"]')).val(n).change()}))}else if("[object Array]"===i){var f=jQuery("[name=".concat(t,"]"));if("file"==(f=(f=f.length?f:jQuery("[data-name=".concat(t,"]"))).length?f:jQuery("[name=".concat(t,"\\[\\]]"))).attr("type"))h(f,a);else if(f.prop("multiple")){if(e.isFunction(window.Choices))f.data("choicesjs").setValue(a).change();else f.val(a).change()}else if("repeater_field"===f.attr("data-type")){var l=f.find("tbody"),s=f.attr("data-name");jQuery.each(a,(function(t,n){0!=t?l.find("tr:last").clone().appendTo(l).find(".ff-el-form-control").each((function(a,i){var r="ffrpt-"+(new Date).getTime()+a;e(i).val(n[a]),e(i).attr({id:r,name:"".concat(s,"[").concat(t,"][]"),value:n[a]}).change()})):l.find("tr:first .ff-el-form-control").each((function(t,a){e(a).val(n[t]).change()}))}))}else f.each((function(t,n){-1!=jQuery.inArray(e(n).val(),a)&&e(n).prop("checked",!0).change()}))}else{var c=jQuery("[name=".concat(t,"]"));"radio"===c.prop("type")||"checkbox"===c.prop("type")?jQuery("[name=".concat(t,'][value="').concat(a,'"]')).prop("checked",!0).change():c.val(a).change()}}})),c=!0,l&&v(i,n.stepAnimationDuration,!0),c=!1},u=function(a){if(t.find(".ff-el-progress").length){var i=a.totalSteps,r=a.activeStep,o=100/i*(r+1),f=t.find(".ff-el-progress-title li"),l=t.find(".ff-step-header .ff-el-progress-bar"),s=l.find("span");l.css({width:o+"%"}),o?l.append(s.text(parseInt(o)+"%")):s.empty();var c=n.step_text,d=e(f[r]).text();c=c.replace("%activeStep%",r+1).replace("%totalStep%",i).replace("%stepTitle%",d),t.find(".ff-el-progress-status").html(c),f.css("display","none"),e(f[r]).css("display","inline")}},p=function(n){e(document).on("keydown",a+" .fluentform-step > .step-nav button",(function(t){9==t.which&&"next"==e(this).data("action")&&t.preventDefault()})),e(a).on("click",".fluentform-step  .step-nav button, .fluentform-step  .step-nav img",(function(a){var r=e(this).data("action"),o="next",f=e(this).closest(".fluentform-step"),l=window.fluentFormApp(t);if("next"==r){try{var s=f.find(":input").not(":button").filter((function(t,n){return!e(n).closest(".has-conditions").hasClass("ff_excluded")}));s.length&&l.validate(s),i++}catch(a){if(!(a instanceof window.ffValidationError))throw a;return l.showErrorMessages(a.messages),void l.scrollToFirstError(350)}t.trigger("ff_to_next_page",i),jQuery(document).trigger("ff_to_next_page",{step:i,form:t});var c=t.find(".fluentform-step");t.trigger("ff_render_dynamic_smartcodes",e(c[i]))}else i--,o="prev",t.trigger("ff_to_prev_page",i),jQuery(document).trigger("ff_to_prev_page",{step:i,form:t});var d="yes"!=t.find(".ff-step-container").attr("data-disable_auto_focus");v(i,n,d,o)}))},v=function(n,l){var d=!(arguments.length>2&&void 0!==arguments[2])||arguments[2],p=arguments.length>3&&void 0!==arguments[3]?arguments[3]:"next";e("div"+a+"_errors").empty(),i=n;var v=t.find(".ff-step-body"),h=t.find(".ff-step-titles li"),g=t.find(".fluentform-step"),y=g.length;t.offset().top,e("#wpadminbar");g.removeClass("active"),e(g[i]).addClass("active"),h.removeClass("ff_active ff_completed"),e.each(f(Array(i).keys()),(function(t){e(e(h[t])).addClass("ff_completed")})),e(h[i]).addClass("ff_active");var _=function(){if(!window.ff_disable_step_scroll){var n=t.find(".ff_step_start");if(window.ff_scroll_top_offset)var a=window.ff_scroll_top_offset;else a=n.offset().top-20;var i,r,o,f,s;(r=(i=n).offset().top,o=r+i.outerHeight(),f=e(window).scrollTop(),s=f+e(window).height(),o>f&&r<s)&&!window.ff_force_scroll||e("html, body").delay(l).animate({scrollTop:a},0)}},x={left:-100*i+"%"};if(s&&(x={right:-100*i+"%"}),v.animate(x,l,(function(){d&&_(),v.css({width:r})})),o&&!c&&m(t,i).then((function(e){console.log(e)})),u({activeStep:i,totalSteps:y}),g.last().hasClass("active"))t.find('button[type="submit"]').css("display","inline-block");else if(t.find('button[type="submit"]').css("display","none"),!window.ff_disable_auto_step){var b=0;t.find(".fluentform-step.active .ff_excluded").legth&&(b=50),setTimeout((function(){var e=t.find(".fluentform-step.active"),n=t.find(".fluentform-step.active > div").length-1,a=t.find(".fluentform-step.active > .ff_excluded").length;t.find(".fluentform-step.active > .ff-t-container").length&&(n-=t.find(".fluentform-step.active > .ff-t-container").length,n+=t.find(".fluentform-step.active > .ff-t-container > .ff-t-cell > div").length,a+=t.find(".fluentform-step.active > .ff-t-container > .ff-t-cell > .ff_excluded").length,t.find(".fluentform-step.active > .ff-t-container.ff_excluded").length&&(a-=t.find(".fluentform-step.active > .ff-t-container.ff_excluded").length,a-=t.find(".fluentform-step.active > .ff-t-container.ff_excluded > .ff-t-cell > .ff_excluded").length,a+=t.find(".fluentform-step.active > .ff-t-container.ff_excluded > .ff-t-cell > div").length)),n==a&&e.find(".step-nav button[data-action="+p+"]").click()}),b)}},m=function(t,a){var i=t.find(":input").filter((function(t,n){return!e(n).closest(".has-conditions").hasClass("ff_excluded")}));i.filter((function(t,n){var a=e(n);return a.parents().hasClass("ff_repeater_table")&&"select"==a.attr("type")&&!a.val()})).prepend("<option selected disabled />");var r=i.serialize();e.each(t.find("[type=file]"),(function(t,n){var a={},i=n.name+"[]";a[i]=[],e(n).closest("div").find(".ff-uploaded-list").find(".ff-upload-preview[data-src]").each((function(t,n){a[i][t]=e(this).data("src")})),e.each(a,(function(t,n){if(n.length){var a={};a[t]=n,r+="&"+e.param(a),!0}}))}));var o={active_step:a,data:r,form_id:t.data("form_id"),action:"fluentform_step_form_save_data"};return jQuery.post(n.ajaxUrl,o)},h=function(t,a){var i=t.closest(".ff-el-input--content").find(".ff-uploaded-list");e.each(a,(function(t,a){var r=e("<div/>",{class:"ff-upload-preview","data-src":a,style:"border: 1px solid rgb(111, 117, 125)"}),o=e("<div/>",{class:"ff-upload-thumb"});o.append(e("<div/>",{class:"ff-upload-preview-img",style:"background-image: url('".concat(g(a),"');")}));var f=e("<div/>",{class:"ff-upload-details"}),l=e("<span/>",{html:n.upload_completed_txt,class:"ff-upload-progress-inline-text ff-inline-block"}),s=e("<div/>",{class:"ff-upload-filename",html:a.substring(a.lastIndexOf("/")+1)}),c=e('\n\t\t\t\t\t\t\t\t\t<div class="ff-upload-progress-inline ff-el-progress">\n\t\t\t\t\t\t\t\t\t\t<div style="width: 100%;" class="ff-el-progress-bar"></div>\n\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t'),d=e("<span/>",{"data-href":"#",html:"&times;",class:"ff-upload-remove"}),u=e("<div>",{class:"ff-upload-filesize ff-inline-block",html:""}),p=e("<div>",{class:"ff-upload-error",style:"color:red;"});f.append(s,c,l,u,p,d),r.append(o,f),i.append(r)})),t.trigger("change_remaining",-a.length),t.trigger("change")},g=function(e){var t=e.split(/[#?]/)[0].split(".").pop().trim().toLowerCase();if(-1!=["jpg","jpeg","gif","png"].indexOf(t))return e;var n=document.createElement("canvas");n.width=60,n.height=60,n.style.zIndex=8,n.style.position="absolute",n.style.border="1px solid";var a=n.getContext("2d");return a.fillStyle="rgba(0, 0, 0, 0.2)",a.fillRect(0,0,60,60),a.font="13px Arial",a.fillStyle="white",a.textAlign="center",a.fillText(t,30,30,60),n.toDataURL()};return{init:function(){var a,f,l,s;o&&jQuery(document).ready((function(e){jQuery.getJSON(n.ajaxUrl,{form_id:t.data("form_id"),action:"fluentform_step_form_get_data"}).then((function(e){e&&d(e)}))})),t.find(".fluentform-step:first").find('.step-nav [data-action="prev"]').remove(),a=t.find(".ff-step-body"),f=t.find(".fluentform-step"),l=f.length,s=t.find(".ff-step-titles li"),r=100*l+"%",a.css({width:r}),f.css({width:100/l+"%"}),e(f[i]).addClass("active"),e(s[i]).addClass("active"),f.length&&!f.last().hasClass("active")&&t.find('button[type="submit"]').css("display","none"),u({activeStep:i,totalSteps:l}),p(n.stepAnimationDuration),function(){function n(e){if(1==e.closest(".fluentform-step.active").find(".ff-el-group:not(.ff_excluded):not(.ff-custom_html)").length)if(e.closest(".fluentform-step.active").find(".ff_excluded").length){var t=window.ffTransitionTimeOut||400;setTimeout((function(){e.closest(".fluentform-step.active").find(".ff-btn-next").trigger("click")}),t)}else e.closest(".fluentform-step.active").find(".ff-btn-next").trigger("click")}"yes"==t.find(".ff-step-container").attr("data-enable_auto_slider")&&(t.find(".ff-el-form-check-radio,.ff-el-net-label, .ff-el-ratings label").on("click",(function(){n(e(this))})),t.find("select").on("change",(function(){n(e(this))})))}()},updateSlider:v}}function c(e,t){var n=t.find(".ff_has_formula");if(n.length){var a={},i={};mexp.addToken([{type:8,token:"round",show:"round",value:function(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:0;return t||0===t||(t=2),e=parseFloat(e).toFixed(t),parseFloat(e)}},{type:0,token:"ceil",show:"ceil",value:function(e){return Math.ceil(e)}},{type:0,token:"floor",show:"floor",value:function(e){return Math.floor(e)}},{type:8,token:"max",show:"max",value:function(e,t){return e>t?e:t}}]);var r=function r(){jQuery.each(n,(function(n,l){var s=jQuery(l),c=s.data("calculation_formula"),d=function(e,t){for(var n,a=[],i=RegExp(e,"g");n=i.exec(t);)delete n.input,a.push(n);return a}(/{(.*?)}/g,c),u={};jQuery.each(d,(function(n,l){var s=l[0];if(-1!=s.indexOf("{input.")){var c=s.replace(/{input.|}/g,""),d=t.find("input[name="+c+"]"),p=0;o(d)&&(p=window.ff_helper.numericVal(d)),u[s]=p}else if(-1!=s.indexOf("{select.")){var v=s.replace(/{select.|}/g,""),m=f("select[data-name="+v+"] option:selected");t.find("select[data-name="+v+"]").attr("data-calc_value",m),u[s]=m}else if(-1!=s.indexOf("{checkbox.")){var h=s.replace(/{checkbox.|}/g,"");u[s]=f("input[data-name="+h+"]:checked")}else if(-1!=s.indexOf("{radio.")){var g=s.replace(/{radio.|}/g,""),y=t.find("input[name="+g+"]:checked"),_=0;o(y)&&(_=y.attr("data-calc_value")||0),u[s]=_}else if(-1!=s.indexOf("{repeat.")){var x=s.replace(/{repeat.|}/g,""),b=x.split("."),w=!1;b.length>1&&(x=b[0],w=b[1]);var j=t.find("table[data-root_name="+x+"]");if(a[x]||(a[x]=!0,j.on("repeat_change",(function(){r()}))),w){var k=0;if(o(j)){var C=j.find("tbody tr td:nth-child("+w+")");e.each(C,(function(t,n){var a=e(n).find(":input"),o=x+"_"+w+"_"+a.attr("id");i[o]||(i[o]=!0,a.on("change",(function(){r()})));var f=0;f="select"==a.attr("type")?parseFloat(a.find("option:selected").attr("data-calc_value")):parseFloat(a.val()),isNaN(f)||(k+=f)})),k&&(k=k.toFixed(2))}u[s]=k}else{var Q=0;o(j)&&(Q=j.find("tbody tr").length),u[s]=Q}}else if(-1!=s.indexOf("{payment.")){var S=s.replace(/{payment.|}/g,""),A=t.find(":input[data-name="+S+"]"),O=0;if(A.length&&o(A)){var T=A[0].type;if("radio"==T)O=t.find("input[name="+S+"]:checked").attr("data-payment_value");else if("hidden"==T)O=A.attr("data-payment_value");else if("number"==T||"text"==T)O=window.ff_helper.numericVal(A);else if("checkbox"==T){var F=A.data("group_id"),N=t.find('input[data-group_id="'+F+'"]:checked'),D=0;N.each((function(e,t){var n=jQuery(t).data("payment_value");n&&(D+=parseFloat(n))})),O=D}else if("select-one"==T){O=t.find("select[name="+S+"] option:selected").data("payment_value")}}u[s]=O}})),jQuery.each(u,(function(e,t){t||(t=0),c=c.split(e).join(t)}));var p="";try{c=c.replace(/\n/g,""),p=mexp.eval(c),isNaN(p)&&(p="")}catch(e){console.log(e,l)}if("text"==s[0].type){var v=e(s),m=v.val(),h=window.ff_helper.formatCurrency(v,p);if(v.val(h).prop("defaultValue",h),""==m)return;m!=h&&v.trigger("change")}else s.text(p)}))};t.find("input[type=number],input[data-calc_value],select[data-calc_value],.ff_numeric,.ff_payment_item").on("change keyup",r),r(),t.on("do_calculation",(function(){r()}))}function o(e){return!e.closest(".ff_excluded.has-conditions").length}function f(n){var a=0,i=t.find(n);return i.closest(".ff_excluded.has-conditions").length||e.each(i,(function(t,n){var i=e(n).attr("data-calc_value");i&&!isNaN(i)&&(a+=Number(i))})),a}}var d,u;(d=jQuery)(document.body).on("fluentform_init",(function(n,a,i){if(a.attr("data-form_instance"),i){i.form_id_selector;var f="."+i.form_instance;if(function(e,t,n,a,i){var r=function(e){if(e.type.match("image"))return URL.createObjectURL(e);var t=document.createElement("canvas");t.width=60,t.height=60,t.style.zIndex=8,t.style.position="absolute",t.style.border="1px solid";var n=t.getContext("2d");return n.fillStyle="rgba(0, 0, 0, 0.2)",n.fillRect(0,0,60,60),n.font="13px Arial",n.fillStyle="white",n.textAlign="center",n.fillText(e.type.substr(e.type.indexOf("/")+1),30,30,60),t.toDataURL()},f=function(e){return e<1024?e+"bytes":e>=1024&&e<=1048576?(e/1024).toFixed(1)+"KB":e>1048576?(e/1048576).toFixed(1)+"MB":void 0},l=function(e,t){var n=[],a="",i="";if("allowed_file_types"in t?(a=t.allowed_file_types.value,i=t.allowed_file_types.message):"allowed_image_types"in t&&(a=t.allowed_image_types.value,i=t.allowed_image_types.message),a){var r=new RegExp("("+a.join("|")+")","i"),o=e.name.split(".").pop();o=o.toLowerCase(),r.test(o)||n.push(i)}return"max_file_size"in t&&e.size>t.max_file_size.value&&n.push(t.max_file_size.message),n};jQuery.fn.fileupload&&t.find('input[type="file"]').each((function(s,c){var d,u=e(this);d=e("<div/>",{class:"ff-uploaded-list",style:"font-size:12px; margin-top: 15px;"}),u.closest("div").append(d);var p=n.rules[u.prop("name")],v=p.max_file_count.value;"max_file_count"in p&&(p.max_file_count.remaining=Number(v));var m="";function h(e){var n=u.prop("name");t.trigger("show_element_error",{element:n,message:e})}function g(a,r){if(r&&r.files&&r.files.length){if(t.find(".ff-upload-preview-elem").remove(),"max_file_count"in p){e(i+"_errors").empty(),e(this).closest("div").find(".error").html("");var o=p.max_file_count.remaining;if(!o||r.files.length>o){var f="Maximum 1 file is allowed!";return f=v>1?"Maximum "+v+" files are allowed!":f,p.max_file_count&&p.max_file_count.message&&(f=p.max_file_count.message),h(f),!1}}var s=l(r.files[0],n.rules[u.prop("name")]);return!s.length||(h(s.join(", ")),!1)}}"allowed_file_types"in p?(m=p.allowed_file_types.value.join("|"),u.prop("accept","."+m.replace(/\|/g,",."))):(m=p.allowed_image_types.value.join("|"))?u.prop("accept","."+m.replace(/\|/g,",.")):u.prop("accept","image/*");var y,_,x=e(c);u.fileupload({dataType:"json",dropZone:u.closest(".ff-el-group"),url:(y="action=fluentform_file_upload&formId="+n.id,_=a.ajaxUrl,_+=(_.split("?")[1]?"&":"?")+y),change:g,add:function(t,n){if(g(0,n)){var i=e("<div/>",{class:"ff-upload-preview"});n.context=i;var o=e("<div/>",{class:"ff-upload-thumb"}),l=e("<div/>",{class:"ff-upload-details"}),s=e("<div/>",{class:"ff-upload-preview-img",style:"background-image: url('".concat(r(n.files[0]),"');")}),c=e("<div>",{class:"ff-upload-error",style:"color:red;"}),u=e("<span/>",{html:a.upload_start_txt,class:"ff-upload-progress-inline-text ff-inline-block"}),p=e('\n\t\t\t\t\t\t\t\t\t<div class="ff-upload-progress-inline ff-el-progress">\n\t\t\t\t\t\t\t\t\t\t<div class="ff-el-progress-bar"></div>\n\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t'),v=e("<div/>",{class:"ff-upload-filename",html:n.files[0].name}),m=e("<span/>",{"data-href":"#",html:"&times;",class:"ff-upload-remove"}),h=e("<div>",{class:"ff-upload-filesize ff-inline-block",html:f(n.files[0].size)});o.append(s),l.append(v,p,u,h,c,m),i.append(o,l),d.append(i),v.css({maxWidth:n.context.width()-91+"px"}),n.submit(),n.context.addClass("ff_uploading")}},progress:function(e,t){var n=parseInt(t.loaded/t.total*100,10);t.context.find(".ff-el-progress-bar").css("width",n+"%"),t.context.find(".ff-upload-progress-inline-text").text(a.uploading_txt)},done:function(e,n){if(n.context.removeClass("ff_uploading"),n.result&&"data"in n.result&&"files"in n.result.data)"error"in n.result.data.files[0]?(h("Upload Error: "+n.result.data.files[0].error),n.context.remove()):(n.context.find(".ff-upload-progress-inline-text").text(a.upload_completed_txt),p.max_file_count.remaining-=1,n.context.attr("data-src",n.result.data.files[0].url),n.context.find(".ff-upload-remove").attr("data-href",n.result.data.files[0].file),t.find("input[name="+x.data("name")+"]").trigger("change"));else{var i="Sorry! The upload failed for some unknown reason.";if(n.messages){var r=Object.keys(n.messages);r.length&&(i=n.messages[r[0]])}h(i),n.context.remove()}},fail:function(t,n){var a=[];n.context.remove(),n.jqXHR.responseJSON&&n.jqXHR.responseJSON.errors?e.each(n.jqXHR.responseJSON.errors,(function(t,n){"object"==o(n)?e.each(n,(function(e,t){a.push(t)})):a.push(n)})):n.jqXHR.responseText?a.push(n.jqXHR.responseText):a.push("Something is wrong when uploading the file! Please try again"),h(a.join(", "))}}),x.on("change_remaining",(function(e,t){p.max_file_count.remaining+=t}))})),t.find(".ff-uploaded-list").on("click",".ff-upload-remove",(function(t){t.preventDefault();var n=e(this),i=n.closest(".ff-uploaded-list"),r=i.closest(".ff-el-input--content").find("input[type=file]"),o=n.attr("data-href");"#"==o?(n.closest(".ff-upload-preview").remove(),i.find(".ff-upload-preview").length||i.siblings(".ff-upload-progress").addClass("ff-hidden"),r.trigger("change_remaining",1)):e.post(a.ajaxUrl,{path:o,action:"fluentform_delete_uploaded_file"}).then((function(e){n.closest(".ff-el-input--content").find("input"),r.trigger("change_remaining",1),n.closest(".ff-upload-preview").remove(),i.find(".ff-upload-preview").length||i.siblings(".ff-upload-progress").addClass("ff-hidden"),r.trigger("change")}))}))}(d,a,i,window.fluentFormVars,f),t(a),function(e,t){var n=t.find(".fluentform .js-repeat");e.each(n,(function(t,n){var a=e(n);if(a.find(".ff-t-cell").length>1){var i=a.find(".ff-el-group").height()-a.find(".ff-el-group").find(".ff-el-input--content").height();a.find(".js-repeat-buttons").css("margin-top",i+"px")}var r=a.find(".ff-el-group").find(".ff-el-input--content .ff-el-form-control").outerHeight();a.find(".ff-el-repeat-buttons").height(r)}))}(d,a),r(d,a,i,window.fluentFormVars),c(d,a),function(e,t){var n=t.find(".jss-ff-el-ratings");n.length&&e.each(n,(function(t,n){var a=e(n);a.find("label.active").prevAll().addClass("active"),a.on("mouseenter","label",(function(t){var n=e(this),a="[data-id="+n.find("input").attr("id")+"]";n.addClass("active"),n.prevAll().addClass("active"),n.nextAll().removeClass("active"),n.closest(".ff-el-input--content").find(".ff-el-rating-text").css("display","none"),n.closest(".ff-el-input--content").find(a).css("display","inline-block")})).on("click","label",(function(t){var n=e(this).find(".jss-ff-svg");n.addClass("scale"),n.addClass("scalling"),setTimeout((function(e){n.removeClass("scalling"),n.removeClass("scale")}),150)})).on("mouseleave",(function(t){var n=e(this),a="[data-id="+n.find("input:checked").attr("id")+"]",i=n.find("input:checked").parent("label");i.length?(i.addClass("active"),i.prevAll().addClass("active"),i.nextAll().removeClass("active")):n.find("label").removeClass("active"),n.closest(".ff-el-input--content").find(".ff-el-rating-text").css("display","none"),n.closest(".ff-el-input--content").find(a).css("display","inline-block")}))}))}(d,a),e(d,a),a.hasClass("ff-form-has-steps")){var l=s(d,a,window.fluentFormVars,f);l.init(),a.on("update_slider",(function(e,t){l.updateSlider(t.goBackToStep,t.animDuration,t.isScrollTop,t.actionType)}))}a.hasClass("ff_has_dynamic_smartcode")&&(a.on("ff_render_dynamic_smartcodes",(function(e,t){u(d(t))})),a.on("keyup change",":input",(function(){u(a)})),u(a))}else console.log("No Fluent form JS vars found!");function u(e){jQuery.each(e.find(".ff_dynamic_value"),(function(e,t){var n=d(t).data("ref");if("payment_summary"!=n){var i=a.find('.ff-el-form-control[name="'+n+'"]'),r=" ";i.length||(i=a.find('.ff-field_container[data-name="'+n+'"]').find("input")),i.length||((i=a.find('*[name="'+n+'"]:checked')).length||(i=a.find('*[name="'+n+'[]"]:checked'),r=", "),i.length||(i=a.find('*[name="'+n+'[]"]').find("option:selected"),r=", "));var o=[];d.each(i,(function(){var e=d(this).val();e&&o.push(e)}));var f="";f=o.length?o.join(r):d(t).data("fallback"),d(this).html(f)}else a.trigger("calculate_payment_summary",{element:d(t)})}))}})),(u=String.prototype).startsWith||(u.startsWith=function(e,t){return t=!t||t<0?0:+t,this.substring(t,t+e.length)===e}),u.endsWith||(u.endsWith=function(e,t){return(void 0===t||t>this.length)&&(t=this.length),this.substring(t-e.length,t)===e}),u.includes||(u.includes=function(e,t){if(e instanceof RegExp)throw TypeError("first argument must not be a RegExp");return void 0===t&&(t=0),-1!==this.indexOf(e,t)})})();