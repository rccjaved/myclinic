<?php namespace MyClinic\Doctor\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class HodDoctor extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('MyClinic.Doctor', 'Doc', 'doc-spec-location-hod');
    }
}
