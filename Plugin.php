<?php

namespace Waka\WakaBlocs;

use Backend;
use Event;
use Lang;
use System\Classes\CombineAssets;
use System\Classes\PluginBase;

/**
 * Utils Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name' => 'Voici mon wakablocs',
            'description' => 'No description provided yet...',
            'author' => 'Waka',
            'icon' => 'icon-leaf',
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {
       CombineAssets::registerCallback(function ($combiner) {
            $combiner->registerBundle('$/waka/wakablocs/formwidgets/rulebuilder/assets/css/rules.less');
        });
    }
    public function registerWakaBlocs()
    {
        return [
            'htm' => [
                ['\Waka\WakaBlocs\Wblocs\HtmlBlocs'],
            ],
            'js' => [],
        ];
    }
    public function registerWakaRules()
    {
        return [
            'asks' => [
                ['\Waka\WakaBlocs\WakaRules\Asks\LabelAsk'],
                ['\Waka\WakaBlocs\WakaRules\Asks\HtmlAsk'],
                ['\Waka\WakaBlocs\WakaRules\Asks\codeHtml'],
                ['\Waka\WakaBlocs\WakaRules\Asks\ImageAsk'],
                ['\Waka\WakaBlocs\WakaRules\Asks\FileImgLinked'],
                ['\Waka\WakaBlocs\WakaRules\Asks\Content'],
                ['\Waka\WakaBlocs\WakaRules\Asks\Content'],
                ['\Waka\WakaBlocs\WakaRules\Asks\FilesImgsLinkeds'],
            ],
            'blocs' => [],
            'contents' => [
                ['\Waka\WakaBlocs\WakaRules\Contents\Html'],
                ['\Waka\WakaBlocs\WakaRules\Contents\ListeImages'],
                ['\Waka\WakaBlocs\WakaRules\Contents\Vimeo'],
                ['\Waka\WakaBlocs\WakaRules\Contents\ComonPartials'],
            ]
        ];
    }

    

    

    public function registerFormWidgets(): array
    {
        return [
            'Waka\WakaBlocs\FormWidgets\RuleBuilder' => 'rulebuilder',
        ];
    }

    

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {
    }

    

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [];
            
    }

    public function registerNavigation()
    {
        return [];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerSettings()
    {
        return [];
    }
}
