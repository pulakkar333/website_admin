/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	//config.extraPlugins = 'uploadimage,uploadwidget,widget,clipboard,lineutils,dialog,dialogui,notificationaggregator,notification,toolbar,button,filetools';
	   config.filebrowserBrowseUrl = 'https://admin.gmebd.com/files/assets/ckeditor/kcfinder/browse.php?opener=ckeditor&type=files';
	   config.filebrowserImageBrowseUrl = 'https://admin.gmebd.com/files/assets/ckeditor/kcfinder/browse.php?opener=ckeditor&type=images';
	   config.filebrowserFlashBrowseUrl = 'https://admin.gmebd.com/files/assets/ckeditor/kcfinder/browse.php?opener=ckeditor&type=flash';
	   config.filebrowserUploadUrl = 'https://admin.gmebd.com/files/assets/ckeditor/kcfinder/upload.php?opener=ckeditor&type=files';
	   config.filebrowserImageUploadUrl = 'https://admin.gmebd.com/files/assets/ckeditor/kcfinder/upload.php?opener=ckeditor&type=images';
	   config.filebrowserFlashUploadUrl = 'https://admin.gmebd.com/files/assets/ckeditor/kcfinder/upload.php?opener=ckeditor&type=flash';
};