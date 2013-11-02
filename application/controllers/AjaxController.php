<?php

class AjaxController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        
    }

    public function categoryAction() {
        $this->_helper->layout()->disableLayout();
        $catDb = new Application_Model_Category();
        $fetchAll = $catDb->fetchAll();
        print_r($fetchAll);
    }

}

