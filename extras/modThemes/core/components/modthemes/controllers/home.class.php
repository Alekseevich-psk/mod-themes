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

    public function __construct()
    {
        $this->modx->controller->addCss(MODX_ASSETS_URL.'components/m3-themes/themes.css');
    }


    /**
     * @param array $scriptProperties
     */
    public function process(array $scriptProperties = array()) {}


    /**
     * @return null|string
     */
    public function getPageTitle()
    {
        return $this->modx->lexicon('modThemes');
    }


    /**
     * @return void
     */
    public function loadCustomCssJs()
    {
        $this->addCss($this->modThemes->getOption('cssUrl') . 'mgr/main.css');
        //$this->addCss($this->modThemes->getOption('cssUrl') . 'mgr/bootstrap.buttons.css');
        $this->addJavascript($this->modThemes->getOption('jsUrl') . 'mgr/misc/utils.js');
        $this->addJavascript($this->modThemes->getOption('jsUrl') . 'mgr/widgets/items.grid.js');
        $this->addJavascript($this->modThemes->getOption('jsUrl') . 'mgr/widgets/items.windows.js');
        $this->addJavascript($this->modThemes->getOption('jsUrl') . 'mgr/widgets/home.panel.js');
        $this->addJavascript($this->modThemes->getOption('jsUrl') . 'mgr/sections/home.js');
        /*$this->addHtml('<script type="text/javascript">
		Ext.onReady(function() {
			MODx.load({ xtype: "modThemes-page-home"});
		});
		</script>');*/
    }


    /**
     * @return string
     */
    public function getTemplateFile()
    {
        return $this->modThemes->getOption('templatesPath') . 'home.tpl';
    }
}
