<?php

class ZfconfigController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        $data = array(
            'production' => array(
                'resources'=> array(
                    'db'=>array(
                        'adapter1' => 'PDO_MYSQL',
                        'params'=>array(
                            'host'=>'new_host',
                            'username'=>'new_user',
                            'password'=>'new_pass',
                            'dbname'=>'test'
                        ),
                    ),
                ),
            ),
        );
        
        $config= new Zend_Config_Writer_Ini();
        $config->setNestSeparator(":");
        $filename = APPLICATION_PATH.'/config/application.ini';
        $objConfig = new Zend_Config($data);
        $config->write($filename,$objConfig);
    }

}

