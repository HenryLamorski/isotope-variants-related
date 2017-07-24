<?php

$GLOBALS['TL_DCA']['tl_module']['palettes']['iso_productreader'] = str_replace(
	'{config_legend},',
	'{config_legend},iso_related_categories,iso_list_layout,iso_related_gallery,',
	$GLOBALS['TL_DCA']['tl_module']['palettes']['iso_productreader'] 
);
$GLOBALS['TL_DCA']['tl_module']['fields']['iso_related_gallery'] = $GLOBALS['TL_DCA']['tl_module']['fields']['iso_gallery'];
