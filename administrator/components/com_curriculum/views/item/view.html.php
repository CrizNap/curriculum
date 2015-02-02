<?php
defined('_JEXEC') or die('Access Denied');
jimport('joomla.application.component.view');

class CurriculumViewItem extends JView
{
    protected $item;
    protected $form;

    public function display($tpl = null)
    {
        $this->item = $this->get('Item');
        $this->form = $this->get('FORM');

        $this->addToolbar();

        parent::display($tpl);
    }

    public function addToolbar()
    {
        if($this->item->item_id) {
            JToolBarHelper::title(JText::_('COM_CURRICULUM_EDIT_ITEM_TITLE'));
        }
        else{
            JToolBarHelper::title(JText::_('COM_CURRICULUM_ADD_ITEM_TITLE'));
        }

        JToolBarHelper::apply('item.apply', 'JTOOLBAR_APPLY');
        JToolBarHelper::save('item.save', 'JTOOLBAR_SAVE');
        JToolBarHelper::save2new('item.save2new', 'JTOOLBAR_SAVE_AND_NEW');

        JToolBarHelper::cancel('item.cancel');
    }
}