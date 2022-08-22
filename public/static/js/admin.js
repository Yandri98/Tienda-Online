
var base = location.protocol+'//'+location.host;


//Función para cargar una imagen con un icono
document.addEventListener('DOMContentLoaded', function(){
	var btn_product_file_image = document.getElementById('btn_product_file_image');
	var product_file_image = document.getElementById('product_file_image');
	btn_product_file_image.addEventListener('click', function(){
		product_file_image.click();
	})
});

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