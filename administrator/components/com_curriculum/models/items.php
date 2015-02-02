<?php
/**
 * Created by PhpStorm.
 * User: Curtis
 * Date: 12/21/2014
 * Time: 6:50 PM
 */
defined('_JEXEC') or die("Access Denied");
jimport('joomla.application.component.modellist');

class CurriculumModelItems extends JModelList
{
    public function __construct($config = array())
    {
        if(empty($config['filter_fields'])) {
            $config['filter_fields'] = array(
                'item_name',
                'item_type',
                'published'
            );
        }

        parent::__construct($config);
    }

    public function getItems()
    {
        $itm = parent::getItems();

        foreach ($itm as $i)
        {
            $i->url = 'index.php?option=com_curriculum&amp;task=item.edit&amp;item_id='. $i->item_id;
        }

        return $itm;
    }

    public function getListQuery()
    {
        $query = parent::getListQuery();

        $query->select('*');
        $query->from('#__curriculum_item');

        $published = $this->getState('filter.published');

        if($published == ''){
            $query->where('(published = 1 OR published = 0)');
        } else if ($published != '*') {
            $published = (int) $published;
            $query->where("published = '{$published}'");
        }

        $db = $this->getDbo();
        $search = $this->getState('filter.search');

        if(!empty($search)) {
            $search = '%' . $db->getEscaped($search, true) . '%';

            $field_searches = "item_name LIKE '{$search}'";

            $query->where($field_searches);
        }

        $type = $this->getState('filter.type');

        if(!empty($type) && $type != '*'){
            $query->where("item_type = '{$type}'");
        }

        // Column sorting
        $orderCol = $this->getState('list.ordering');
        $orderDir = $this->getState('list.direction');

        if($orderCol != '') {
            $query->order($db->getEscaped($orderCol.' '.$orderDir));
        }

        return $query;
    }

    protected function populateState($ordering = null, $direction = null)
    {
        $search = $this->getUserStateFromRequest($this->context.'.filter.search', 'filter_search');
        $this->setState('filter.search', $search);

        $published = $this->getUserStateFromRequest($this->context.'.filter.published', 'filter_published');
        $this->setState('filter.published', $published);

        $type = $this->getUserStateFromRequest($this->context.'.filter.type', 'filter_type');
        $this->setState('filter.type', $type);

        parent::populateState($ordering, $direction);
    }
}