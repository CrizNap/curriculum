<?php
/**
 * Created by PhpStorm.
 * User: Curtis
 * Date: 12/21/2014
 * Time: 6:39 PM
 */
defined('_JEXEC') or die("Access Denied");
jimport('joomla.application.component.view');

class CurriculumViewItems extends JView
{
    protected $items;
    protected $pagination;
    protected $state;
    protected $types;

    public function display($tpl = null)
    {
        $doc = JFactory::getDocument();
        $doc->addStyleSheet(JURI::root().'media/com_curriculum/css/curriculum.css');

        $this->items = $this->get('Items');
        $this->pagination = $this->get('Pagination');
        $this->state = $this->get('State');
        $this->types = $this->get('Items', 'types');

        $this->addToolbar();

        parent::display($tpl);
    }

    public function addToolbar()
    {
        JToolBarHelper::title(JText::_('COM_CURRICULUM_ITEMS_TITLE'), 'curriculum.png');

        JToolBarHelper::addNew('item.add');
        JToolBarHelper::editList('item.edit');

        JToolBarHelper::divider();

        JToolBarHelper::publishList('items.publish');
        JToolBarHelper::unpublishList('items.unpublish');

        JToolBarHelper::divider();

        JToolBarHelper::archiveList('items.archive');

        JToolBarHelper::trash('items.trash');
    }
}