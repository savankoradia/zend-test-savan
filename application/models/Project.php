<?php

class Application_Model_Project {

    private $_dbtable;

    public function __construct() {
        $this->_dbtable = new Application_Model_DbTable_Project();
    }

    public function getById($id) {
        $select = $this->_dbtable->select();
        $select->where("id = ?", $id);
        $fetchAll = $this->_dbtable->fetchAll($select);
        return $this->getFormatedProject($fetchAll[0]);
    }

    public function getProjectDetails($projectId) {
        $project = $this->_dbtable->fetchRow("id = $projectId");
        $details = $project->findDependentRowset('Application_Model_DbTable_Details');
        return $this->getFormatedProjectWithDetails($project, $details);
    }

    private function getFormatedProject($data) {
        $array = array(
            'id' => $data['id'],
            'details' => json_decode($data['details']),
            'user_id' => $data['user_id'],
            'status' => $data['status'],
            'finalized' => $data['finalized']
        );
        return $array;
    }

    private function getFormatedProjectWithDetails($project, $details) {
        $projectArray = $this->getFormatedProject($project);
        $detailsArray = array();
        foreach ($details as $detail) {
            $localArray = array(
                'id' => $detail['id'],
                'detail' => json_decode($detail['details']),
                'type' => $detail['type'],
                'status' => $detail['status'],
            );
            array_push($detailsArray, $localArray);
        }
        $mainArray = array(
            'project' => $projectArray,
            'details' => $detailsArray,
        );
        return $mainArray;
    }

}

