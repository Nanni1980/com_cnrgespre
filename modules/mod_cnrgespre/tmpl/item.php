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
$element = ModCnrgespreHelper::getItem($params);
?>

<?php if (!empty($element)) : ?>
    <div>
        <?php $fields = get_object_vars($element); ?>
        <?php foreach ($fields as $field_name => $field_value): ?>
            <?php if (ModCnrgespreHelper::shouldAppear($field_name)): ?>
                <div class="row">
                    <div class="span4"><strong><?php echo ModCnrgespreHelper::renderTranslatableHeader($params, $field_name); ?></strong></div>
                    <div class="span8"><?php echo ModCnrgespreHelper::renderElement($params->get('item_table'), $field_name, $field_value); ?></div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>