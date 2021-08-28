/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.extraAllowedContent = '*{*}';
	config.filebrowserBrowseUrl = 'http://nhadat1368.optechdemo2.com/vendors/ckfinder/ckfinder.html';      
    config.filebrowserImageBrowseUrl = 'http://nhadat1368.optechdemo2.com/vendors/ckfinder/ckfinder.html?type=Images';      
    config.filebrowserFlashBrowseUrl = 'http://nhadat1368.optechdemo2.com/vendors/ckfinder/ckfinder.html?type=Flash';      
    config.filebrowserUploadUrl = 'http://nhadat1368.optechdemo2.com/vendors/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';      
    config.filebrowserImageUploadUrl = 'http://nhadat1368.optechdemo2.com/vendors/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';     
    config.filebrowserFlashUploadUrl = 'http://nhadat1368.optechdemo2.com/vendors/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};
