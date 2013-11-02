<?php

class Application_Model_Users {

    private $_dbtable;

    public function __construct() {
        $this->_dbtable = new Application_Model_DbTable_Users();
    }

    public function getProjectsForUserId($userId) {
        $user = $this->_dbtable->fetchRow("id = $userId");
        $dependentRowset = $user->findDependentRowset('Application_Model_DbTable_Project');
        return $this->getFormatedData($user, $dependentRowset);
    }

    private function getFormatedData($user, $projects) {
        $userArray = array(
            'id' => $user['id'],
            'email' => $user['email'],
            'password' => $user['password'],
            'details' => json_decode($user['details']),
            'user_type' => $user['user_type'],
        );
        $projectArray = array();
        foreach ($projects as $project) {
            $localArray = array(
                'id' => $project['id'],
                'details' => json_decode($project['details']),
                'user_id' => $project['user_id'],
                'status' => $project['status'],
                'finalized' => $project['finalized']
            );
            array_push($projectArray, $localArray);
        }
        $mainArray = array(
            'user' => $userArray,
            'projects' => $projectArray,
        );
        return $mainArray;
    }

}

