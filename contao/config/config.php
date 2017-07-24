<?php
/**
 * Related Products for Variants
 *
 * Copyright (c) 2017 Henry Lamorski
 *
 * @package isotope-variants-related
 * @author  Henry Lamorski <henry.lamorski@mailbox.org>
 */


$GLOBALS['ISO_HOOKS']['generateProduct'][] = array('Isotope\Model\Product\RelatedVariants', 'getRelatedProducts');
