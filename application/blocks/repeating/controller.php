<?php
namespace Application\Block\Repeating;

use Concrete\Core\Block\BlockController;
use Concrete\Core\Editor\LinkAbstractor;
use File;
use Page;
use URL;
use Database;

class Controller extends BlockController {

    protected $btTable = 'btRepeating';
    protected $btDataTableName = 'btRepeatingData';
    protected $btName = "Repeating";
    protected $btDescription = "Example of a repeating data block with all the diffrent types of fields";
    protected $btExportTables = array('btRepeating', 'btRepeatingData');

    protected $btDefaultSet = 'basic';
    protected $btInterfaceWidth = "980";
    protected $btInterfaceHeight = "800";
    
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

        $repeatingData = $this->getRepeatingDataForView();
        $this->set('repeatingData', $repeatingData);
    }
    
    public function add(){
        $this->set('linkTypeEnum', $this->linkTypeEnum);
        $this->set('linkTypeEnumSelect', $this->linkTypeEnumSelect);

        $this->requireAsset('core/sitemap');
        $this->requireAsset('core/file-manager');
    }

    public function edit(){
        $this->set('linkTypeEnum', $this->linkTypeEnum);
        $this->set('linkTypeEnumSelect', $this->linkTypeEnumSelect);

        $this->set('file', !empty($this->fileID) ? File::getByID($this->fileID) : 0); 
        $this->set('image', !empty($this->imageID) ? File::getByID($this->imageID) : 0);
        $this->set('content', LinkAbstractor::translateFromEditMode($this->content));
        $this->set('checkbox', explode(';', $this->checkbox));

        $repeatingData = $this->getRepeatingDataFroEdit();
        $this->set('repeatingData', $repeatingData);

        $this->requireAsset('core/sitemap');
        $this->requireAsset('core/file-manager');
    }

    public function save($args){
        $args['content'] = LinkAbstractor::translateTo($args['content']);

        $args['checkbox'] = implode(';', $args['checkbox']);

        $args['boolean'] = isset($args['boolean']) ? '1' : '0';

        $args['fileID'] = isset($args['fileID']) ? $args['fileID'] : '0';
        $args['imageID'] = isset($args['imageID']) ? $args['imageID'] : '0';

        $this->saveRepeatingData($args);

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

    private function getRepeatingDataForView(){
        $repeatingData = $this->getRepeatingData();
        for ($i=0; $i < count($repeatingData); $i++) { 
            $repeatingData[$i]["file"] = $this->getFileObj($repeatingData[$i]["fileID"]);
            $repeatingData[$i]["image"] = $this->getFileObj($repeatingData[$i]["imageID"]);
            $repeatingData[$i]["content"] = LinkAbstractor::translateFrom($repeatingData[$i]["content"]);
            
            $link = "";
            $externalLink = false;

            switch ($repeatingData[$i]["linkType"]) {
                case $this->INTERNAL_PAGE:
                    $page = Page::getByID($repeatingData[$i]["internalPageID"]);
                    $link = URL::to($page);
                    break;
                case $this->INTERNAL_URL:
                    $link = $repeatingData[$i]["internalPageUrl"];
                    break;
                case $this->EXTERNAL_URL;
                    $link = $repeatingData[$i]["externalPageUrl"];
                    $externalLink = true;
                    if(stripos($link, '://') === false){
                        $link = '://'.$link;
                    }
                    break;
            }

            $repeatingData[$i]["link"] = $link;
            $repeatingData[$i]["externalLink"] = $externalLink;
        }

        return $repeatingData;
    }

    private function getRepeatingDataFroEdit(){
        $repeatingData = $this->getRepeatingData();
        for ($i=0; $i < count($repeatingData); $i++){ 
            $repeatingData[$i]["content"] = LinkAbstractor::translateFromEditMode($repeatingData[$i]["content"]);
            $repeatingData[$i]["checkbox"] = explode(';', $repeatingData[$i]["checkbox"]);

            $pageTitle = "";

            if(!empty($repeatingData[$i]["internalPageID"])){
                $page = Page::getByID($repeatingData[$i]["internalPageID"]);
                $pageTitle = $page->getCollectionName();
            }

            $repeatingData[$i]["internalPageTitle"] = $pageTitle;

            $fileName = "";
            if(!empty($repeatingData[$i]["fileID"])){
                $file = $this->getFileObj($repeatingData[$i]["fileID"]);
                $fileName = $file->title;
            }
            $repeatingData[$i]["fileName"] = $fileName;
        }

        return $repeatingData;
    }

    private function getRepeatingData(){
        $db = Database::connection();
        $data = $db->fetchAll("SELECT * FROM {$this->btDataTableName} WHERE bID = ? ORDER BY displayOrder", [$this->bID]);
        if(empty($data)){
            return [];
        }
        return $data;
    }

    private function saveRepeatingData($args){
        //don't need a namespace for input names, doing it here for clarity
        $db = Database::connection();

        $toDelete = [];
        $toSave = [];

        for ($i=0; $i < count($args["rd_order"]); $i++) { 
            $tmp = [];

            $tmp["bID"] = $this->bID;

            //get posted data
            $tmp["ID"] = $args["rd_id"][$i];
            $tmp["displayOrder"] = $args["rd_order"][$i];

            $tmp["text"] = $args["rd_text"][$i];
            $tmp["content"] = $args["rd_content"][$i];

            $tmp["radio"] = $args["rd_radio"][$i];
            $tmp["checkbox"] = $args["rd_checkbox"][$i];
            //issue with checkbox, need to change name based on order



            $tmp["selectinput"] = $args["rd_selectinput"][$i];

            $tmp["boolean"] = isset($args["rd_boolean"][$i]) ? 1 : 0;

            $tmp["fileID"] = isset($args["rd_fileID"][$i]) ? $args["rd_fileID"][$i] : 0;
            $tmp["imageID"] = isset($args["rd_imageID"][$i]) ? $args["rd_imageID"][$i] : 0;
            $tmp["imagePath"] = $args["rd_imagePath"][$i];

            $tmp["linkType"] = $args["rd_linkType"][$i];
            $tmp["internalPageID"] = $args["rd_internalPageID"][$i];
            $tmp["internalPageUrl"] = $args["rd_internalPageUrl"][$i];
            $tmp["externalPageUrl"] = $args["rd_externalPageUrl"][$i];
            $tmp["internalPageUrlTitle"] = $args["rd_internalPageUrlTitle"][$i];
            $tmp["externalPageTitle"] = $args["rd_externalPageTitle"][$i];

            //check data and put in defaults where needed
            if(empty($tmp["ID"])){
                $tmp["ID"] = -1;
            }

            if(empty($tmp["displayOrder"])){
                $tmp["displayOrder"] = 0;
            }

            $tmp["content"] = LinkAbstractor::translateTo($tmp["content"]);
            $tmp["checkbox"] = !empty($tmp["checkbox"]) ? implode(';', $tmp["checkbox"]) : "";

            //check if to delete
            if($args["rd_id-todelete"][$i]){
                $toDelete[] = $tmp;
            }else{
                $toSave[] = $tmp;
            }
        }

        $db->delete($this->btDataTableName, ["bID" => $this->bID]);

        foreach ($toSave as $sv) {
            unset($sv["ID"]);
            $db->insert($this->btDataTableName, $sv);
        }
    }

    public function duplicate($newBID){
        $newInstance = parent::duplicate($newBID);

        $data = $this->getRepeatingData();

        $db = Database::connection();
        foreach ($data as $d) {
            unset($d["ID"]);
            $d["bID"] = $newBID;
            $db->insert($this->btDataTableName, $d);
        }

        return $newInstance;
    }

    public function delete(){
        parent::delete();

        $db = Database::connection();
        $data = $db->delete($this->btDataTableName, ["bID" => $this->bID]);
    }

}