<?php

class Application_Model_Details {

    private $_dbtable;

    public function __construct() {
        $this->_dbtable = new Application_Model_DbTable_Details();
    }

    public function getDetailsById($id) {
        $detail = $this->_dbtable->fetchRow("id = $id ");
        $findParentRow = $detail->findParentRow('Application_Model_DbTable_Project');
        return $this->getFormated($detail, $findParentRow);
    }
    
    protected function getFormated($detail,$parent) {
        $array = array(
            'detail' => array(
                'id'=> $detail['id'],
                'detail' => json_decode($detail['details']),
                'type' => $detail['type'],
                'status' => $detail['status'],
            ),
            'project' => array(
                'id' => $parent['id'],
                'details' => json_decode($parent['details']),
                'user_id' => $parent['user_id'],
                'status' => $parent['status'],
                'finalized' => $parent['finalized']
            ),
        );
        return $array;
    }
    
}

