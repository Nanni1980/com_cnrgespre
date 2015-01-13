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

$canEdit = JFactory::getUser()->authorise('core.edit', 'com_cnrgespre');
if (!$canEdit && JFactory::getUser()->authorise('core.edit.own', 'com_cnrgespre')) {
	$canEdit = JFactory::getUser()->id == $this->item->created_by;
}
?>
<?php if ($this->item) : ?>

    <div class="item_fields">
        <table class="table">
            <tr>
			<th><?php echo JText::_('COM_CNRGESPRE_FORM_LBL_GIUSTIFICATIVO_ID'); ?></th>
			<td><?php echo $this->item->id; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_CNRGESPRE_FORM_LBL_GIUSTIFICATIVO_STATE'); ?></th>
			<td>
			<i class="icon-<?php echo ($this->item->state == 1) ? 'publish' : 'unpublish'; ?>"></i></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_CNRGESPRE_FORM_LBL_GIUSTIFICATIVO_CREATED_BY'); ?></th>
			<td><?php echo $this->item->created_by_name; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_CNRGESPRE_FORM_LBL_GIUSTIFICATIVO_CODICECNR'); ?></th>
			<td><?php echo $this->item->codicecnr; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_CNRGESPRE_FORM_LBL_GIUSTIFICATIVO_TITOLO'); ?></th>
			<td><?php echo $this->item->titolo; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_CNRGESPRE_FORM_LBL_GIUSTIFICATIVO_DESCRIZIONE'); ?></th>
			<td><?php echo $this->item->descrizione; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_CNRGESPRE_FORM_LBL_GIUSTIFICATIVO_APPLICAZIONE'); ?></th>
			<td></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_CNRGESPRE_FORM_LBL_GIUSTIFICATIVO_TIPO'); ?></th>
			<td><?php echo $this->item->tipo; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_CNRGESPRE_FORM_LBL_GIUSTIFICATIVO_SOGLIA'); ?></th>
			<td><?php echo $this->item->soglia; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_CNRGESPRE_FORM_LBL_GIUSTIFICATIVO_ATTRIBUZIONEBUONIPASTO'); ?></th>
			<td></td>
</tr>

        </table>
    </div>
    <?php if($canEdit && $this->item->checked_out == 0): ?>
		<a class="btn" href="<?php echo JRoute::_('index.php?option=com_cnrgespre&task=giustificativo.edit&id='.$this->item->id); ?>"><?php echo JText::_("COM_CNRGESPRE_EDIT_ITEM"); ?></a>
	<?php endif; ?>
								<?php if(JFactory::getUser()->authorise('core.delete','com_cnrgespre')):?>
									<a class="btn" href="<?php echo JRoute::_('index.php?option=com_cnrgespre&task=giustificativo.remove&id=' . $this->item->id, false, 2); ?>"><?php echo JText::_("COM_CNRGESPRE_DELETE_ITEM"); ?></a>
								<?php endif; ?>
    <?php
else:
    echo JText::_('COM_CNRGESPRE_ITEM_NOT_LOADED');
endif;
?>
