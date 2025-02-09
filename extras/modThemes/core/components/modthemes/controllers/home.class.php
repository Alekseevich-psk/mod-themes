<?php

/**
 * The home manager controller for modThemes.
 * Not used.
 *
 */
class modThemesHomeManagerController extends modThemesMainController
{
    /* @var modThemes $modThemes */
    public $modThemes;

    /**
     * @param array $scriptProperties
     */
    public function process(array $scriptProperties = array()) {}


    /**
     * @return null|string
     */
    public function getPageTitle()
    {
        return $this->modx->lexicon('modthemes');
    }


    /**
     * @return void
     */
    public function loadCustomCssJs()
    {
    }


    /**
     * @return string
     */
    public function getTemplateFile()
    {
        return $this->modThemes->getOption('templatesPath') . 'home.tpl';
    }
}
