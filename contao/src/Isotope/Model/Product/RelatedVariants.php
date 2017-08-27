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
use Isotope\Model\Product;
use Isotope\Model\Product\Standard;
use Isotope\Model\RelatedProduct;
use Haste\Generator\RowClass;

class RelatedVariants
{
	
	public function getRelatedProducts($objTemplate, $objProduct)
	{

		if(null === $objTemplate->config['module']->iso_related_categories)
		{
			return;
		}
		
		$arrCategorys = unserialize($objTemplate->config['module']->iso_related_categories);
		
		/** @var RelatedProduct[] $relatedProducts */
        $relatedProducts = RelatedProduct::findByProductAndCategories(
			$objProduct,
			$arrCategorys,
			array('value'	=> array($objProduct->id))
		);
		
		$productIds=array();

        if (null !== $relatedProducts) {
            foreach ($relatedProducts as $category) {
                $ids = trimsplit(',', $category->products);
                if (is_array($ids) && 0 !== count($ids)) {
                    $productIds = array_unique(array_merge($ids,$productIds));
                } 
            }
        } 
		
        if (0 === count($productIds)) {
            return;
        }
		
		$columns = [Product::getTable() . '.id IN (' . implode(',', array_map('intval', $productIds)) . ')'];
        $options = ['order' => \Database::getInstance()->findInSet(Product::getTable() . '.id', $productIds)];
		$objProducts = Product::findAvailableBy($columns, [], $options);
		
		if(!$objProducts) {
			return;
		}
		
		$arrProducts = $objProducts->getModels();
		
        $arrBuffer         = array();

        /** @var \Isotope\Model\Product\Standard $objProduct */
        foreach ($arrProducts as $objProduct) {
            /** @var ProductType $type */
            $type = $objProduct->getRelated('type');

            $arrConfig = array(
                'module'        => $objTemplate->config['module'],
                'template'      => $objTemplate->config['module']->iso_list_layout ?: $type->list_template,
                'gallery'       => $objTemplate->config['module']->iso_related_gallery ?: $type->list_gallery,
                'buttons'       => $objTemplate->config['module']->iso_buttons,
                'useQuantity'   => $objTemplate->config['module']->iso_use_quantity,
                'jumpTo'        => $objTemplate->config['module']->findJumpToPage($objProduct),
            );

            $arrCSS = deserialize($objProduct->cssID, true);

            $arrBuffer[] = array(
                'cssID'     => ($arrCSS[0] != '') ? ' id="' . $arrCSS[0] . '"' : '',
                'class'     => trim('product ' . ($objProduct->isNew() ? 'new ' : '') . $arrCSS[1]),
                'html'      => $objProduct->generate($arrConfig),
                'product'   => $objProduct,
            );
        }
		
		
		RowClass::withKey('class')
            ->addCount('product_')
            ->addEvenOdd('product_')
            ->addFirstLast('product_')
            ->addGridRows($this->iso_cols)
            ->addGridCols($this->iso_cols)
            ->applyTo($arrBuffer)
        ;

        $objTemplate->related_products = $arrBuffer;
	
	}	
	
}
