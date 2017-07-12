<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2016 Leo Feyer
 *
 * @license LGPL-3.0+
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'Isotope',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Src
	'Isotope\Backend\ProductButtonRelated' 	=> 'system/modules/isotope-variants-related/src/Isotope/Backend/ProductButtonRelated.php',
	'Isotope\Model\Product\RelatedVariants' => 'system/modules/isotope-variants-related/src/Isotope/Model/Product/RelatedVariants.php',
));
