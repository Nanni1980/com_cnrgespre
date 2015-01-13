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
$elements = ModCnrgespreHelper::getList($params);
?>

<?php if (!empty($elements)) : ?>
    <table class="table">
        <?php foreach ($elements as $element): ?>
            <tr>
                <th><?php echo ModCnrgespreHelper::renderTranslatableHeader($params, $params->get('field')); ?></th>
                <td><?php echo ModCnrgespreHelper::renderElement($params->get('table'), $params->get('field'), $element->{$params->get('field')}); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>