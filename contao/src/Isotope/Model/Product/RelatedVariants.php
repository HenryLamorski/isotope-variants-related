<?php
/**
 * Related Products for Variants
 *
 * Copyright (c) 2017 Henry Lamorski
 *
 * @package isotope-variants-related
 * @author  Henry Lamorski <henry.lamorski@mailbox.org>
 */
 
namespace Isotope\Model\Product;
use Isotope\Model\Product\Standard;

class RelatedVariants extends Standard
{
	
	public function getRelatedProducts($objTemplate, $objProduct)
	{
		$objTemplate->foo = "bar";
	}	
}
