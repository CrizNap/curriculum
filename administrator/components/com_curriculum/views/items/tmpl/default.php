<?php
/**
 * Created by PhpStorm.
 * User: Curtis
 * Date: 12/21/2014
 * Time: 6:40 PM
 */
defined('_JEXEC') or die('Access Denied');

$listOrder = $this->escape($this->state->get('list.ordering'));
$listDir = $this->escape($this->state->get('list.direction'));
?>

<form action="index.php?option=com_curriculum&amp;view=items" method="post" name="adminForm" id="adminForm">

    <fieldset id="filter-bar">
        <div class="filter-search fltlft">
            <label for="filter_search"><?php echo JText::_('JSEARCH_FILTER_LABEL'); ?></label>
            <input type="text" name="filter_search" id="filter_search" value="<?php echo $this->escape($this->state->get('filter.search')); ?>" title="Search" />
            <button type="submit" class="btn"><?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?></button>
            <button type="button" onclick="document.id('filter_search').value=''; this.form.submit();"><?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?></button>
        </div>
        <div class="filter-select fltrt">
            <select name="filter_published" class="inputbox" onchange="this.form.submit()">
                <option value=""><?php echo JText::_('JOPTION_SELECT_PUBLISHED');?></option>
                <?php echo JHtml::_('select.options', JHtml::_('jgrid.publishedOptions'), 'value', 'text', $this->state->get('filter.published'), true);?>
            </select>
        </div>
        <div class="filter-type fltrt">
            <select name="filter_type" class="inputbox" onchange="this.form.submit()">
                <option value=""><?php echo JText::_('COM_CURRICULUM_OPTION_SELECT_TYPE');?></option>
                <?php echo JHtml::_('select.options', $this->types, 'type_id', 'type_id', $this->state->get('filter.type'), true);?>
            </select>
        </div>
    </fieldset>
    <table class="adminlist">
        <thead>
        <tr>
            <th width="1%">
                <input type="checkbox" name="checkall-toggle" value="" onclick="checkAll(this)" />
            </th>
            <th><?php echo JHtml::_('grid.sort', 'COM_CURRICULUM_FIELD_ITEM_NAME_LABEL', 'item_name', $listDir, $listOrder) ?></th>
            <th><?php echo JHtml::_('grid.sort', 'COM_CURRICULUM_FIELD_ITEM_TYPE_LABEL', 'item_type', $listDir, $listOrder)?></th>
            <th><?php echo JHtml::_('grid.sort', 'JSTATUS', 'published', $listDir, $listOrder) ?></th>
        </tr>
        </thead>
        <tfoot>
            <tr>
                <td colspan="4">
                    <?php echo $this->pagination->getListFooter(); ?>
                </td>
            </tr>
        </tfoot>
        <tbody>
        <?php foreach ($this->items as $i => $item): ?>
            <tr class="row<?php echo $i % 2 ?>">
                <td class="center">
                    <?php echo JHtml::_('grid.id', $i, $item->item_id); ?>
                </td>
                <td>
                    <a href="<?php echo $item->url; ?>">
                        <?php echo $this->escape($item->item_name) ?></a>
                </td>
                <td><?php echo $this->escape($item->item_type) ?></td>
                <td class="center">
                    <?php echo JHtml::_('jgrid.published', $item->published, $i, 'item.', true, 'cb'); ?>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>

    <input type="hidden" name="task" value="" />
    <input type="hidden" name="boxchecked" value="0" />
    <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
    <input type="hidden" name="filter_order_Dir" value="<?php echo $listDir; ?>" />
    <?php echo JHtml::_('form.token'); ?>
</form>