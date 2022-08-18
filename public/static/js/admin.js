
var base = location.protocol+'//'+location.host;
$(document).ready(function(){
	editor_init('editor');
})

function editor_init(field){
	//CKEDITOR.plugins.addExternal( 'codesnippet',base+'/static/libs/ckeditor/plugins/codesnippet/','plugin.js');
	CKEDITOR.replace(field,{
		skin: 'moono',
		extraPlugins: 'codesnippet,ajax,xml,textmatch,autocomplete,txtwatcher,emoji,panelbutton,preview,wordcount',
		toolbar:[
		{name: 'clipboard', items:['Cut','Copy','Paste','pastetext','-','Undo','Redo','']},
		{name: 'basicstyles', items:['Bold','Italic','BulletedList','Strike','Image','Link','Unlink','blockquote']},
		{name: 'document', items:['codeSnippet','EmojiPanel','Preview','Source']}
		]
	});
}