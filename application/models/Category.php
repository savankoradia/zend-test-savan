<?php

class Application_Model_Category {

    private $_dbtable = null;

    public function __construct() {
        $this->_dbtable = new Application_Model_DbTable_Category();
    }

    public function fetchAll() {
        $fetchAll = $this->_dbtable->fetchAll()->toArray();
        return json_encode($fetchAll);
    }

}

