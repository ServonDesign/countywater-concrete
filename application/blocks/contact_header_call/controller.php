<?php
namespace Application\Block\ContactHeaderCall;

use Concrete\Core\Block\BlockController;
use Concrete\Core\Editor\LinkAbstractor;
use File;
use Page;
use URL;

class Controller extends BlockController {
    protected $btTable = 'btContactHeaderCall';
    protected $btName = "ContactHeaderCall";
    protected $btDescription = "Example of a block for Page Contact Header Call";
    protected $btDefaultSet = 'contactheadercall';
    protected $btInterfaceWidth = "800";
    protected $btInterfaceHeight = "700";

    private $INTERNAL_PAGE  = 0;
    private $INTERNAL_URL   = 1;
    private $EXTERNAL_URL   = 2;
    private $linkTypeEnum;

    public function on_start(){
        $this->linkTypeEnum = ["INTERNAL_PAGE" => $this->INTERNAL_PAGE, "INTERNAL_URL" => $this->INTERNAL_URL, "EXTERNAL_URL" => $this->EXTERNAL_URL];
        $this->linkTypeEnumSelect = ["Internal Page" => $this->INTERNAL_PAGE, "Internal Url" => $this->INTERNAL_URL, "External Url" => $this->EXTERNAL_URL];
    }

    public function view(){
        $this->set('file', $this->getFileObj($this->fileID));
        $this->set('image', $this->getFileObj($this->imageID));
        $this->set('content', LinkAbstractor::translateFrom($this->content));

        $link = "";
        $externalLink = false;

        switch ($this->linkType) {
            case $this->INTERNAL_PAGE:
                $page = Page::getByID($this->internalPageID);
                $link = URL::to($page);
                break;
            case $this->INTERNAL_URL:
                $link = $this->internalPageUrl;
                break;
            case $this->EXTERNAL_URL;
                $link = $this->externalPageUrl;
                $externalLink = true;
                if(stripos($link, '://') === false){
                    $link = '://'.$link;
                }
                break;
        }

        $this->set('link', $link);
        $this->set('externalLink', $externalLink);
    }

    public function add(){
        $this->set('linkTypeEnum', $this->linkTypeEnum);
        $this->set('linkTypeEnumSelect', $this->linkTypeEnumSelect);
    }

    public function edit(){
        $this->set('linkTypeEnum', $this->linkTypeEnum);
        $this->set('linkTypeEnumSelect', $this->linkTypeEnumSelect);

        $this->set('file', !empty($this->fileID) ? File::getByID($this->fileID) : 0);
        $this->set('image', !empty($this->imageID) ? File::getByID($this->imageID) : 0);
        $this->set('content', LinkAbstractor::translateFromEditMode($this->content));
        $this->set('checkbox', explode(';', $this->checkbox));
    }

    public function save($args){
        $args['content'] = LinkAbstractor::translateTo($args['content']);

        $args['checkbox'] = implode(';', $args['checkbox']);

        $args['boolean'] = isset($args['boolean']) ? '1' : '0';

        $args['fileID'] = isset($args['fileID']) ? $args['fileID'] : '0';
        $args['imageID'] = isset($args['imageID']) ? $args['imageID'] : '0';

    	parent::save($args);
    }

    private function getFileObj($fID){
    	if(empty($fID)){
    		return null;
    	}

    	$file = File::getByID($fID);
    	if(!is_object($file)){
    		return null;
    	}

    	$fileVersion = $file->getVersion();

    	$fileObj = new \StdClass();
    	$fileObj->path = $file->getRelativePath();
    	$fileObj->title = $fileVersion->getTitle();

    	return $fileObj;
    }
}
