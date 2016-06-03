<?php
    defined('C5_EXECUTE') or die("Access Denied.");
    $assetLibrary = \Core::make('helper/concrete/asset_library');
    $pageSelector = \Core::make('helper/form/page_selector');

    $editor = \Core::make('editor');
?>

<h2>Account Portlet</h2>


<div class="form-group">
    <label for="text" class="control-label">Title</label>
    <input type="text" class="form-control" name="text" id="text" value="<?php echo $text; ?>">
</div>

<div class="form-group">
    <label for="content" class="control-label">Content</label>
    <?php echo $editor->outputBlockEditModeEditor('content', $content); ?>
</div>

<div class="form-group">
    <label for="text" class="control-label">Link Name</label>
    <input type="text" class="form-control" name="linkname" id="linkname" value="<?php echo $linkname; ?>">
</div>

<div class="form-group">
    <label for="text" class="control-label">Link To</label>
    <input type="text" class="form-control" name="linkto" id="linkto" value="<?php echo $linkto; ?>">
</div>

<div style="display: none;">


<hr>

<h2>Checkboxes/Radios/Selects</h2>
<div class="form-group">
    <?php
        $name = "checkbox";
        $options = [
            ["value" => "first", "text" => "Checkbox 1 - value: first"],
            ["value" => "second", "text" => "Checkbox 2 - value: second"],
            ["value" => "third", "text" => "Checkbox 3 - value: third"],
        ];
        if(empty($checkbox)){
            $checkbox = [$options[0]["value"]]; //setting inital is empty
        }

        foreach ($options as $op) {
            ?>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="<?php echo $name; ?>[]" value="<?php echo $op["value"]; ?>"<?php if(in_array($op["value"], $checkbox)) echo " checked"; ?>>
                    <?php echo $op["text"]; ?>
                </label>
            </div>
            <?php
        }
    ?>
</div>

<div class="form-group">
    <label for="selectinput" class="control-label">Select</label>
    <select name="selectinput" id="selectinput" class="form-control">
        <option value></option> <!-- if you want an option to have null -->
        <?php
            $options = [
                ["value" => "first", "text" => "Select 1 - value: first"],
                ["value" => "second", "text" => "Select 2 - value: second"],
                ["value" => "third", "text" => "Select 3 - value: third"],
            ];

            foreach ($options as $op) {
                echo '<option value="', $op["value"], '"';
                if($op["value"] == $selectinput){
                    echo ' selected';
                }
                echo '>', $op["text"], '</option>';
            }
        ?>
    </select>
</div>

<div class="form-group">
    <div class="checkbox">
        <label>
            <input type="checkbox" name="boolean" value="1"<?php if($boolean == "1") echo " checked"; ?>>
            boolean
        </label>
    </div>
</div>

<hr>

<h2>Files</h2>

<div class="form-group">
    <label for="fileID" class="control-label">File</label>
    <?php echo $assetLibrary->file('fileID', 'fileID', 'Choose File', $file); ?>
</div>

<div class="form-group">
    <label for="imageID" class="control-label">Image</label>
    <?php echo $assetLibrary->image('imageID', 'imageID', 'Choose Image', $image); ?>
</div>

<hr>

<h2>Links</h2>
<?php extract($linkTypeEnum); // allows access to the enum values like $INTERNAL_PAGE  ?>

<div class="form-group">
    <label for="linkType">Link Type</label>
    <select name="linkType" id="linkType" class="form-control js-link-type">
        <?php
            foreach ($linkTypeEnumSelect as $text => $value) {
                echo '<option value="', $value, '"';
                if($value == $linkType){
                    echo ' selected';
                }
                echo '>', $text, '</option>';
            }
        ?>
    </select>
</div>

<div class="js-link-options">
    <div class="form-group" data-link-type="<?php echo $INTERNAL_PAGE; ?>">
        <label for="internalPageID" class="control-label">Internal Page</label>
        <?php echo $pageSelector->selectPage('internalPageID', $internalPageID) ?>
    </div>
    <div class="form-group" data-link-type="<?php echo $INTERNAL_URL; ?>" style="display: none">
        <label for="internalPageUrl" class="control-label">Internal Url</label>
        <input type="text" class="form-control" name="internalPageUrl" id="internalPageUrl" value="<?php echo $internalPageUrl; ?>">
    </div>
    <div class="form-group" data-link-type="<?php echo $EXTERNAL_URL; ?>" style="display: none">
        <label for="externalPageUrl" class="control-label">External Url</label>
        <input type="text" class="form-control" name="externalPageUrl" id="externalPageUrl" value="<?php echo $externalPageUrl; ?>">
    </div>
</div>
</div>
<script>
    (function(global){
        'use strict';

        var linkTypeSelect,
            linkTypeOptions;

        function init(){
            linkTypeSelect = $('.js-link-type');
            linkTypeOptions = $('.js-link-options');

            linkTypeSelect.on('change', handleLinkTypeChange);
            linkTypeSelect.trigger('change');
        }

        function handleLinkTypeChange(e){
            linkTypeOptions.children().hide();
            var linkType = linkTypeSelect.val();
            linkTypeOptions.find('[data-link-type='+linkType+']').show();
        }

        global.linkTypeInit = init;
    })(window);

    linkTypeInit();
</script>
