$(function(){$("#toggle-indi").on("click",function(){$("#indi").toggle();var e=$("#indi").css("display");"none"==e?$("#toggle-indi").html($("#toggle-indi").data("show")):$("#toggle-indi").html($("#toggle-indi").data("hide"))}),getFingerprint(function(e){console.log(e),e&&$("#finger").val(e)}),$(".del-group").on("click",function(e){var r=$(this).attr("href");e.preventDefault(),$("#confirmation-modal").find(".modal-content h4").html(defaultmsg.confirm_headline.msg),$("#confirmation-modal").find(".modal-content p").html(defaultmsg.confirm_paragraph.msg),$("#confirmation-modal").openModal({dismissible:!0,opacity:.5,in_duration:300,out_duration:200,ready:function(){},complete:function(e){}}),$("#confirmation-modal .modal-footer .agree").on("click",function(){""!=r&&(window.location.href=r)})}),$("form#update-settings").on("submit",function(e){var r=$("#language"),o=r.find("input:radio:checked");if(r.removeClass("errorborder"),r.find(".valerror").html(""),o.length<1){var t="Please fill out the field.";"object"==typeof errmsg&&"object"==typeof errmsg.language&&errmsg.language.error&&(t=errmsg.language.error),r.find(".valerror").html(t),r.addClass("errorborder"),e.preventDefault()}var n=$("#timezone-wrapper"),a=$("#timezone");if(n.removeClass("errorborder"),n.find(".valerror").html(""),""==a.val()){var t="Please fill out the field.";"object"==typeof errmsg&&"object"==typeof errmsg.timezone&&errmsg.timezone.error&&(t=errmsg.timezone.error),n.find(".valerror").html(t),n.addClass("errorborder"),e.preventDefault()}}),$("form#create-group").on("submit",function(e){var r=$("#name");r.removeClass("errorborder"),r.parent().find(".valerror").html("");var o="Please fill out the field.";"object"==typeof errmsg&&"object"==typeof errmsg.name&&errmsg.name.error&&(o=errmsg.name.error),""==r.val()&&(r.parent().find(".valerror").html(o),r.addClass("errorborder"),e.preventDefault());var t=$("#desc");t.removeClass("errorborder"),t.parent().find(".valerror").html("");var o="Please fill out the field.";"object"==typeof errmsg&&"object"==typeof errmsg.desc&&errmsg.desc.error&&(o=errmsg.desc.error),""==t.val()&&(t.parent().find(".valerror").html(o),t.addClass("errorborder"),e.preventDefault())}),$("form#edit-user-base, form#create-user-base").on("submit",function(e){var r=$(e.target).attr("id"),o=$("#username");o.removeClass("errorborder"),o.parent().find(".valerror").html("");var t="Please fill out the field.";"object"==typeof errmsg&&"object"==typeof errmsg.username&&errmsg.username.error&&(t=errmsg.username.error),""==o.val()&&(o.parent().find(".valerror").html(t),o.addClass("errorborder"),e.preventDefault());var n=$("#email");n.removeClass("errorborder"),n.parent().find(".valerror").html("");var t="Please fill out the field.";"object"==typeof errmsg&&"object"==typeof errmsg.email&&errmsg.email.error&&(t=errmsg.email.error),""!=n.val()&&validateEmail(n.val())===!0||(n.parent().find(".valerror").html(t),n.addClass("errorborder"),e.preventDefault()),"create-user-base"==r&&("object"==typeof errmsg&&"object"==typeof errmsg.passwordempty&&errmsg.passwordempty.error&&(t=errmsg.passwordempty.error),""==password.val()&&(password.parent().find(".valerror").html(t),password.addClass("errorborder"),e.preventDefault()))})}),$(function(){}),function(e){e.Directory=function(r,o){var t={},n=this;n.settings={};var r=(e(r),r);n.init=function(){n.settings=e.extend({},t,o)},n.moveBranch=function(r,o,t){var n=e("ul.treeroot").data("rootid");e.ajax({dataType:"json",type:"post",url:"/directory/ajax/movenode/",data:{id:parseInt(r),serialized:o,rootid:parseInt(n)}}).done(function(e){e.outcome&&"success"==e.outcome&&t("sucess")}).fail(function(e){t("failed")})},n.updateNode=function(r,o){var t=r.find("#name").val(),n=r.find("#template").val(),a=r.find("#permgroups").val(),i=r.find("#rootid").val(),d=r.find("#nodeid").val();"undefined"==typeof d&&(d="");e.ajax({dataType:"json",type:"post",url:"/directory/ajax/updatenode/",data:{name:encodeURIComponent(t),template:encodeURIComponent(n),groups:JSON.stringify(a),rootid:parseInt(i),nodeid:parseInt(d)}}).done(function(e){o("done"),e.outcome&&"success"==e.outcome&&(window.location.href="/directory/index/tree/rootid/"+parseInt(i)+"/")}).fail(function(e){})},n.saveNewNode=function(r){var o=r.find("#name").val(),t=r.find("#position").val(),n=r.find("#template").val(),a=r.find("#permgroups").val(),i=r.find("#rootid").val(),d=r.find("#ctype").val();"undefined"==typeof nodeid&&(nodeid="");e.ajax({dataType:"json",type:"post",url:"/directory/ajax/addnode/",data:{name:encodeURIComponent(o),position:parseInt(t),template:encodeURIComponent(n),groups:JSON.stringify(a),rootid:parseInt(i),ctype:encodeURIComponent(d)}}).done(function(e){e.outcome&&"success"==e.outcome&&location.reload()}).fail(function(e){})},n.init()},e.fn.Directory=function(r){return this.each(function(){if(void 0==e(this).data("Directory")){var o=new e.Directory(this,r);e(this).data("Directory",o)}})}}(jQuery),$(function(){var e=$(this).Directory({}),r=UIkit.nestable($(".uk-nestable"),{maxDepth:10});if(r.on("change.uk.nestable",function(r,o,t){$("#blanko-overlay").show();var n=$(this).data("nestable").serialize();e.data("Directory").moveBranch(t.data("id"),JSON.stringify(n),function(e){console.log(e),$("#blanko-overlay").hide()})}),$("a.tree-toolbar.delete").on("click",function(e){var r=$(this).attr("href");e.preventDefault(),$("#confirmation-modal").find(".modal-content h4").html(defaultmsg.confirm_headline.msg),$("#confirmation-modal").find(".modal-content p").html(defaultmsg.confirm_paragraph.msg),$("#confirmation-modal").openModal({dismissible:!0,opacity:.5,in_duration:300,out_duration:200,ready:function(){},complete:function(e){}}),$("#confirmation-modal .modal-footer .agree").on("click",function(){""!=r&&(window.location.href=r)})}),$("form#edit-node-form").on("submit",function(r){r.preventDefault(),$("#blanko-overlay").show(),e.data("Directory").updateNode($(this),function(e){$("#blanko-overlay").hide()})}),$("#newnode").on("click",function(e){$("#nodeform-wrapper, .content-level").toggle()}),$("#reset-new-node-form").on("click",function(){$("#nodeform-wrapper, .content-level").toggle()}),$("#new-node-form").on("submit",function(r){r.preventDefault(),e.data("Directory").saveNewNode($(this))}),"undefined"!=typeof pappkey){var o=new Pusher(pappkey,{encrypted:!0,cluster:cluster}),t=o.subscribe(chanchan);t.bind("category_change",function(e){if(e.message&&e.identifier&&hash&&hash!=e.identifier){getUrlVars("directory",function(r){if(1==r){getUrlVars("tree",function(r){if(1==r){getUrlVars("rootid",function(r){if("undefined"!=typeof rooter&&1==r){getUrlVars(rooter,function(r){1==r&&($("#confirmation-modal").find(".modal-content h4").html("Puster"),$("#confirmation-modal").find(".modal-content p").html(e.message),$("#confirmation-modal").openModal({dismissible:!0,opacity:.5,in_duration:300,out_duration:200,ready:function(){},complete:function(e){}}),$("#confirmation-modal .modal-footer .agree").on("click",function(){location.reload()}))})}})}})}})}})}});