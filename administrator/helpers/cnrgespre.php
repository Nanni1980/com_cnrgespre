<?php

/**
 * @version     2.0.0
 * @package     com_cnrgespre
 * @copyright   Copyright (C) 2015. Tutti i diritti riservati.
 * @license     GNU General Public License versione 2 o successiva; vedi LICENSE.txt
 * @author      Todaro Giovanni & Pensato Alessandro <giovanni.todaro@cnr.it> - http://www.cnr.it
 */
// No direct access
defined('_JEXEC') or die;

/**
 * Cnrgespre helper.
 */
class CnrgespreHelper {

    /**
     * Configure the Linkbar.
     */
    public static function addSubmenu($vName = '') {
        		JHtmlSidebar::addEntry(
			JText::_('COM_CNRGESPRE_TITLE_UTENTI'),
			'index.php?option=com_cnrgespre&view=utenti',
			$vName == 'utenti'
		);
		JHtmlSidebar::addEntry(
			JText::_('COM_CNRGESPRE_TITLE_GIUSTIFICATIVI'),
			'index.php?option=com_cnrgespre&view=giustificativi',
			$vName == 'giustificativi'
		);

    }

    /**
     * Gets a list of the actions that can be performed.
     *
     * @return	JObject
     * @since	1.6
     */
    public static function getActions() {
        $user = JFactory::getUser();
        $result = new JObject;

        $assetName = 'com_cnrgespre';

        $actions = array(
            'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.own', 'core.edit.state', 'core.delete'
        );

        foreach ($actions as $action) {
            $result->set($action, $user->authorise($action, $assetName));
        }

        return $result;
    }


}
