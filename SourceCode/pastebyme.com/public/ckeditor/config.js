/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	config.language = 'vi';
	// config.uiColor = '#AADC6E';
	config.filebrowserBrowseUrl = PUBLIC_URL + '/public/kcfinder/browse.php?type=files';
	config.filebrowserImageBrowseUrl = PUBLIC_URL + '/public/kcfinder/browse.php?type=images';
	config.filebrowserFlashBrowseUrl = PUBLIC_URL + '/public/kcfinder/browse.php?type=flash';
	config.filebrowserUploadUrl = PUBLIC_URL + '/public/kcfinder/upload.php?type=files';
	config.filebrowserImageUploadUrl = PUBLIC_URL + '/public/kcfinder/upload.php?type=images';
	config.filebrowserFlashUploadUrl = PUBLIC_URL + '/public/kcfinder/upload.php?type=flash';
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
};
