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
use Isotope\Model\RelatedProduct;

class RelatedVariants extends Standard
{
	
	public function getRelatedProducts($objTemplate, $objProduct)
	{
	
		/** @var RelatedProduct[] $relatedProducts */
        $relatedProducts = RelatedProduct::findByProductAndCategories(
			$objProduct,
			$objTemplate->config['module']->iso_product_related_categories
		);

        if (null !== $relatedProducts) {
            foreach ($relatedProducts as $category) {
                $ids = trimsplit(',', $category->products);

                if (is_array($ids) && 0 !== count($ids)) {
                    $productIds = array_unique(array_merge($productIds, $ids));
                }
            }
        }

	
	
		$objTemplate->foo = "bar";
	}	
	
	
	
	
}
