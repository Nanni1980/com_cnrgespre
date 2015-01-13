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

JHtml::_('behavior.keepalive');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');

//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_cnrgespre', JPATH_ADMINISTRATOR);
$doc = JFactory::getDocument();
$doc->addScript(JUri::base() . '/components/com_cnrgespre/assets/js/form.js');


?>
</style>
<script type="text/javascript">
    getScript('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', function() {
        jQuery(document).ready(function() {
            jQuery('#form-giustificativo').submit(function(event) {
                
            });

            
        });
    });

</script>

<div class="giustificativo-edit front-end-edit">
    <?php if (!empty($this->item->id)): ?>
        <h1>Edit <?php echo $this->item->id; ?></h1>
    <?php else: ?>
        <h1>Add</h1>
    <?php endif; ?>

    <form id="form-giustificativo" action="<?php echo JRoute::_('index.php?option=com_cnrgespre&task=giustificativo.save'); ?>" method="post" class="form-validate form-horizontal" enctype="multipart/form-data">
        
	<input type="hidden" name="jform[id]" value="<?php echo $this->item->id; ?>" />

	<input type="hidden" name="jform[ordering]" value="<?php echo $this->item->ordering; ?>" />

	<input type="hidden" name="jform[state]" value="<?php echo $this->item->state; ?>" />

	<input type="hidden" name="jform[checked_out]" value="<?php echo $this->item->checked_out; ?>" />

	<input type="hidden" name="jform[checked_out_time]" value="<?php echo $this->item->checked_out_time; ?>" />

	<?php if(empty($this->item->created_by)): ?>
		<input type="hidden" name="jform[created_by]" value="<?php echo JFactory::getUser()->id; ?>" />
	<?php else: ?>
		<input type="hidden" name="jform[created_by]" value="<?php echo $this->item->created_by; ?>" />
	<?php endif; ?>
	<div class="control-group">
		<div class="control-label"><?php echo $this->form->getLabel('codicecnr'); ?></div>
		<div class="controls"><?php echo $this->form->getInput('codicecnr'); ?></div>
	</div>
	<div class="control-group">
		<div class="control-label"><?php echo $this->form->getLabel('titolo'); ?></div>
		<div class="controls"><?php echo $this->form->getInput('titolo'); ?></div>
	</div>
	<div class="control-group">
		<div class="control-label"><?php echo $this->form->getLabel('descrizione'); ?></div>
		<div class="controls"><?php echo $this->form->getInput('descrizione'); ?></div>
	</div>
	<div class="control-group">
		<div class="control-label"><?php echo $this->form->getLabel('applicazione'); ?></div>
		<div class="controls"><?php echo $this->form->getInput('applicazione'); ?></div>
	</div>
	<div class="control-group">
		<div class="control-label"><?php echo $this->form->getLabel('tipo'); ?></div>
		<div class="controls"><?php echo $this->form->getInput('tipo'); ?></div>
	</div>
	<div class="control-group">
		<div class="control-label"><?php echo $this->form->getLabel('soglia'); ?></div>
		<div class="controls"><?php echo $this->form->getInput('soglia'); ?></div>
	</div>
	<div class="control-group">
		<div class="control-label"><?php echo $this->form->getLabel('attribuzionebuonipasto'); ?></div>
		<div class="controls"><?php echo $this->form->getInput('attribuzionebuonipasto'); ?></div>
	</div>
        <div class="control-group">
            <div class="controls">
                <button type="submit" class="validate btn btn-primary"><?php echo JText::_('JSUBMIT'); ?></button>
                <a class="btn" href="<?php echo JRoute::_('index.php?option=com_cnrgespre&task=giustificativoform.cancel'); ?>" title="<?php echo JText::_('JCANCEL'); ?>"><?php echo JText::_('JCANCEL'); ?></a>
            </div>
        </div>
        
        <input type="hidden" name="option" value="com_cnrgespre" />
        <input type="hidden" name="task" value="giustificativoform.save" />
        <?php echo JHtml::_('form.token'); ?>
    </form>
</div>
