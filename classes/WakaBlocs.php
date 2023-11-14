<?php namespace Waka\WakaBlocs\Classes;

use System\Classes\PluginManager;

class WakaBlocs
{
    
    /**
     * UNIQUEMENT POUR RULE pour ASK et FOR on utilise findAsk et findFnc qui sont dans leur prore classes.
     */
    public static function listBlocs($mode,$config, $parent)
    {
        //trace_log('find rules');
        //trace_log($mode);
        $results = [];
        $bundles = PluginManager::instance()->getRegistrationMethodValues('registerWakaBlocs');
        foreach ($bundles as $plugin => $bundle) {
            foreach ((array) array_get($bundle, $mode, []) as $conditionClass) {
                //trace_log($conditionClass[0]);
                $class = $conditionClass[0];
                $onlyClass = $conditionClass['onlyClass'] ?? [];
                $excludeClass = $conditionClass['excludeClass'] ?? [];
                if (!class_exists($class)) {
                    \Log::error($conditionClass[0]. " n'existe pas dans le register rules du ".$plugin);
                    continue;
                }
                
                $obj = new $class;
                //trace_log($obj->getTags());
                //trace_log($obj->getExcludes());
                //trace_log($obj->getIncludes());
                $results[] = $obj;
            }
        }
        return $results;
    }




}
