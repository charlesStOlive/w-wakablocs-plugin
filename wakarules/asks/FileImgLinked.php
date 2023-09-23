<?php namespace Waka\WakaBlocs\WakaRules\Asks;

use Waka\WakaBlocs\Classes\Rules\AskBase;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use ApplicationException;
use Waka\WakaBlocs\Interfaces\Ask as AskInterface;

class FileImgLinked extends AskBase implements AskInterface
{
    protected $tableDefinitions = [];

    /**
     * Returns information about this event, including name and description.
     */
    public function subFormDetails()
    {
        return [
            'name'        => 'Une image liée',
            'description' => 'Une image du modèle ou d\'un modèle parent',
            'share_mode' => 'ressource',
            'icon'        => 'icon-picture-o',
            'outputs' => [
                'word_type' => 'IMG',
            ]
        ];
    }

    public function defineValidationRules()
    {
        return [
            'srcImage' => 'required',
            'image' => 'required',
            'width' => 'required|numeric',
            'height' => 'required|numeric',
        ];
    }

    public function getText()
    {
        $hostObj = $this->host;
        $url = $hostObj->config_data['image'] ?? null;
        $src = $hostObj->config_data['srcImage'] ?? null;
        if($url) {
            return "image : ".$url. " | "."source : ".$src;
        }
        return parent::getText();

    }

    public function listSelfParent()
    {
        $src = $this->getDs();
        if($src) {
            return $src->getSrcImage();
        }
        return [];
    }

    public function listLinkedImage()
    {
        $src = $this->getDs();
        if(!$src) {
            return [];
        }
        $code = $this->host->srcImage ?? $this->getDs()->code;
        $src = $this->getDs()->getImagesFilesFrom('System\Models\File', $code);
        return $src;
    }
    public function listCropMode()
    {
        $config =  \Config::get('waka.wakablocs::image.baseCrop');
        //trace_log($config);
        return $config;
        
    }

    public function resolve($modelSrc, $context = 'twig', $dataForTwig = []) {
        $clientModel = $modelSrc;
        //$clientModel = $this->getClientModel($clientId);
        $finalModel = null;
        //get configuration
        $configs = $this->getConfigs();
        $keyImage = $configs['image'] ?? null;
        $src = $configs['srcImage'] ?? null;
        $width = $configs['width'] ?? null;
        $height = $configs['height'] ?? null;
        $quality = $configs['quality'] ?? 1;
        
        $imgWidth = $width *   floatval($quality);
        $imgHeight =  $height *   floatval($quality);

        $crop = $configs['crop'] ?? 'exact';
        
        //creation de la donnés
        if($src != $this->getDs()->code) {
            $finalModel = $clientModel->{$src};
        } else {
            $finalModel = $clientModel;
        }
        //trace_log('resolve');
        //trace_log($configs);
        //trace_log($this->getConfig('width'));
        //trace_log($this->getConfig('height'));
        if($context == 'twig' ) {
            return [
                'path' => $finalModel->{$keyImage}->getThumb($imgWidth, $imgHeight, ['mode' => $crop]),
                'width' => $width . 'px',
                'height' => $height . 'px',
                'title' => $this->getConfig('title'),
            ];
        } else {
            return [
                'path' => $finalModel->{$keyImage}->getThumb($imgWidth, $imgHeight, ['mode' => $crop]),
                'width' => $width . 'px',
                'height' => $height . 'px',
                'ratio' => true,
                'title' => $this->getConfig('title'),
            ];
        }
    }
}
