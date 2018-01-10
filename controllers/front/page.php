<?php

if (!defined('_PS_VERSION_'))
    exit;

class pwtestmodulePageModuleFrontController extends ModuleFrontController
{
    public $module;


    public function initContent()
    {
        
        parent::initContent();
        $this->setTemplate('page.tpl');
    }

    public function postProcess()
    {
        /**
         * Для POST запросов
         */
    }


}
