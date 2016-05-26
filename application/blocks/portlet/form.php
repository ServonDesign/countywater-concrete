<?php
    defined('C5_EXECUTE') or die("Access Denied.");
    $assetLibrary = \Core::make('helper/concrete/asset_library');
    $pageSelector = \Core::make('helper/form/page_selector');

    $editor = \Core::make('editor');
?>

<svg xmlns="http://www.w3.org/2000/svg" class="hide">
			<symbol id="add" viewBox="0 0 32 32">
				<g fill="#ffffff">
					<path d="M13 19c4.4 0 8-3.6 8-8V9c0-4.4-3.6-8-8-8S5 4.6 5 9v2c0 4.4 3.6 8 8 8z" />
					<path d="M25 17c-2.8 0-5.2 1.7-6.3 4H8c-3.9 0-7 3.1-7 7v2c0 .6.4 1 1 1h23c3.9 0 7-3.1 7-7s-3.1-7-7-7zm0 12c-2.8 0-5-2.2-5-5s2.2-5 5-5 5 2.2 5 5-2.2 5-5 5z" />
					<path d="M27 23h-1v-1c0-.6-.4-1-1-1s-1 .4-1 1v1h-1c-.6 0-1 .4-1 1s.4 1 1 1h1v1c0 .6.4 1 1 1s1-.4 1-1v-1h1c.6 0 1-.4 1-1s-.4-1-1-1z" data-color="color-2" />
				</g>
			</symbol>
			<symbol id="alert-sharp" viewBox="0 0 48 48">
				<path fill="#ffffff" d="M46.886 45.536l-22-42c-.345-.659-1.427-.659-1.771 0l-22 42c-.163.31-.151.682.03.981S1.65 47 2 47h44c.35 0 .674-.183.855-.482s.193-.672.031-.982zM23 20c0-.552.448-1 1-1s1 .448 1 1v13c0 .552-.448 1-1 1s-1-.448-1-1V20zm1 21c-1.105 0-2-.895-2-2s.895-2 2-2 2 .895 2 2-.895 2-2 2z" />
			</symbol>
			<symbol id="alert" viewBox="0 0 32 32">
				<path fill="#ffffff" d="M30.88 29.526l-14-26c-.349-.647-1.412-.647-1.761 0l-14 26c-.167.31-.159.685.022.987.181.302.507.487.859.487h28c.352 0 .678-.185.858-.487.181-.303.189-.677.022-.987zM16 26c-.552 0-1-.448-1-1s.448-1 1-1 1 .448 1 1-.448 1-1 1zm1-4h-2v-8h2v8z" />
			</symbol>
			<symbol id="arrows-bold-down" viewBox="0 0 16 16">
				<path fill="#ffffff" d="M16 5.6l-3.2-3.2L8 7.2 3.2 2.4 0 5.6l8 8" />
			</symbol>
			<symbol id="arrows-bold-right" viewBox="0 0 16 16">
				<path fill="#ffffff" d="M5.6 0L2.4 3.2 7.2 8l-4.8 4.8L5.6 16l8-8" />
			</symbol>
			<symbol id="drop" viewBox="0 0 32 32">
				<path fill="#ffffff" d="M16.7 1.3c-.4-.4-1-.4-1.4 0C14.8 1.8 4 12.7 4 20c0 7.5 6.1 12 12 12s12-4.5 12-12c0-7.3-10.8-18.2-11.3-18.7zM16 25c-1.4 0-5-.9-5-5 0-.6.4-1 1-1s1 .4 1 1c0 2.8 2.5 3 3 3s1 .5 1 1-.5 1-1 1z" />
			</symbol>
			<symbol id="home" viewBox="0 0 32 32">
				<g fill="#ffffff">
					<path d="M15.998 5.951L4 16.237V30c0 .552.448 1 1 1h8v-8h6v8h8c.552 0 1-.448 1-1V16.238L15.998 5.951zM19 19h-6v-5h6v5z" />
					<path d="M15.998.683L9 6.682V3H5v7.111L.59 13.892l1.302 1.518L15.998 3.317l14.11 12.093 1.302-1.518" data-color="color-2" />
				</g>
			</symbol>
			<symbol id="menu-bold" viewBox="0 0 48 48">
				<g>
					<path d="M46 20H2c-.6 0-1 .4-1 1v6c0 .6.4 1 1 1h44c.6 0 1-.4 1-1v-6c0-.6-.4-1-1-1z" data-color="color-2" />
					<path d="M46 4H2c-.6 0-1 .4-1 1v6c0 .6.4 1 1 1h44c.6 0 1-.4 1-1V5c0-.6-.4-1-1-1zm0 32H2c-.6 0-1 .4-1 1v6c0 .6.4 1 1 1h44c.6 0 1-.4 1-1v-6c0-.6-.4-1-1-1z" />
				</g>
			</symbol>
			<symbol id="meter" viewBox="0 0 59 55">
				<title>
					meter
				</title>
				<path fill="none" stroke="#ffffff" stroke-width="2" stroke-miterlimit="10" d="M26 27.8304h8v8h-8zM9.688 45.83H3.213L1 47.115v2.857" />
				<path fill="none" stroke="#ffffff" stroke-width="2" stroke-miterlimit="10" d="M59 8.83H48.086l-7.961-7.463L31 9.836V3.83h-6v11.524l-5.695 5.476H56v22h-8v-15h-9v15h-9v3h-4.875" />
				<path d="M17.625 36.6175a9 9 0 1 0 9 9 9.01 9.01 0 0 0-9-9zm-5.25 9a.75.75 0 0 1-1.5 0 6.7071 6.7071 0 0 1 .66525-2.90326l1.1445 1.1445a5.2022 5.2022 0 0 0-.30975 1.75875zm5.25 2.25a2.25275 2.25275 0 0 1-2.25-2.25 2.2232 2.2232 0 0 1 .225-.96376l-3.1605-3.16125L13.5 40.432l3.1605 3.16125a2.22956 2.22956 0 0 1 .9645-.22575 2.25 2.25 0 0 1 0 4.5zm6-1.5a.7498.7498 0 0 1-.75-.75 5.23474 5.23474 0 0 0-7.00875-4.94026l-1.14375-1.1445a6.73407 6.73407 0 0 1 9.6525 6.08475.7498.7498 0 0 1-.75.75z" />
				<path fill="none" stroke="#ffffff" stroke-width="2" stroke-miterlimit="10" d="M5 45.83v-5H2h6" />
			</symbol>
			<symbol id="phone-call" viewBox="0 0 48 48">
				<g>
					<path d="M38 47C17.598 47 1 30.402 1 10c0-.265.105-.52.293-.707l6-6c.391-.391 1.023-.391 1.414 0l10 10c.391.391.391 1.023 0 1.414L13.414 20 28 34.586l5.293-5.293c.391-.391 1.023-.391 1.414 0l10 10c.391.391.391 1.023 0 1.414l-6 6c-.187.188-.442.293-.707.293z" />
					<path d="M46 21c-.552 0-1-.448-1-1 0-9.374-7.626-17-17-17-.552 0-1-.448-1-1s.448-1 1-1c10.477 0 19 8.523 19 19 0 .552-.448 1-1 1z" data-color="color-2" />
					<path d="M38 21c-.552 0-1-.448-1-1 0-4.962-4.038-9-9-9-.552 0-1-.448-1-1s.448-1 1-1c6.065 0 11 4.935 11 11 0 .552-.448 1-1 1z" data-color="color-2" />
				</g>
			</symbol>
			<symbol id="quotes" viewBox="0 0 44 29">
				<title>
					quotes
				</title>
				<path fill="#ffffff" d="M8 20H1a.99974.99974 0 0 1-1-1v-9C0 4.95605 1.895 1.62438 5.62254.08287A1.00027 1.00027 0 0 1 6.3872 1.9315C3.6787 3.05115 2.24365 5.3633 2.0288 9H8a1 1 0 0 1 1 1v9a.99974.99974 0 0 1-1 1zm11 0h-7a.99974.99974 0 0 1-1-1v-9c0-5.044 1.895-8.37562 5.62254-9.91713a1.00027 1.00027 0 1 1 .76465 1.84863C14.6787 3.05114 13.24362 5.36328 13.0288 9H19a1 1 0 0 1 1 1v9a.99974.99974 0 0 1-1 1zM36 9h7a.99974.99974 0 0 1 1 1v9c0 5.044-1.886 8.37865-5.61352 9.92016a1.00027 1.00027 0 0 1-.76465-1.84864c2.7085-1.11963 4.13452-3.4348 4.34936-7.07152H36a1 1 0 0 1-1-1v-9a.99974.99974 0 0 1 1-1zM25 9h7a.99974.99974 0 0 1 1 1v9c0 5.044-1.886 8.37865-5.61352 9.92016a1.00027 1.00027 0 1 1-.76465-1.84863c2.7085-1.11963 4.13452-3.4348 4.34936-7.07153H25a1 1 0 0 1-1-1v-9a.99974.99974 0 0 1 1-1z" />
			</symbol>
			<symbol id="shopping-credit-card" viewBox="0 0 32 32">
				<g fill="#ffffff">
					<path d="M32 11V7c0-1.7-1.3-3-3-3H3C1.3 4 0 5.3 0 7v4h32z" data-color="color-2" />
					<path d="M0 16v9c0 1.7 1.3 3 3 3h26c1.7 0 3-1.3 3-3v-9H0zm12 7H5c-.6 0-1-.4-1-1s.4-1 1-1h7c.6 0 1 .4 1 1s-.4 1-1 1zm15 0h-2c-.6 0-1-.4-1-1s.4-1 1-1h2c.6 0 1 .4 1 1s-.4 1-1 1z" />
				</g>
			</symbol>
			<symbol id="users-circle" viewBox="0 0 32 32">
				<path fill="#ffffff" d="M16.8 0C7.9-.4.4 6.4 0 15.2-.4 24.1 6.4 31.6 15.2 32h.8c8.5 0 15.6-6.7 16-15.2C32.4 7.9 25.6.4 16.8 0zm9.4 25.6c-.8-2.5-2.9-3.4-5.1-4.2-1.1-.4-1.7-1.4-1.9-2.3C20.9 18 22 16.2 22 14v-2c0-3.3-2.7-6-6-6s-6 2.7-6 6v2c0 2.2 1.1 4 2.9 5.1-.3 1-.8 2-1.9 2.3-2.1.7-4.3 1.6-5.1 4.1-2.5-2.7-4-6.3-3.8-10.2C2.4 7.9 8.5 2 16 2h.7c7.7.4 13.6 7 13.3 14.7-.2 3.4-1.6 6.6-3.8 8.9z" />
			</symbol>
		</svg>

<h2>Portlet</h2>

<!-- <div class="form-group">
    <h2>Portlet Page Location</h2>
    <?php
        $name = "portletpagelocation";
        $options = [
            ["value" => "home", "text" => "Home"],
            ["value" => "about", "text" => "About"],
            ["value" => "account", "text" => "Account"],
        ];
        if(empty($portletpagelocation)){
            $portletpagelocation = $options[0]["value"]; //setting inital is empty
        }

        foreach ($options as $op) {
            ?>
            <div class="radio">
                <label>
                    <input type="radio" name="<?php echo $name; ?>" value="<?php echo $op["value"]; ?>"<?php if($op["value"] == $portletpagelocation) echo " checked"; ?>>
                    <?php echo $op["text"]; ?>
                </label>
            </div>
            <?php
        }
    ?>
</div> -->

<div class="form-group">
    <label for="text" class="control-label">Title</label>
    <input type="text" class="form-control" name="text" id="text" value="<?php echo $text; ?>">
</div>

<div class="form-group">
    <label for="content" class="control-label">Description</label>
    <?php echo $editor->outputBlockEditModeEditor('content', $content); ?>
</div>


<div class="form-group">
    <h2>Portlet Type</h2>
    <?php
        $name = "portlettype";
        $options = [
            ["value" => "main", "text" => "Large"],
            ["value" => "small", "text" => "Small"],
            ["value" => "default", "text" => "Default"],
        ];
        if(empty($portlettype)){
            $portlettype = $options[0]["value"]; //setting inital is empty
        }

        foreach ($options as $op) {
            ?>
            <div class="radio">
                <label>
                    <input type="radio" name="<?php echo $name; ?>" value="<?php echo $op["value"]; ?>"<?php if($op["value"] == $portlettype) echo " checked"; ?>>
                    <?php echo $op["text"]; ?>
                </label>
            </div>
            <?php
        }
    ?>
</div>


<div class="form-group">
    <h2>Portlet Color</h2>
    <?php
        $name = "radio";
        $options = [
            ["value" => "#D3256F", "text" => ""],
            ["value" => "#95B402", "text" => ""],
            ["value" => "#00A6CF", "text" => ""],
            ["value" => "#00609C", "text" => ""],
            ["value" => "#FFA200", "text" => ""],
        ];
        if(empty($radio)){
            $radio = $options[0]["value"]; //setting inital is empty
        }

        foreach ($options as $op) {
            ?>
            <div class="radio">
                <label>
                    <input type="radio" name="<?php echo $name; ?>" value="<?php echo $op["value"]; ?>"<?php if($op["value"] == $radio) echo " checked"; ?>>
                    <?php echo $op["text"]; ?>
                    <div style="width: 20px;height:20px;background:<?php echo $op["value"];?>"></div>
                </label>
            </div>
            <?php
        }
    ?>
</div>


<div class="form-group">
    <h2>Portlet SVG</h2>
    <?php
        $name = "portleticon";
        $options = [
            ["value" => "", "text" => "No Icon"],
            ["value" => "home", "text" => ""],
            ["value" => "alert-sharp", "text" => ""],
            ["value" => "arrows-bold-right", "text" => ""],
            ["value" => "drop", "text" => ""],
            ["value" => "meter", "text" => ""],
            ["value" => "quotes", "text" => ""],
            ["value" => "users-circle", "text" => ""]
        ];
        if(empty($portleticon)){
            $portleticon = $options[0]["value"]; //setting inital is empty
        }

        foreach ($options as $op) {
            ?>
            <div class="radio">
                <label>
                    <input type="radio" name="<?php echo $name; ?>" value="<?php echo $op["value"]; ?>"<?php if($op["value"] == $portleticon) echo " checked"; ?>>
                    <?php echo $op["text"]; ?>
                    <svg style="width:30px;height:30px;background:gray;padding:5px;display:inline-block;">
                      <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#<?php echo $op["value"]; ?>"></use>
                    </svg>
                </label>
            </div>
            <?php
        }
    ?>
</div>

<div style="display:none;">
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

</div>


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

<div class="form-group">
    <label for="linkname" class="control-label">Link Name</label>
    <input type="text" class="form-control" name="linkname" id="linkname" value="<?php echo $linkname; ?>">
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