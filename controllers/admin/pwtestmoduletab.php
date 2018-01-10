<?php

if (!defined('_PS_VERSION_'))exit;

class pwtestmoduletabController extends AdminController
{
	 public function initContent()
     {
          parent::initContent();
          $this->context->smarty->assign('content', '<h1>Тестовое сообщение</h1>');
     }
}