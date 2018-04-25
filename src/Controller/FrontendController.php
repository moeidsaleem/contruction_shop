<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Routing\Router;
use App\Controller\AppController;



class FrontendController extends AppController {
	//public $layout = 'frontend';	
	
    public function initialize()
    {
        parent::initialize();
		$this->viewBuilder()->layout('frontend');
        $this->response->disableCache();
		$this->set('webroot_full', Router::url('/', true));
		
		//FB Config
        if(Configure::read('environment') == 'local')
        {
            Configure::write('FB_appID', '185653771463161');
        }
        else if(Configure::read('environment') == 'preview')
        {
            Configure::write('FB_appID', '185653771463161');
        }
        else if(Configure::read('environment') == 'live')
        {
            Configure::write('FB_appID', '1498871830425701');
        }
		$this->set('FB_appID', Configure::read('FB_appID'));
		
    }

	public function index() {
		echo '<br>';
		echo '<br>default_locale : '.$this->default_locale;	
		echo '<br>language : '.$this->language		;
		echo '<br>user_locale : '.$this->user_locale		;
		echo '<br>';
		echo $this->viewVars['FB_appID'];	
		$this->helpers = array('JqueryUpload');
	}
}
