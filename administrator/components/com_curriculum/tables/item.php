<?php
/**
 * Created by PhpStorm.
 * User: Curtis
 * Date: 12/22/2014
 * Time: 10:50 PM
 */
defined('_JEXEC') or die('Access Denied');

class CurriculumTableItem extends JTable {

    public function __construct(&$db) {
        parent::__construct('#__curriculum_item', 'item_id', $db);
    }

    // Not being called to modify the options
    public function bind($array, $ignore = '')
    {
        if (isset($array['optional']) && is_array($array['optional'])) {
            echo '<pre>';
            print_r($array['optional']);
            echo '</pre>';
        }

        return parent::bind($array, $ignore);
    }

    public function check()
    {
        if(trim($this->item_alias) == ''){
            $this->item_alias = $this->item_name;
        }

        $this->item_alias = JApplication::stringURLSafe($this->item_alias);

        return true;
    }
}