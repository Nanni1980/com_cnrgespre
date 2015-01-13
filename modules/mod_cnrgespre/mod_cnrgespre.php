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

// Include the syndicate functions only once
require_once __DIR__ . '/helper.php';

$doc = JFactory::getDocument();

/* */
$doc->addStyleSheet(JURI::base() . '/modules/mod_cnrgespre/assets/css/style.css');

/* */
$doc->addScript(JURI::base() . '/modules/mod_cnrgespre/assets/js/script.css');

require JModuleHelper::getLayoutPath('mod_cnrgespre', $params->get('content_type', 'blank'));
