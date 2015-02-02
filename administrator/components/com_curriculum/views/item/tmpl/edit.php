<?php
/**
 * Created by PhpStorm.
 * User: Curtis
 * Date: 12/22/2014
 * Time: 10:54 PM
 */
defined('_JEXEC') or die('Access Denied');

?>

<form action="index.php?option=com_curriculum&amp;item_id=<?php echo $this->item->item_id ?>" method="post" name="adminForm" class="form-validate">
    <div class="width-70 fltlft">
        <fieldset class="adminform">
            <ul class="adminformlist">
                <?php foreach ($this->form->getFieldset('essential') as $field): ?>
                <li><?php echo $field->label; echo $field->input; ?></li>
                <?php endforeach ?>
            </ul>

            <div class="clr"></div>
            <?php echo $this->form->getLabel('item_description'); ?>
            <div class="clr"></div>
            <?php echo $this->form->getInput('item_description'); ?>
        </fieldset>
    </div>
    <div class="width-30 fltrt">
        <?php echo JHtml::_('sliders.start', 'option-slider'); ?>
            <?php echo JHtml::_('sliders.panel', JText::_("COM_CURRICULUM_SLIDER_PANEL_TECHNIQUE_LABEL"), "technique-options"); ?>
            <fieldset class="panelform">
                <ul class="adminformlist">
                    <?php foreach ($this->form->getFieldset('technique') as $field): ?>
                        <li><?php echo $field->label; echo $field->input; ?></li>
                    <?php endforeach ?>
                </ul>
            </fieldset>
        <?php echo JHtml::_('sliders.panel', JText::_("COM_CURRICULUM_SLIDER_PANEL_BASIC_LABEL"), "basic-options"); ?>
        <fieldset class="panelform">
            <ul class="adminformlist">
                <?php foreach ($this->form->getFieldset('basic') as $field): ?>
                    <li><?php echo $field->label; echo $field->input; ?></li>
                <?php endforeach ?>
            </ul>
        </fieldset>
        <?php echo JHtml::_('sliders.end'); ?>
    </div>
    <input type="hidden" name="task" value="" />
    <?php echo JHtml::_('form.token'); ?>
</form>