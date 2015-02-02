<?php
/**
 * Created by PhpStorm.
 * User: Curtis
 * Date: 12/20/2014
 * Time: 11:29 AM
 */
defined('_JEXEC') or die('Access Denied');
jimport('joomla.application.component.controller');

class CurriculumController extends JController{

    public function display( $cachable = false, $urlparam = array() )
    {
        $input = JFactory::getApplication()->input;
        $viewName = $input->get('view');
        $view = $this->getView("items", 'html');

        switch ($viewName)
        {
            case "items":
                $model = $this->getModel('items');
                $view->setModel($model, true);

                // set the second model
                $typesModel = $this->getModel('types');
                $view->setModel($typesModel);
                break;
        }

        //$view->display();
        parent::display($cachable);
    }
}