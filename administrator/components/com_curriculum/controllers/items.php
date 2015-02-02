<?php
/**
 * Created by PhpStorm.
 * User: Curtis
 * Date: 12/22/2014
 * Time: 7:03 PM
 */
defined('_JEXEC') or die('Access Denied');

jimport('joomla.application.component.controlleradmin');

class CurriculumControllerItems extends JControllerAdmin {

    protected $text_prefix = 'COM_CURRICULUM_ITEMS';

    public function getModel($name = 'Item', $prefix = 'CurriculumModel', $config = array('ignore_request' => true))
    {
        $model = parent::getModel($name, $prefix, $config);

        return $model;
    }
}