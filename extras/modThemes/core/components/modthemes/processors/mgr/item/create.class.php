<?php

class modThemesCreateProcessor extends modObjectCreateProcessor
{
    public $objectType = 'modThemes';
    public $classKey = 'modThemes';
    public $languageTopics = ['modThemes'];

    /**
     * @return bool
     */
    public function beforeSet()
    {
        $name = trim($this->getProperty('name'));
        if (empty($name)) {
            $this->modx->error->addField('name', $this->modx->lexicon('modthemes_item_err_name'));
        } elseif ($this->modx->getCount($this->classKey, ['name' => $name])) {
            $this->modx->error->addField('name', $this->modx->lexicon('modthemes_item_err_ae'));
        }

        return parent::beforeSet();
    }

}

return 'modThemesCreateProcessor';