<?php

class Application_Model_DbTable_Project extends Zend_Db_Table_Abstract
{

    protected $_name = 'project';
    protected $_primary = 'id';
    protected $_dependentTables = array('Application_Model_DbTable_Details');
    protected $_referenceMap  = array(
        'User' =>array(
            'columns'=> array('user_id'),
            'refTableClass' => 'Application_Model_DbTable_Users',
            'refColumns'=>array('id'),
        ),
    );

}

