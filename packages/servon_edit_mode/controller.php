<?php 

namespace Concrete\Package\ServonEditMode;

use Package;
use View;
use Events;
use User;
use Group;

class Controller extends Package{

	protected $pkgHandle = 'servon_edit_mode';
    protected $pkgName = 'Servon Edit Mode';
    protected $pkgDescription = 'changes edit mode to allow for flexbox grid systems and fixes issues with c5 when using our base css';
    protected $appVersionRequired = '5.7.5';
    protected $pkgVersion = "1.0.0";

    public function install(){
    	$pkg = parent::install();
    }

    public function on_start(){
        Events::addListener('on_page_view', function($pe){
            $this->onPageView($pe);
        });
    }

    private function onPageView($pe){
        $c = $pe->getPageObject();
        $u = new User();
        $admin = Group::getByName('Administrators');

        if($u->inGroup($admin) || $u->isSuperUser()){
            $v = View::getInstance();
            $html = \Core::make('helper/html');
            $v->addHeaderItem($html->css('servon-edit-mode.css', 'servon_edit_mode'));
            $v->addHeaderItem($html->css('repeating-form.css', 'servon_edit_mode'));
            $v->addFooterItem($html->javascript('repeating-form-list.js', 'servon_edit_mode'));
        }

        // if($c->isEditMode()){
        //     $v->addFooterItem($html->javascript('servon-edit-mode.js', 'servon_edit_mode'));
        // }
    }
}