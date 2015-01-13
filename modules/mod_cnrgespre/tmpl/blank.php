<?php

/**
 * @version     2.0.0
 * @package     com_cnrgespre
 * @subpackage  mod_cnrgespre
 * @copyright   Copyright (C) 2015. Tutti i diritti riservati.
 * @license     GNU General Public License versione 2 o successiva; vedi LICENSE.txt
 * @author      Todaro Giovanni & Pensato Alessandro <giovanni.todaro@cnr.it> - http://www.cnr.it
 */
defined('_JEXEC') or die;

$safe_htmltags = array(
    'a', 'address', 'em', 'strong', 'b', 'i',
    'big', 'small', 'sub', 'sup', 'cite', 'code',
    'img', 'ul', 'ol', 'li', 'dl', 'lh', 'dt', 'dd',
    'br', 'p', 'table', 'th', 'td', 'tr', 'pre',
    'blockquote', 'nowiki', 'h1', 'h2', 'h3',
    'h4', 'h5', 'h6', 'hr');

/* @var $params Joomla\Registry\Registry */
$filter = JFilterInput::getInstance($safe_htmltags);
echo $filter->clean($params->get('html_content'));
?>