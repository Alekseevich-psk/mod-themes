<?php

class ModThemes
{
    private $nameComponent = 'modthemes';
    private $sysKey = 'mod_themes_theme';

    private $versionModx;
    private $systemSetting;
    private $selectTheme;
    private $assetsPath;
    private $modx;

    public function __construct($modx)
    {
        $this->modx = $modx;
        $this->versionModx = $modx->getVersionData()['version'];
        $this->systemSetting = $modx->getObject('modSystemSetting', array('key' => $this->sysKey));
        $this->selectTheme = $this->systemSetting->value;
        $this->assetsPath = $modx->getOption('assets_path');

        $this->init();
    }

    private function createSystemSetting()
    {
        $obj = $this->modx->newObject('modSystemSetting');
        $obj->set('key', $this->sysKey);
        $obj->set('value', '');
        $obj->set('xtype', 'textfield');
        $obj->set('namespace', $this->nameComponent);
        $obj->set('area', $this->nameComponent);
        $obj->save();

        $cacheRefreshOptions = array('system_settings' => array());
        $this->modx->cacheManager->refresh($cacheRefreshOptions);
    }

    private function addCssFile($selectTheme)
    {
        $pathCssFile = 'components/' . $this->nameComponent . '/css/mgr/' . $this->versionModx . "/" . $selectTheme . '.css';

        if (file_exists($this->assetsPath . $pathCssFile)) {
            $this->modx->controller->addCss($this->assetsPath . $pathCssFile);
        }
    }

    public function init()
    {
        if (!$this->selectTheme && $this->selectTheme !== "") {
            $this->createSystemSetting();
        }

        if ($this->selectTheme === "") {
            $this->addCssFile($this->selectTheme);
        }
    }
}

new ModThemes($modx);