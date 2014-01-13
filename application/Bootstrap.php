<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

    protected function _initTranslate() {
        $translate = new Zend_Translate('array', APPLICATION_PATH . '/languages/', null, array('scan' => Zend_Translate::LOCALE_FILENAME, 'disableNotices' => 1));
//        $translate->setLocale('de_DE');
        $registry = Zend_Registry::getInstance();
        $registry->set('Zend_Translate', $translate);
    }

    protected function _initLocale() {
        $locale = null;
        $localeArray = array('en_US', 'de_DE', 'fr_FR', 'gu_IN');
        $session = new Zend_Session_Namespace('temp_creation');
        
        if (isset($_GET['locale']) && $_GET['locale'] != null && $_GET['locale'] != '' && in_array($_GET['locale'], $localeArray)) {
            $locale = new Zend_Locale($_GET['locale']);
        } else {
            if ($session->locale) {
                $locale = new Zend_Locale($session->locale);
            }
        }

        if ($locale === null) {
            try {
                $locale = new Zend_Locale('browser');
            } catch (Zend_Locale_Exception $e) {
                $locale = new Zend_Locale('en_GB');
            }
        }
        $session->locale = $locale;

        $translate = Zend_Registry::get('Zend_Translate');
        $translate->setLocale($session->locale);
        $registry = Zend_Registry::getInstance();
        $registry->set('Zend_Locale', $locale);
    }

}