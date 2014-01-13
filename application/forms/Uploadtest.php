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
        $files->setDestination('C:\wamp\www\allDownloads')
                //->setMultiFile(1)
                ->setValueDisabled(true);
        
        #submit
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel("Upload")
                ->setAttribs(array('class' => 'btn btn-success'));

        #
        $this->addElements(array($files, $submit));
    }

}

