var ip=$("#ipaddress").html();$("#platform").change(function(){var pladata=$(this).children('option:selected').val();var userchannle=$("#userchannle").html();var KFchannle=$("#channle").html();var ipaddress=$("#ipaddress").html();var senddata_json='{"Group":"KF","KFChannle":\"'+KFchannle+'\",'+'"channle":\"'+userchannle+'\","data":"'+pladata+'","ConnetcType":"Getplatform","ip":\"'+ipaddress+'\"}';doSend(senddata_json);$("#questone").html("")});$("#questone").change(function(){var questonedata=$(this).children('option:selected').val();var userchannle=$("#userchannle").html();var KFchannle=$("#channle").html();var ipaddress=$("#ipaddress").html();var senddata_json='{"Group":"KF","KFChannle":\"'+KFchannle+'\",'+'"channle":\"'+userchannle+'\","data":"'+questonedata+'","ConnetcType":"questone","ip":\"'+ipaddress+'\"}';doSend(senddata_json)});$("#quest_tow").change(function(){var ss=$(this).children('option:selected').val()});$('#add-without-image').click(function(){$.gritter.add({title:'系统通知',text:'拒绝了你的转接!'});return false});function getinfosss(){var ip=$("#ipaddress").html();var url='http://ip.taobao.com//service/getIpInfo.php?ip='+ip;$.ajax({url:url,dataType:"jsonp",processData:false,type:"get",success:function(result){console.log(result)},error:function(XMLHttpRequest,textStatus,errorThrown){console.log(XMLHttpRequest.status);console.log(XMLHttpRequest.readyState);console.log(textStatus);console.log(XMLHttpRequest)}})};doT.templateSettings={evaluate:/\{\%([\s\S]+?)\%\}/g,interpolate:/\{\%=([\s\S]+?)\%\}/g,encode:/\{\{!([\s\S]+?)\}\}/g,use:/\{\{#([\s\S]+?)\}\}/g,define:/\{\{##\s*([\w\.$]+)\s*(\:|=)([\s\S]+?)#\}\}/g,conditional:/\{\{\?(\?)?\s*([\s\S]*?)\s*\}\}/g,iterate:/\{\{~\s*(?:\}\}|([\s\S]+?)\s*\:\s*([\w$]+)\s*(?:\:\s*([\w$]+))?\s*\}\})/g,varname:'it',strip:true,append:true,selfcontained:false};var ue=UE.getEditor('editor');function isFocus(e){alert(UE.getEditor('editor').isFocus());UE.dom.domUtils.preventDefault(e)};function setblur(e){UE.getEditor('editor').blur();UE.dom.domUtils.preventDefault(e)};function insertHtml(){var value=prompt('插入html代码','');UE.getEditor('editor').execCommand('insertHtml',value)};function createEditor(){enableBtn();UE.getEditor('editor')};function getAllHtml(){};function getContent(){var arr=[];arr.push("使用editor.getContent()方法可以获得编辑器的内容");arr.push("内容为：");arr.push(UE.getEditor('editor').getContent())};function getPlainTxt(){var arr=[];arr.push("使用editor.getPlainTxt()方法可以获得编辑器的带格式的纯文本内容");arr.push("内容为：");arr.push(UE.getEditor('editor').getPlainTxt())};function setContent(isAppendTo){var arr=[];UE.getEditor('editor').setContent('',isAppendTo);}''function setDisabled(){UE.getEditor('editor').setDisabled('fullscreen');disableBtn("enable")}''function setEnabled(){UE.getEditor('editor').setEnabled();enableBtn()};function getText(){var range=UE.getEditor('editor').selection.getRange();range.select();var txt=UE.getEditor('editor').selection.getText();alert(txt)};function getContentTxt(){var arr=[];arr.push("使用editor.getContentTxt()方法可以获得编辑器的纯文本内容");arr.push("编辑器的纯文本内容为：");arr.push(UE.getEditor('editor').getContentTxt());alert(arr.join("\n"))};function hasContent(){var arr=[];arr.push("使用editor.hasContents()方法判断编辑器里是否有内容");arr.push("判断结果为：");arr.push(UE.getEditor('editor').hasContents());alert(arr.join("\n"))};function setFocus(){UE.getEditor('editor').focus()};function deleteEditor(){disableBtn();UE.getEditor('editor').destroy()};function disableBtn(str){var div=document.getElementById('btns');var btns=UE.dom.domUtils.getElementsByTagName(div,"button");for(var i=0,btn;btn=btns[i++];){if(btn.id==str){UE.dom.domUtils.removeAttributes(btn,["disabled"])}else{btn.setAttribute("disabled","true")}}};function enableBtn(){var div=document.getElementById('btns');var btns=UE.dom.domUtils.getElementsByTagName(div,"button");for(var i=0,btn;btn=btns[i++];){UE.dom.domUtils.removeAttributes(btn,["disabled"])}};function getLocalData(){alert(UE.getEditor('editor').execCommand("getlocaldata"))};function clearLocalData(){UE.getEditor('editor').execCommand("clearlocaldata")};var dailogObj=(function(){var waiting={};var visitors={};return{add:function(id,arr,type){if(type==1){visitors[id]=arr}else{waiting[id]=arr}},delete:function(id,type){if(type==1){delete visitors[id]}else{delete waiting[id]}},modify:function(id,arr,type){if(type==1){visitors[id]=arr}else{waiting[id]=arr}},get:function(id,type){if(type==1){return visitors[id]}else{return waiting[id]}},set:function(obj,type){if(type==1){visitors=obj}else{waiting=obj}},clear:function(type){if(type==1){visitors={}}else{waiting={}}},getAll:function(type){if(type==1){return visitors}else{return waiting}}}})();function statistics(){var visitorsLength=$('.visitors').children('ul').length;var waitingLength=$('.waiting').children('ul').length;$('#reception').find('span').html(visitorsLength);$('#loading').find('span').html(waitingLength);};function conversation(){var datas=dailogObj.getAll(1);for(var o in datas){if(datas[o].test&&datas[o].test.length>0){var id=datas[o].id;render(dailogObj.get(id,1),'#dialogue-tmpl2','#'+id+' .dialogue .dialogue-content',true)}}};$('.send').bind("click",function(){var content=UE.getEditor('editor').getContent();if(content.length!=0){var myDate=new Date();var year=myDate.getFullYear();var month=myDate.getMonth()+1;var date=myDate.getDate();var h=myDate.getHours();var m=myDate.getMinutes();var s=myDate.getSeconds();var now=year+'-'+p(month)+"-"+p(date)+" "+p(h)+':'+p(m)+":"+p(s);var clientDOM='<div>'+'<div class="client">';clientDOM+='<span class="time">'+now+'</span>';clientDOM+='<div class="client-wrap">';clientDOM+='<img class="client-avatar" src="/chat/img/icon1.png">';clientDOM+='<div class="triangle">'+'</div>'+content+'</div>';clientDOM+='</div>'+'</div>';$('.dialogue-box.active').find('.dialogue .dialogue-content').append(clientDOM);var _adrobj=content.replace(/\"/g,"'");sendtext(_adrobj);var div=$('.dialogue-box.active').find('.dialogue').get(0);div.scrollTop=div.scrollHeight;setContent();setFocus()}});$('.toggle-treebox').click(function(){$(this).next('ul').toggle();$(this).children('i').toggleClass("box-open")});$('.name').click(function(){$(this).next('.tree').toggle()});$('.treeview span,.speak-search span').click(function(){var text=$(this).next().html();function setContents(isAppendTo){UE.getEditor('editor').setContent(text,isAppendTo)}setContents()});$('#userForm').on('input propertychange','#searchText',function(){var searchText=$.trim($('#searchText').val());var tds=$("span.userNameTd:contains("+searchText+")");if(searchText){$('.fast').find('.speak-list').hide();$('.fast').find('.speak-search').show();tds.parents('ul').show()}else{$('.fast').find('.speak-list').show();$('.fast').find('.speak-search').hide();tds.parents('ul').hide()}});$('.label').click(function(){var fast=$('.fast');if(fast.css('display')=="block"){$('.fast').hide();$(this).html('打开话术');$('.dialogue-wrap').css("margin-right","30px")}else{$('.fast').show();$(this).html('收起话术');$('.dialogue-wrap').css("margin-right","352px")}});$(document).on('click','.select li',function(){$(this).addClass('active').siblings().removeClass('active')});$(document).on('click','#loading',function(){$('.waiting').show();$('.visitors').hide()});$(document).on('click','#reception',function(){$('.waiting').hide();$('.visitors').show()});$(document).on('click','.waiting ul span',function(){var id=$(this).parents('ul').attr('data-id');$(this).parents('ul').remove();});$(document).on('click','.visitors ul',function(event){var id=$(this).data('id');var obj=dailogObj.get(id,1);var target=event.target;$(this).addClass('active').siblings('ul').removeClass('active');$("#userchannle").html(obj.channle);talks();$('.dialogue-box').removeClass('active');$('#'+id).addClass('active');var div=$('#'+id).find('.dialogue').get(0);$(this).find('i').hide();});function render(data,tmpId,containerId,isAppend){var doTemplate=doT.template($(tmpId).html());var content=doTemplate(data);if(isAppend){$(containerId).append(content)}else{$(containerId).html(content)}};function key13(){var content=UE.getEditor('editor').getContent();if(content.length!=0){var clientDOM='<div>'+'<div class="client">';clientDOM+='<span class="time">'+'11:04:16   [2017-08-08]'+'</span>';clientDOM+='<div class="client-wrap">';clientDOM+='<img class="client-avatar" src="/chat/img/icon1.png">';clientDOM+='<div class="triangle">'+'</div>'+content+'</div>';clientDOM+='</div>'+'</div>';$('.dialogue-box.active').find('.dialogue .dialogue-content').append(clientDOM);var _adrobj=content.replace(/\"/g,"'");sendtext(_adrobj);var div=$('.dialogue-box.active').find('.dialogue').get(0);div.scrollTop=div.scrollHeight}};