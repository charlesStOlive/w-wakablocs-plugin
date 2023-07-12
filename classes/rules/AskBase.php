<?php namespace Waka\WakaBlocs\Classes\Rules;


/**
 * Notification ask base class
 *
 * @package waka\utils
 * @author Alexey Bobkov, Samuel Georges
 */
class AskBase extends SubForm
{
    protected $morphName;                              

    /**
     * Constructeur 
     */

    public function __construct($host = null)
    {
        $this->morphName = 'askeable';
        $this->init('/waka/wakablocs/models/rules/fields_ask.yaml');
        if (!$this->host = $host) {
            return;
        }
        $this->boot($host);
    }
    public function defaultExport() {
        return [
            'photo' => 'file',
            'photos' => 'files',
        ];
    }

    /**
     * Fonction unisque sur ASK
     */

    public function getWordType()
    {
        return array_get($this->subFormDetails(), 'outputs.word_type');
    }

    public function resolve($modelSrc, $context = 'twig', $dataForTwig = []) {
        return 'resolve is missing in '.$this->getSubFormName();
    }

}
