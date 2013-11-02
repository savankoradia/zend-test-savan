<?php

class Application_Form_Uploadtest extends Zend_Form {

    public function init() {
        $this->setMethod("post")
                ->setAttribs(array(
                    'enctype'=>'multipart/form-data',
                    'target'=>'uploadTarget',
                    'id'=>'files-upload-form',
                    'onsubmit'=>'observeProgress()'));

        $files = new Zend_Form_Element_File('files');
        $files->setDestination('/var/www/zend-test/public/upload/image')
                ->setMultiFile(3)
                ->setValueDisabled(true);
        
        #submit
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel("Upload")
                ->setAttribs(array('class' => 'btn btn-success'));

        #
        $this->addElements(array($files, $submit));
    }

}

