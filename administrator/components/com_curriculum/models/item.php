<?php
/**
 * Created by PhpStorm.
 * User: Curtis
 * Date: 12/22/2014
 * Time: 6:59 PM
 */
defined('_JEXEC') or die('Access Denied');

jimport('joomla.application.component.modeladmin');

class CurriculumModelItem extends JModelAdmin {

    public function getTable($type = 'Item', $prefix = 'CurriculumTable', $config = array()) {
        return JTable::getInstance($type, $prefix, $config);
    }

    protected function loadFormData()
    {
        $data = JFactory::getApplication()->getUserState('com_curriculum.edit.item.data', array());

        if(empty($data)) {
            $data = $this->getItem();
        }

        return $data;
    }

    public function getForm($data = array(), $loadData = true) {
        $form = $this->loadForm('com_curriculum.item', 'item', array('control' => 'jform', 'load_data' => $loadData));

        return $form;
    }
}