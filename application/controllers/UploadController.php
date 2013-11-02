<?php

class UploadController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        $form = new Application_Form_Uploadtest();

        if ($this->getRequest()->isPost()) {
            if ($form->isValid($this->getRequest()->getPost())) {
                $values = $form->getValues();
                $this->_helper->layout->disableLayout();
                $this->_helper->viewRenderer->setNoRender(true);

                if (!$form->files->receive()) {
                    throw new Zend_File_Transfer_Exception('Reciving files failed');
                }

                $uploadedFilePaths = $form->files->getFileName();

                if (empty($uploadedFilePaths)) {
                    $this->view->message = "No File Uploaded.";
                }

                if (!is_array($uploadedFilePaths)) {
                    $uploadedFilePaths = (array) $uploadedFilePaths;
                }
// echo '<script>window.top.location.href = "'.$this->view->baseUrl().'/uploader/success'.'";</script>'; 
//                $this->_redirect("/uploader/success");
                exit;
            }
        }


        $this->view->form = $form;
        $this->view->maxUploadFileSize = ini_get('upload_max_filesize');
        $this->view->postMaxSize = ini_get('post_max_size');
    }

    public function successAction() {
        // action body
    }

    public function progressAction() {
        $data = uploadprogress_get_info($_GET['uploadId']);
        $bytesTotal = ($data === null ? 0 : $data['bytes_total']);
        $bytesUploaded = ($data === null ? 0 : $data['bytes_uploaded']);
        $adapter = new Zend_ProgressBar_Adapter_JsPull();
        $progressBar = new Zend_ProgressBar($adapter, 0, $bytesTotal, 'uploadProgress');

        if ($bytesTotal === $bytesUploaded) {
            $progressBar->finish();
        } else {
            print_r($bytesUploaded);
            $progressBar->update($bytesUploaded);
        }
    }

}

