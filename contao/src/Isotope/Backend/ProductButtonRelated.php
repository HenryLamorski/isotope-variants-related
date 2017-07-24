<?php
/**
 * Related Products for Variants
 *
 * Copyright (c) 2017 Henry Lamorski
 *
 * @package isotope-variants-related
 * @author  Henry Lamorski <henry.lamorski@mailbox.org>
 */
 
namespace Isotope\Backend;
use Isotope\Backend\Product\Button;

class ProductButtonRelated extends Button
{
	
	public function forRelated($row, $href, $label, $title, $icon, $attributes)
    {
		return '<a href="' . \Backend::addToUrl($href . '&amp;id=' . $row['id']) . '" title="' . specialchars($title) . '"' . $attributes . '>' . \Image::getHtml($icon, $label) . '</a> ';
    }
	
}
