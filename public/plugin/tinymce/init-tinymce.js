tinymce.init({
	selector:"textarea.tinymce",
	plugins: "autoresize",
    autoresize_overflow_padding: 5,
    autoresize_bottom_margin: 20,
        
    width: "100%",     
    

	//menubar:false,
	//statusbar: false,
	forced_root_block : false,

    //menubar: 'edit insert view format table tools help',
    menubar: '',

    removed_menuitems: 'removeformat',



  menu: {
    file: {title: 'File', items: 'newdocument'},
    edit: {title: 'Edit', items: 'undo redo | cut copy paste pastetext | selectall'},
    insert: {title: 'Insert', items: 'link media | template hr'},
    view: {title: 'View', items: 'visualaid'},
    format: {title: 'Format', items: 'bold italic underline strikethrough superscript subscript | formats | removeformat'},
    table: {title: 'Table', items: 'inserttable tableprops deletetable | cell row column'},
    tools: {title: 'Tools', items: 'spellchecker code'}
  }
   

   



});