<?php

class DbtestController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
//       $userDb = new Application_Model_Users();
//        $projectsForUserId = $userDb->getProjectsForUserId(3);
//        echo '<pre>';
//        print_r($projectsForUserId);
//        echo '</pre>';
        
        $projectDb = new Application_Model_Project();
        $project = $projectDb->getProjectDetails(1);
        echo '<pre>';
        print_r($project);
        echo '</pre>';
        
    }

}

