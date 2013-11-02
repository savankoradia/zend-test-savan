<?php

class LocaleController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
//        $list = Zend_Locale::getTranslationList('language');
//        foreach ($list as $language => $content) {
//            try {
//                $translation = Zend_Locale::getTranslation($language, 'language', $language);
//                echo '<br>[' . $language . ']' . $translation;
//            } catch (Exception $exc) {
//                //   echo $exc->getTraceAsString();
//            }
//        }
        
        $currency = new Zend_Currency('gu_IN');
        $toCurrency = $currency->toCurrency(100);
        print_r($toCurrency);
        echo '<br>';
        echo '<pre>';
        $translation = Zend_Locale::getLanguageTranslationList('en_US');
        print_r($translation);
        echo '</pre>';
    }

}

