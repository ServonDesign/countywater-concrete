(function ListIIFE(global){
	var listObj = {
		init: function(list, addBtn, template, blankEntry){
			this.listContianer = list;
			this.addBtn = addBtn;
			this.template = template;
			this.blankEntry = blankEntry;
			this.setupEvents();
			return this;
		},
		//status
		hasRedactor: false,

		//public api

		initialValues: initialValues, //set intial list objs
		hasImagePicker: hasImagePicker, //sets up events for the image picker
		hasFilePicker: hasFilePicker, //sets up events for the file picker
		addMultiImageSelect: addMultiImageSelect, //allows you to select many images and adds now rows for each
		setRedactor: setRedactor, //sets if there is redactor
		hasLinkSelector: hasLinkSelector,
		hasPagePicker: hasPagePicker,

		//choose hasFilePicker or addMultiImageSelect, not both. addMultiImageSelect adds both behaviours

		//only use if doing any manual work
		setupEvents: setupEvents, 
		addEntry: addEntry,
		doSortCount: doSortCount,
		initialiseRedactor: initialiseRedactor
	};

	function initialValues(valueList){
		if(valueList.length > 0){
			valueList.map(this.addEntry.bind(this));
		}		
	}

	function addEntry(entry){
		this.listContianer.append(this.template(entry || this.blankEntry));
		if(!entry){
			this.blankEntry.order = this.listContianer.find('.js-sortOrder').length;
		}
		if(this.hasRedactor){
			this.initialiseRedactor();
		}
		this.doSortCount();
	}

	function initialiseRedactor(){
		var newEntry = this.listContianer.find('.js-item').last();
		newEntry.find('.js-list-redactor').redactor(redactorPlugins).on('remove', function(){
            $(this).redactor('core.destroy');
        });
	}

	function doSortCount(){
		this.listContianer.find('.js-sortOrder').each(function(i){
			$(this).val(i);
			setRadioNameOnSort($(this), i);
		});
	}

	function setRadioNameOnSort(e, i){
		$(e).closest('.js-item').each(function(itemCount, item){
			$(item).find('.js-radio-group').each(function(groupCount, group){
				var inputs = $(group).find('input')
				var name = inputs.prop('name').replace(/\[[0-9-]+\]/, '['+i+']');
				inputs.prop('name', name);
			});
		})
	}

	function setupEvents(){
		if(this.addBtn){
			this.addBtn.on('click', addBtnEvent.bind(this));
		}
		this.listContianer.on('click', '.js-remove', removeItem.bind(this));
		this.listContianer.on('click', '.js-up', moveUp.bind(this));
		this.listContianer.on('click', '.js-down', moveDown.bind(this));
	}

	function addBtnEvent(e){
		e.preventDefault();
		this.addEntry();
	}

	function removeItem(e){
		e.preventDefault();
		var item = $(e.target).closest('.js-item');
		var itemID = item.find('.js-item-id');
		var toDelete = item.find('.js-todelete');
		if(!item.hasClass('toDelete') && ~itemID.val()){
			item.addClass('toDelete');
			toDelete.val(1);
		}else if(~itemID.val()){
			item.removeClass('toDelete');
			toDelete.val(0);
		}else{
			item.remove();
		}
	}

	function moveUp(e){
		e.preventDefault();
		var myContainer = $(e.target).closest('.js-item');
		myContainer.insertBefore(myContainer.prev('.js-item'));
		this.doSortCount();
	}

	function moveDown(e){
		e.preventDefault();
		var myContainer = $(e.target).closest('.js-item');
		myContainer.insertAfter(myContainer.next('.js-item'));
		this.doSortCount();
	}

	function hasImagePicker(){
		this.listContianer.on('click', '.js-image-picker:not(.nofid)', selectImg.bind(this));
		this.listContianer.on('click', '.js-image-picker.nofid', viewFile.bind(this));
	}

	function selectImg(e){
		var imagePicker = $(e.target).closest('.js-image-picker');
		ConcreteFileManager.launchDialog(function (data) {
            ConcreteFileManager.getFileDetails(data.fID, function (r) {
                jQuery.fn.dialog.hideLoader();
                var file = r.files[0];
                imagePicker.html('<img src="'+file.url+'">');
                imagePicker.parent().find('.js-file-path').val(file.url);
                imagePicker.parent().find('.js-image-fid').val(file.fID);
            });
        });
	}

	function addMultiImageSelect(button){
		button.on('click', multiSelectImg.bind(this));
		this.listContianer.on('click', '.js-image-picker:not(.nofid)', selectImg.bind(this));
		this.listContianer.on('click', '.js-image-picker.nofid', viewFile.bind(this));
	}

	function multiSelectImg(e){
		e.preventDefault();
		var self = this;
		ConcreteFileManager.launchDialog(function (data) {
            ConcreteFileManager.getFileDetails(data.fID, function (r) {
                jQuery.fn.dialog.hideLoader();
                var files = r.files.sort(function(a,b){
                	if(a.fileName === b.fileName){
                		return 0;
                	}
                	if(a.fileName < b.fileName){
                		return -1;
                	}else{
                		return 1;
                	}
                });
                for (var i = 0; i < files.length; i++) {
                	self.addEntry();
                	var entry = self.listContianer.find('.js-item').last();
                	entry.find('.js-image-picker').html('<img src="'+files[i].url+'">');
                	entry.find('.js-file-path').val(files[i].url);
                	entry.find('.js-image-fid').val(files[i].fID);
                }
            });
        }, {multipleSelection: true});
	}

	function hasFilePicker(){
		this.listContianer.on('click', '.js-file-picker:not(.nofid)', selectFile.bind(this));
		this.listContianer.on('click', '.js-file-picker.nofid', viewFile.bind(this));
	}

	function selectFile(e){
		var filePicker = $(e.target);
		ConcreteFileManager.launchDialog(function (data) {
            ConcreteFileManager.getFileDetails(data.fID, function (r) {
                jQuery.fn.dialog.hideLoader();
                var file = r.files[0];
                filePicker.html('<span class="filepath">'+file.url+'</span>');
                filePicker.parent().find('.js-file-path').val(file.url);
                filePicker.parent().find('.js-file-fid').val(file.fID);
            });
        });
	}

	function hasLinkSelector(){
        this.listContianer.on('change', '.js-link-type', function(e){
        	var item = $(e.target).closest('.js-item');

        	item.find('.js-link-options').children().hide();
            var linkType = item.find('.js-link-type').val();
            item.find('.js-link-options').find('[data-link-type='+linkType+']').show();
        });

        this.listContianer.find('.js-link-type').trigger('change');
	}

	function hasPagePicker(){
		this.listContianer.on('click', '.js-page-selector-choose', handlePageSelect.bind(this));
		this.listContianer.on('click', '.js-page-selector-clear', handlePageSelectClear.bind(this));
	}

	function handlePageSelect(e){
		e.preventDefault();
		var selector = $(e.target).closest('.js-page-selector');
		ConcretePageAjaxSearch.launchDialog(function(data){
			selector.find('.js-page-selector-id').val(data.cID);
			selector.find('.js-page-selector-choose').remove();
			selector.append('<div class="page-selector__title js-page-selector-title">'+data.title+'</div>');
			selector.append('<button class="page-selector__btn--clear js-page-selector-clear"><i class="fa fa-close"></i></button>');
		});
	}

	function handlePageSelectClear(e){
		e.preventDefault();
		var selector = $(e.target).closest('.js-page-selector');
		selector.find('.js-page-selector-title').remove();
		selector.find('.js-page-selector-clear').remove();
		selector.append('<button class="page-selector__btn--choose js-page-selector-choose">Choose a Page</button>');
	}

	function setRedactor(hasRedactor){
		if(typeof redactorPlugins !== "undefined"){
			this.hasRedactor = hasRedactor;
		}
	}

	function viewFile(e){
		window.open($(e.target).siblings('.js-file-path').val());
	}
	

	function createList(list, addBtn, template, blankEntry){
		return Object.create(listObj).init(list, addBtn, template, blankEntry);
	}

	global.createList = createList;
})(window);