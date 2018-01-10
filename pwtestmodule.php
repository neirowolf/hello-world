<?php
if (!defined('_PS_VERSION_'))
    exit;

class pwtestmodule extends Module
{
    public function __construct()
    {
        $this->name = strtolower(get_class());
        $this->tab = 'other';
        $this->version = 0.1;
        $this->author = 'PrestaWeb.ru';
        $this->need_instance = 0;
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l("Тестовый модуль");
        $this->description = $this->l("Тестовый модуль");
        //start_controller
        $this->controllers = array('page');
        //end_controller
        $this->ps_versions_compliancy = array('min' => '1.5.0.0', 'max' => _PS_VERSION_);
		
    }
	
	public function uninstall()
	{
	  if (!parent::uninstall()) {
		return false;
	  }
	   $tab = new Tab(Tab::getIdFromClassName('pwtestmoduletab'));
		if (!$tab->delete())return false;
	  return true;
	}

    public function install()
    {

        if ( !parent::install() 
			OR !$this->registerHook(Array(
				'displayLeftColumn',
			))
            
        ) return false;
		
				$tab = new Tab();
		$tab->class_name = 'pwtestmoduletab';
		$tab->id_parent  = 0; 
		$tab->module = $this->name; 
		$tab->name[(int) (Configuration::get('PS_LANG_DEFAULT'))] = $this->l('Вкладка тестового модуля');
		 if (!$tab->add()) return false;
		

        return true;
    }

    

    

    

    


	public function hookdisplayLeftColumn($params){
		return $this->display(__FILE__, 'pwtestmodule.tpl');
	}


}


