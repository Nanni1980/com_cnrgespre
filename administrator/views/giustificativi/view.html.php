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

jimport('joomla.application.component.view');

/**
 * View class for a list of Cnrgespre.
 */
class CnrgespreViewGiustificativi extends JViewLegacy {

    protected $items;
    protected $pagination;
    protected $state;

    /**
     * Display the view
     */
    public function display($tpl = null) {
        $this->state = $this->get('State');
        $this->items = $this->get('Items');
        $this->pagination = $this->get('Pagination');

        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            throw new Exception(implode("\n", $errors));
        }

        CnrgespreHelper::addSubmenu('giustificativi');

        $this->addToolbar();

        $this->sidebar = JHtmlSidebar::render();
        parent::display($tpl);
    }

    /**
     * Add the page title and toolbar.
     *
     * @since	1.6
     */
    protected function addToolbar() {
        require_once JPATH_COMPONENT . '/helpers/cnrgespre.php';

        $state = $this->get('State');
        $canDo = CnrgespreHelper::getActions($state->get('filter.category_id'));

        JToolBarHelper::title(JText::_('COM_CNRGESPRE_TITLE_GIUSTIFICATIVI'), 'giustificativi.png');

        //Check if the form exists before showing the add/edit buttons
        $formPath = JPATH_COMPONENT_ADMINISTRATOR . '/views/giustificativo';
        if (file_exists($formPath)) {

            if ($canDo->get('core.create')) {
                JToolBarHelper::addNew('giustificativo.add', 'JTOOLBAR_NEW');
            }

            if ($canDo->get('core.edit') && isset($this->items[0])) {
                JToolBarHelper::editList('giustificativo.edit', 'JTOOLBAR_EDIT');
            }
        }

        if ($canDo->get('core.edit.state')) {

            if (isset($this->items[0]->state)) {
                JToolBarHelper::divider();
                JToolBarHelper::custom('giustificativi.publish', 'publish.png', 'publish_f2.png', 'JTOOLBAR_PUBLISH', true);
                JToolBarHelper::custom('giustificativi.unpublish', 'unpublish.png', 'unpublish_f2.png', 'JTOOLBAR_UNPUBLISH', true);
            } else if (isset($this->items[0])) {
                //If this component does not use state then show a direct delete button as we can not trash
                JToolBarHelper::deleteList('', 'giustificativi.delete', 'JTOOLBAR_DELETE');
            }

            if (isset($this->items[0]->state)) {
                JToolBarHelper::divider();
                JToolBarHelper::archiveList('giustificativi.archive', 'JTOOLBAR_ARCHIVE');
            }
            if (isset($this->items[0]->checked_out)) {
                JToolBarHelper::custom('giustificativi.checkin', 'checkin.png', 'checkin_f2.png', 'JTOOLBAR_CHECKIN', true);
            }
        }

        //Show trash and delete for components that uses the state field
        if (isset($this->items[0]->state)) {
            if ($state->get('filter.state') == -2 && $canDo->get('core.delete')) {
                JToolBarHelper::deleteList('', 'giustificativi.delete', 'JTOOLBAR_EMPTY_TRASH');
                JToolBarHelper::divider();
            } else if ($canDo->get('core.edit.state')) {
                JToolBarHelper::trash('giustificativi.trash', 'JTOOLBAR_TRASH');
                JToolBarHelper::divider();
            }
        }

        if ($canDo->get('core.admin')) {
            JToolBarHelper::preferences('com_cnrgespre');
        }

        //Set sidebar action - New in 3.0
        JHtmlSidebar::setAction('index.php?option=com_cnrgespre&view=giustificativi');

        $this->extra_sidebar = '';
        
		JHtmlSidebar::addFilter(

			JText::_('JOPTION_SELECT_PUBLISHED'),

			'filter_published',

			JHtml::_('select.options', JHtml::_('jgrid.publishedOptions'), "value", "text", $this->state->get('filter.state'), true)

		);

		//Filter for the field tipo
		$select_label = JText::sprintf('COM_CNRGESPRE_FILTER_SELECT_LABEL', 'Tipo');
		$options = array();
		$options[0] = new stdClass();
		$options[0]->value = "0";
		$options[0]->text = "Contatore";
		$options[1] = new stdClass();
		$options[1]->value = "1";
		$options[1]->text = "Completamento";
		$options[2] = new stdClass();
		$options[2]->value = "2";
		$options[2]->text = "Standard";
		JHtmlSidebar::addFilter(
			$select_label,
			'filter_tipo',
			JHtml::_('select.options', $options , "value", "text", $this->state->get('filter.tipo'), true)
		);

    }

	protected function getSortFields()
	{
		return array(
		'a.id' => JText::_('JGRID_HEADING_ID'),
		'a.ordering' => JText::_('JGRID_HEADING_ORDERING'),
		'a.state' => JText::_('JSTATUS'),
		'a.codicecnr' => JText::_('COM_CNRGESPRE_GIUSTIFICATIVI_CODICECNR'),
		'a.titolo' => JText::_('COM_CNRGESPRE_GIUSTIFICATIVI_TITOLO'),
		'a.applicazione' => JText::_('COM_CNRGESPRE_GIUSTIFICATIVI_APPLICAZIONE'),
		'a.tipo' => JText::_('COM_CNRGESPRE_GIUSTIFICATIVI_TIPO'),
		'a.soglia' => JText::_('COM_CNRGESPRE_GIUSTIFICATIVI_SOGLIA'),
		'a.attribuzionebuonipasto' => JText::_('COM_CNRGESPRE_GIUSTIFICATIVI_ATTRIBUZIONEBUONIPASTO'),
		);
	}

}
