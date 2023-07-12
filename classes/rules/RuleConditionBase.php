<?php namespace Waka\WakaBlocs\Classes\Rules;



class RuleConditionBase extends SubForm
{
    private $error;
    protected $morphName;                              
    /**
     * Returns information about this rule, including name and description.
     */
    public function __construct($host = null)
    {
        $this->morphName = 'conditioneable';
        $this->init('/waka/wakablocs/models/rules/fields_condition.yaml');
        if (!$this->host = $host) {
            return;
        }
        $this->boot($host);
    }

    public function setError($error = null) {
        $errorName = $error ? $error : $this->getText();
        $this->error = $errorName;
    }

    public function getError() {
        return $this->error ? $this->error : 'Erreur condition non spécifié';
    }
    public function listOperators() {
        return [
            'count' => 'Compter',
            'existe' => 'Existe',
            'existePas' => 'N\'Existe pas',
            'where' => "Est égale à ",
            'whereNot' => "Est différent de",
            'wherein' => "Est dans ces valeurs",
            'whereNotIn' => "N'est pas dans ces valeurs",
        ];
    }
    
}
