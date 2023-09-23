<?php namespace Waka\WakaBlocs\Wblocs;

use Waka\WakaBlocs\Classes\WakaBlocs;

class HtmlBloc extends WakaBloc
{
    
    use \Waka\Wutils\Classes\Traits\DbUtils; //RuleHepers contient notamment listsNested
    protected $tableDefinitions = [];
    public $extendMediaTypes = [];

    /**
     * Returns information about this event, including name and description.
     */
    public function blocConfig()
    {
        return [
            'name'        => 'Champs HTML',
            'description' => 'Un simple champs HTML',
            'icon'        => 'icon-html5',
        ];
    }

    public function getRaw()
    {
        return $this->

    }

    /**
     * IS true
     */

    public function resolve($datas = []) {
        //trace_log('resolve');
        $imageMode = $this->getConfig('imageMode');
        $objImage = null;
        $functionResolverName = 'dynamise'.studly_case($imageMode);
        $options = [
            'width' =>  $this->getConfig('opt_i_width'),
            'height' => $this->getConfig('opt_i_height'),
            'crop' => $this->getConfig('opt_i_crop'),
        ];
        //trace_log($imageMode);
        //trace_log($functionResolverName);
        

        if($this->methodExists($functionResolverName)) {
            $objImage = $this->$functionResolverName($datas, $options);
        } else {
            //\Log::error($functionResolverName." n'existe pas");
        }
        //Création de la fonction dynamique en fonction de staticImage. Compliqué mais permet d'étendre les fonctions...
        $data = $this->getConfigs();
        //trace_log('resolve');
        $data['html'] = \Twig::parse($data['html'], $datas);
        if($data['img_link'] ?? false) {
            $data['img_link'] = \Twig::parse($data['img_link'], $datas);
        }
        //on ajoute toutes les données du formulaire
        $data = array_merge($data, ['image' => $objImage]);
        
        //trace_log($data);
        return $data;
    }
    
}
