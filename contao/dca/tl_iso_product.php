<?php
/**
 * Related Products for Variants
 *
 * Copyright (c) 2017 Henry Lamorski
 *
 * @package isotope-variants-related
 * @author  Henry Lamorski <henry.lamorski@mailbox.org>
 */
 
$GLOBALS['TL_DCA']['tl_iso_product']['list']['operations']['related']['button_callback'] = array('Isotope\Backend\ProductButtonRelated', 'forRelated');
