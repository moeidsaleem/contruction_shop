<?php
namespace App\View\Helper;
use Cake\View\View;
use Cake\View\Helper;
use Cake\Core\Configure;

class GeneralHelper extends Helper
{
    public $helpers = array('Html');

    public function __construct(View $view, $config = [])
    {
        parent::__construct($view, $config);
    }
	
	public function example(){
		return "TEST";
	}
}

/*
 * public $helpers = ['General' => ['key' => 'val']];
 * echo $this->General->example();
 * */
