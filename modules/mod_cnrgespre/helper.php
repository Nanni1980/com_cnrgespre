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

/**
 * Helper for mod_cnrgespre
 *
 * @package     com_cnrgespre
 * @subpackage  mod_cnrgespre
 */
class ModCnrgespreHelper {

    /**
     * Retrieve component items
     * @param Joomla\Registry\Registry  &$params  module parameters
     * @return array Array with all the elements
     */
    public static function getList(&$params) {
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);

        /* @var $params Joomla\Registry\Registry */
        $query
                ->select('*')
                ->from($params->get('table'))
                ->where('state = 1');

        $db->setQuery($query, $params->get('offset'), $params->get('limit'));
        $rows = $db->loadObjectList();
        return $rows;
    }

    /**
     * Retrieve component items
     * @param Joomla\Registry\Registry  &$params  module parameters
     * @return mixed stdClass object if the item was found, null otherwise
     */
    public static function getItem(&$params) {
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);

        /* @var $params Joomla\Registry\Registry */
        $query
                ->select('*')
                ->from($params->get('item_table'))
                ->where('id = ' . intval($params->get('item_id')));

        $db->setQuery($query);
        $element = $db->loadObject();
        return $element;
    }

    /**
     * 
     * @param Joomla\Registry\Registry $params
     * @param string $field
     */
    public static function renderElement($table_name, $field_name, $field_value) {
        $result = '';
        
        switch ($table_name) {
            
		case '#__cnrgespre_utenti':
		switch($field_name){
		case 'id':
		$result = $field_value;
		break;
		case 'codicefiscale':
		$result = $field_value;
		break;
		case 'utentesistema':
		$user = JFactory::getUser($field_value);
		$result = $user->name;
		break;
		case 'created_by':
		$user = JFactory::getUser($field_value);
		$result = $user->name;
		break;
		}
		break;
		case '#__cnrgespre_giustificativi':
		switch($field_name){
		case 'id':
		$result = $field_value;
		break;
		case 'created_by':
		$user = JFactory::getUser($field_value);
		$result = $user->name;
		break;
		case 'codicecnr':
		$result = $field_value;
		break;
		case 'titolo':
		$result = $field_value;
		break;
		case 'descrizione':
		$result = $field_value;
		break;
		case 'applicazione':
		$result = $field_value;
		break;
		case 'tipo':
		$result = $field_value;
		break;
		case 'soglia':
		$result = $field_value;
		break;
		case 'attribuzionebuonipasto':
		$result = $field_value;
		break;
		}
		break;
        }
        return $result;
    }

    /**
     * Returns the translatable name of the element
     * @param Joomla\Registry\Registry $params
     * @param string $field Field name
     * @return string Translatable name.
     */
    public static function renderTranslatableHeader(&$params, $field) {
        return JText::_('MOD_CNRGESPRE_HEADER_FIELD_' . str_replace('#__', '', strtoupper($params->get('table'))) . '_' . strtoupper($field));
    }

    /**
     * Checks if an element should appear in the table/item view
     * @param string $field name of the field
     * @return boolean True if it should appear, false otherwise
     */
    public static function shouldAppear($field) {
        $noHeaderFields = array('checked_out_time', 'checked_out', 'ordering', 'state');
        return !in_array($field, $noHeaderFields);
    }

    
}
