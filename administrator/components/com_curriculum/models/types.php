<?php
/**
 * Created by PhpStorm.
 * User: Curtis
 * Date: 12/23/2014
 * Time: 7:23 AM
 */
defined('_JEXEC') or die("Access Denied");
jimport('joomla.application.component.modellist');

class CurriculumModelTypes extends JModelList
{
    /*public function getItems()
    {
        $types = parent::getItems();

        return $types;
    }
*/
    public function getListQuery()
    {
        $query = parent::getListQuery();

        $query->select('type_id');
        $query->from('#__curriculum_type');

        return $query;
    }
}