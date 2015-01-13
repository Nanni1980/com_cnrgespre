<?php
/**
 * @version     2.0.0
 * @package     com_cnrgespre
 * @copyright   Copyright (C) 2015. Tutti i diritti riservati.
 * @license     GNU General Public License versione 2 o successiva; vedi LICENSE.txt
 * @author      Todaro Giovanni & Pensato Alessandro <giovanni.todaro@cnr.it> - http://www.cnr.it
 */


// no direct access
defined('_JEXEC') or die;

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_cnrgespre')) 
{
	throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

// Include dependancies
jimport('joomla.application.component.controller');

$controller	= JControllerLegacy::getInstance('Cnrgespre');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
