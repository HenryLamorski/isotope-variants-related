<?php

$GLOBALS['TL_DCA']['tl_module']['palettes']['iso_productreader'] = str_replace(
	'{config_legend},',
	'{config_legend},iso_related_categories,',
	$GLOBALS['TL_DCA']['tl_module']['palettes']['iso_productreader'] 
);

$GLOBALS['TL_DCA']['tl_module']['fields']['iso_product_related_categories'] = $GLOBALS['TL_DCA']['tl_module']['fields']['iso_related_categories'];
