<?php
namespace Application\Theme\CountyWater;

class PageTheme extends \Concrete\Core\Page\Theme\Theme {

 public function registerAssets() {
  $this->requireAsset('javascript', 'jquery');
        $this->requireAsset('javascript', 'underscore');
 }

    public function getThemeEditorClasses(){
        return array(
            array('title' => t('black'), 'menuClass' => 'black', 'spanClass' => 'black'),
            array('title' => t('red'), 'menuClass' => 'red', 'spanClass' => 'red'),
            array('title' => t('orange'), 'menuClass' => 'orange', 'spanClass' => 'orange'),
            array('title' => t('blue'), 'menuClass' => 'blue', 'spanClass' => 'blue')
        );
    }
}
