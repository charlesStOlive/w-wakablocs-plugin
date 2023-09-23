<?php namespace Waka\WakaBlocs\WakaRules\Contents;

use Waka\WakaBlocs\Classes\Rules\RuleContentBase;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use ApplicationException;
use Waka\WakaBlocs\Interfaces\RuleContent as RuleContentInterface;

class Md extends RuleContentBase implements RuleContentInterface
{
    /**
     * Returns information about this event, including name and description.
     */
    public function subFormDetails()
    {
        return [
            'name'        => 'Champs Marque down',
            'description' => 'Un simple champs Markdown.',
            'icon'        => 'icon-md5',
            'premission'  => 'wcli.utils.cond.edit.admin',
        ];
    }

    public function getText()
    {
        //trace_log('getText HTMLASK---');
        $hostObj = $this->host;
        //trace_log($hostObj->config_data);
        $text = $hostObj->config_data['md'] ?? null;
        if($text) {
            return $text;
        }
        return parent::getText();

    }

    public function listCropMode()
    {
        $config =  \Config::get('waka.wakablocs::image.baseCrop');
        //trace_log($config);
        return $config;
        
    }

    /**
     * IS true
     */

    public function resolve($ds = []) {
        $data = $this->getConfigs();
        return $data;
    } 
}
