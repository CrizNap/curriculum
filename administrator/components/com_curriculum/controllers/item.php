<?php
/**
 * Created by PhpStorm.
 * User: Curtis
 * Date: 12/22/2014
 * Time: 9:20 PM
 */
defined('_JEXEC') or die('Access Denied');
jimport('joomla.application.component.controllerform');

class CurriculumControllerItem extends JControllerForm
{
    // The view we are redirected to after editing is finished
    protected $view_list = 'items';
}