<?php

class TransalteController extends Zend_Controller_Action {

    protected $_translate = null;

    public function init() {
//        $this->_translate = new Zend_Translate('array', APPLICATION_PATH . '/languages/message.fr_FR.php', 'fr_FR');
//        $this->_translate->addTranslation(APPLICATION_PATH . '/languages/message.de_DE.php', 'de_DE');
//        $this->_translate->addTranslation(APPLICATION_PATH . '/languages/message.en_UK.php', 'en_UK');
//        $this->view->translate = $this->_translate;

        $this->_translate = Zend_Registry::get('Zend_Translate');        
    }

    public function indexAction() {

//            $this->view->message = sprintf('%s, %s, %s', $this->translate('one'), $this->translate('two'), $this->translate('three'));
        $this->view->message = sprintf('%s, %s, %s', $this->_translate->_('one'), $this->_translate->_('two'), $this->_translate->_('three'));
//        $this->view->message_1 = $this->_translate->_('welcome') . ', ' . $this->_translate->_('home') . '...!!';
//        $this->_translate->setLocale('de_DE');
//        $this->view->message2 = sprintf('%s, %s, %s', $this->_translate->_('one'), $this->_translate->_('two'), $this->_translate->_('three'));
//        $this->_translate->setLocale('en_UK');
//        $this->view->message3 = sprintf('%s, %s, %s', $this->_translate->_('one'), $this->_translate->_('two'), $this->_translate->_('three'));
    }

}

