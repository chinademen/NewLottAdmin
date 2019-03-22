/**
 * Created by jasonding on 17-9-15.
 */


$(document).on('click','.transfer',function(){$('.popup-transfer').show()});$(document).on('click','.popup-transfer .w-button .false',function(){$('.popup-transfer').hide();$('.popup-transfer').find('textarea').val('')});$(document).on('click','.popup-transfer .w-button .true',function(){$('.popup-transfer').hide();var text=$('.popup-transfer').find('textarea').val();$('.popup-transfer').find('textarea').val('');});$(document).on('click','.popup-transfer2 .w-button .refuse',function(){$('.popup-transfer2').hide()});$(document).on('click','.popup-transfer2 .w-button .access',function(){$('.popup-transfer2').hide()});$(document).on('change','.levelOne',function(){var index=$(this).get(0).selectedIndex;$('.secondary').hide().eq(index).show()});$(document).on('click','.classification .refuse',function(){$('.classification').hide()});$(document).on('click','.end',function(){$('.classification').show()});$(document).on('click','.over',function(){$('.classification').show()});

