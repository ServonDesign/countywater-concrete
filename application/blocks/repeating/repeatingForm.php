<?php
    defined('C5_EXECUTE') or die("Access Denied.");
    $assetLibrary = \Core::make('helper/concrete/asset_library');
    $pageSelector = \Core::make('helper/form/page_selector');

    $editorManager = \Core::make('editor');
	$pluginManager = $editorManager->getPluginManager();
	$editorPlugins = $pluginManager->getSelectedPlugins();
	$editorPlugins[] = "concrete5magic";

	$redactorOptions = ['plugins' => $editorPlugins, 'minHeight' => 300];
	$editToken = Core::make("token")->generate('editor');

	extract($linkTypeEnum); // allows access to the enum values like $INTERNAL_PAGE
?>

<script>
	var CCM_EDITOR_SECURITY_TOKEN = "<?php echo $editToken; ?>";
	var redactorPlugins = <?php echo json_encode($redactorOptions); ?>;
</script>

<div class="js-example-list">

</div>
<button class="list-add-btn js-example-add-btn btn btn-success">Add New Link <i class="fa fa-plus"></i></button>
<script>
	var exampleListIntialData = [
		<?php
			if(count($repeatingData) > 0){
				foreach ($repeatingData as $dt) {
					echo '
					{
						id: ', $dt["ID"],',
						order: ', $dt["displayOrder"],',

						text: "', $dt["text"],'",
						content: \'', str_replace("'", "\'", preg_replace('/[\t\n\v\f\r]/', '', $dt["content"])),'\',

						radio: "', $dt["radio"],'",
						checkbox: ', json_encode($dt["checkbox"]),',
						selectinput: "', $dt["selectinput"],'",
						boolean: ', $dt["boolean"],',

						fileID: ', $dt["fileID"],',
						fileName: "', $dt["fileName"],'",
						imageID: ', $dt["imageID"],',
						imagePath: "', $dt["imagePath"],'",

						linkType: ', $dt["linkType"],',
						internalPageTitle: "', $dt["internalPageTitle"],'",
						internalPageID: ', $dt["internalPageID"],',
						internalPageUrl: "', $dt["internalPageUrl"],'",
						externalPageUrl: "', $dt["externalPageUrl"],'",
						internalPageUrlTitle: "', $data["internalPageUrlTitle"],'",
                        externalPageTitle: "', $data["externalPageTitle"],'"
					},
					';
				}
			}
		?>
	];

	var exampleBlankObj = {
		id: -1,
		order: -1,

		text: "",
		content: "",

		radio: "",
		checkbox: [],
		selectinput: "",
		boolean: 0,

		fileID: 0,
		fileName: "",
		imageID: 0,
		imagePath: "",

		linkType: 0,
		internalPageID: 0,
		internalPageTitle: "",
		internalPageUrl: "",
		externalPageUrl: "",
		internalPageUrlTitle: "",
        externalPageTitle: ""
	};
</script>
<script type="text/template" class="js-example-template">
	<div class="example-item js-item clearfix well">
		<input type="hidden" name="rd_id-todelete[]" class="js-todelete" value="0">
		<input type="hidden" name="rd_id[]" class="js-item-id" value="<%=id%>">
		<input type="hidden" name="rd_order[]" class="js-sortOrder" value="<%=order%>">
		<div class="row">
			<div class="col-sm-10">
				<h2>FAQ</h2>

				<div class="form-group">
				    <label for="text-<%=order%>" class="control-label">Question</label>
				    <input type="text-<%=order%>" class="form-control" name="rd_text[]" id="text" value="<%=text%>">
				</div>

				<div class="form-group">
				    <label for="content-<%=order%>" class="control-label">Answer</label>
				   	<textarea name="rd_content[]" id="content-<%=order%>" class="js-list-redactor"><%=content%></textarea>
				</div>

				<hr>

<div style="display:none;">

				<h2>Checkboxes/Radios/Selects</h2>
				<div class="form-group">
				  	<%
                        var options = [
                            <?php
                            	$options = [
							        ["value" => "first", "text" => "Radio 1 - value: first"],
							        ["value" => "second", "text" => "Radio 2 - value: second"],
							        ["value" => "third", "text" => "Radio 3 - value: third"],
							    ];
                                foreach ($options as $op) {
                                    echo '{
                                        text: "', $op["text"],'",
                                        value: "', $op["value"],'"
                                    },';
                                }
                            ?>
                        ];
                        if(!radio){
                        	radio = options[0].value;
                        }
                        for(var i = 0; i < options.length; i++){
                            %>
							<div class="radio">
					            <label>
					                <input type="radio" name="rd_radio[]" value="<%=options[i].value%>" <% if(options[i].value == radio){ %> checked<% } %>>
					                <%=options[i].text%>
					            </label>
					        </div>
                            <%
                        }
                    %>
				</div>

				<div class="form-group">
				    <label for="selectinput-<%=order%>" class="control-label">Select</label>
				    <select name="rd_selectinput[]" id="selectinput-<%=order%>" class="form-control">
				        <option value></option> <!-- if you want an option to have null -->
				        <%
                            var options = [
                                <?php
                                	$options = [
						                ["value" => "first", "text" => "Select 1 - value: first"],
						                ["value" => "second", "text" => "Select 2 - value: second"],
						                ["value" => "third", "text" => "Select 3 - value: third"],
						            ];
                                    foreach ($options as $op) {
	                                    echo '{
	                                        text: "', $op["text"],'",
	                                        value: "', $op["value"],'"
	                                    },';
	                                }
                                ?>
                            ];
                            for(var i = 0; i < options.length; i++){
                                %> <option value="<%=options[i].value%>" <% if(options[i].value == selectinput){ %> selected<% } %>> <%=options[i].text%> </option> <%
                            }
                        %>
				    </select>
				</div>

				<div class="form-group">
				    <div class="checkbox">
				        <label>
				            <input type="checkbox" name="rd_boolean[]" value="1"<% if(boolean){ %> checked<% } %>>
				            boolean
				        </label>
				    </div>
				</div>

				<hr>

				<h2>Files</h2>

				<div class="form-group">
                    <label class="control-label">File</label>
                    <div class="file-picker js-file-picker <% if(fileName.length && fileID < 0){ %> nofid <% } %>">
                        <% if (fileName.length > 0) { %>
                            <span class="filepath"><%=fileName%></span>
                        <% } else { %>
                            <i class="fa fa-picture-o"></i>
                        <% } %>
                    </div>
                    <input type="hidden" name="rd_fileID[]" class="js-file-fid" value="<%=fileID%>">
                </div>

				<div class="form-group">
					<label class="control-label">Image</label>
					<div class="image-picker js-image-picker <% if(imagePath.length && imageID < 0){ %> nofid <% } %>">
						<% if (imagePath.length > 0) { %>
		                	<img src="<%=imagePath%>"/>
		                <% } else { %>
		                	<i class="fa fa-picture-o"></i>
		                <% } %>
					</div>
					<input type="hidden" name="rd_imagePath[]" class="js-file-path" value="<%=imagePath%>">
					<input type="hidden" name="rd_imageID[]" class="js-image-fid" value="<%=imageID%>">
				</div>

				<hr>

				<h2>Links</h2>
				<!-- Link Picker -->

				<div class="form-group">
                    <label for="linkType-<%=order%>">Link Type</label>
                    <select name="rd_linkType[]" id="linkType-<%=order%>" class="form-control js-link-type">
                        <%
                            var options = [
                                <?php
                                    foreach ($linkTypeEnumSelect as $text => $value) {
                                        echo '{
                                            text: "', $text,'",
                                            value: ', $value,'
                                        },';
                                    }
                                ?>
                            ];
                            for(var i = 0; i < options.length; i++){
                                %> <option value="<%=options[i].value%>" <% if(options[i].value == linkType){ %> selected<% } %>> <%=options[i].text%> </option> <%
                            }
                        %>
                    </select>
                </div>
                <div class="js-link-options">
                    <div class="form-group" data-link-type="<?php echo $INTERNAL_PAGE; ?>">
                        <label for="rd_internalPageID-<%=order%>" class="control-label">Internal Page</label>
                        <div class="js-page-selector page-selector">
                            <input type="hidden" name="rd_internalPageID[]" class="js-page-selector-id" value="<%=internalPageID%>">
                            <% if(internalPageID){ %>
                                <div class="page-selector__title js-page-selector-title"><%=internalPageTitle%></div>
                                <button class="page-selector__btn--clear js-page-selector-clear"><i class="fa fa-close"></i></button>
                            <% }else{ %>
                                <button class="page-selector__btn--choose js-page-selector-choose">Choose a Page</button>
                            <% } %>
                        </div>
                    </div>
                    <div class="form-group" data-link-type="<?php echo $INTERNAL_URL; ?>" style="display: none">
                        <div class="form-group">
                            <label for="internalPageUrl-<%=order%>" class="control-label">Internal Url</label>
                            <input type="text" class="form-control" name="rd_internalPageUrl[]" id="internalPageUrl-<%=order%>" value="<%=internalPageUrl%>">
                        </div>
                        <div class="form-group">
                            <label for="internalTitle-<%=order%>" class="control-label">Internal Page Title <small>Leave blank to use entered url</small></label>
                            <input type="text" class="form-control" name="rd_internalPageUrlTitle[]" id="internalTitle-<%=order%>" value="<%=internalPageUrlTitle%>">
                        </div>
                    </div>
                    <div class="form-group" data-link-type="<?php echo $EXTERNAL_URL; ?>" style="display: none">
                        <div class="form-group">
                            <label for="externalPageUrl-<%=order%>" class="control-label">External Url</label>
                            <input type="text" class="form-control" name="rd_externalPageUrl[]" id="externalPageUrl-<%=order%>" value="<%=externalPageUrl%>">
                        </div>
                        <div class="form-group">
                            <label for="externalTitle-<%=order%>" class="control-label">External Page Title <small>Leave blank to use entered url</small></label>
                            <input type="text" class="form-control" name="rd_externalPageTitle[]" id="externalTitle-<%=order%>" value="<%=externalPageTitle%>">
                        </div>
                    </div>
                </div>

                <!-- end link picker -->

			</div>
</div>

			<div class="col-sm-2 list-actions">
				<button class="btn btn-danger js-remove"><i class="fa fa-times"></i></button>
				<div class="btn-group">
					<button class="js-up btn btn-default"><i class="fa fa-caret-up"></i></button>
					<button class="js-down btn btn-default"><i class="fa fa-caret-down"></i></button>
				</div>
			</div>
		</div>
	</div>
</script>


<script>
	var listController = createList(
        $('.js-example-list'),
        $('.js-example-add-btn'),
        _.template($('.js-example-template').html()),
        exampleBlankObj
    );
    listController.setRedactor(true);
    listController.initialValues(exampleListIntialData);
    listController.hasLinkSelector();
    listController.hasPagePicker();
    listController.hasImagePicker();
    listController.hasFilePicker();
</script>
