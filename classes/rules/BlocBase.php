<?php namespace Waka\WakaBlocs\Classes\Rules;

use System\Classes\PluginManager;
use Winter\Storm\Extension\ExtensionBase;
use View;


class BlocBase extends SubForm
{
    protected $morphName;

    public function __construct($host = null)
    {
        $this->morphName = 'bloceable';
        $this->init('/waka/wakablocs/models/rules/fields_bloc.yaml');
        if (!$this->host = $host) {
            return;
        }
        $this->boot($host);
        /*
         * Paths
         */
        
    }
}
