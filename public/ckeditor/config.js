/**
 * @license Copyright (c) 2003-2022, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.filebrowserBrowseUrl = 'http://127.0.0.1:8000/ckfinder/ckfinder.html';
	config.filebrowserImageBrowseUrl = 'http://127.0.0.1:8000/ckfinder/ckfinder.html?type=Images';
	config.filebrowserFlashBrowseUrl = 'http://127.0.0.1:8000/ckfinder/ckfinder.html?type=Flash';
	config.filebrowserUploadUrl = 'http://127.0.0.1:8000/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
	config.filebrowserImageUploadUrl = 'http://127.0.0.1:8000/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
	config.filebrowserFlashUploadUrl = 'http://127.0.0.1:8000/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
	config.extraPlugins = 'youtube';
};
