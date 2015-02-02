<?php
/**
 * Created by PhpStorm.
 * User: Curtis
 * Date: 12/20/2014
 * Time: 8:33 AM
 */
defined('_JEXEC') or die("Access Denied");
jimport('joomla.application.component.controller');

$controller = JController::getInstance('Curriculum');
$controller->execute(JRequest::getCmd('task'));
$controller->redirect();
