<?php

class Application_Model_DbTable_Details extends Zend_Db_Table_Abstract {

    protected $_name = 'details';
    protected $_primary = 'id';
    protected $_referenceMap = array(
        'Project' => array(
            'columns' => array('project_id'),
            'refTableClass' => 'Application_Model_DbTable_Project',
            'redColumns' => array('id'),
        ),
    );

}

