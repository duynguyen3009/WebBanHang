$(function() {
	$('a[data-toggle="tab"]').on('click', function(e) {
		window.localStorage.setItem('activeTab', $(e.target).attr('href'));
	});
	var activeTab = window.localStorage.getItem('activeTab');
	if (activeTab) {
		$('#myTab a[href="' + activeTab + '"]').tab('show');
		window.localStorage.removeItem("activeTab");
	}
});
$(document).ready(function() {

	let $btnSearch        = $("button#btn-search");
	let $btnClearSearch	  = $("button#btn-clear-search");

	let $inputSearchField = $("input[name  = search_field]");
	let $inputSearchValue = $("input[name  = search_value]");
	let $categoryFilter   = $("select[name = cat_filter]");
	let $selectFilter     = $("select[name = select_filter]");
	let $selectIsHome     = $("select[name = isHome_filter]");

	let $selectChangeAttr 		= $("select[name =  select_change_attr]");
	let $selectChangeAttrAjax = $("select[name =  select_change_attr_ajax]");


	$("a.select-field").click(function(e) {
		e.preventDefault();

		let field 		= $(this).data('field');
		let fieldName 	= $(this).html();
		$("button.btn-active-field").html(fieldName + '<span class="caret"></span>');
    	$inputSearchField.val(field);
	});

	$btnSearch.click(function() {

		var pathname	= window.location.pathname;
		let searchParams= new URLSearchParams(window.location.search);
		params 			= ['page', 'filter_status', 'select_field', 'select_value','filter_category'];

		let link		= "";
		$.each( params, function( key, value ) {
			if (searchParams.has(value) ) {
				link += value + "=" + searchParams.get(value) + "&";
			}
		});

		let search_field = $inputSearchField.val();
		let search_value = $inputSearchValue.val();

		window.location.href = pathname + "?" + link + 'search_field='+ search_field + '&search_value=' + search_value.replace(/\s+/g, '+').toLowerCase();
	});

	$btnClearSearch.click(function() {
		var pathname	= window.location.pathname;
		let searchParams= new URLSearchParams(window.location.search);

		params 			= ['page', 'filter_status', 'select_filter'];

		let link		= "";
		$.each( params, function( key, value ) {
			if (searchParams.has(value) ) {
				link += value + "=" + searchParams.get(value) + "&"
			}
		});

		window.location.href = pathname + "?" + link.slice(0,-1);
	});

	//Event onchange select filter
	$selectFilter.on('change', function () {
		var pathname	= window.location.pathname;
		let searchParams= new URLSearchParams(window.location.search);

		params 			= ['page', 'filter_status', 'search_field', 'search_value'];

		let link		= "";
		$.each( params, function( key, value ) {
			if (searchParams.has(value) ) {
				link += value + "=" + searchParams.get(value) + "&";
			}
		});

		let filter = $(this).data('filter');
		let value = $(this).val();
		window.location.href = pathname + "?" + link + 'filter_'+ filter + '=' + value;
	 });
	 
	
	// Change attributes with selectbox

	$("#thumb").change(function() {
		readURL(this);
	});
	$("#avatar").change(function() {
		readURL(this);
	});
	
	$categoryFilter.on('change', function(e) {
		var id = $(this).val();
		var pathname	= window.location.pathname;
		
		let searchParams= new URLSearchParams(window.location.search);
	
		params 			= ['page', 'filter_status', 'search_field', 'search_value'];
		let link		= "";
		$.each( params, function( key, value ) {
			if (searchParams.has(value) ) {
				link += value + "=" + searchParams.get(value) + "&";
			}
		
		});
	
		window.location.href = pathname + "?" + link +'filter_category='+id;
	});

	$selectIsHome.on('change', function(e) {
		var id = $(this).val();
		var pathname	= window.location.pathname;
		
		let searchParams= new URLSearchParams(window.location.search);
	
		params 			= ['page', 'filter_status', 'search_field', 'search_value'];
		let link		= "";
		$.each( params, function( key, value ) {
			if (searchParams.has(value) ) {
				link += value + "=" + searchParams.get(value) + "&";
			}
		
		});
	
		window.location.href = pathname + "?" + link +'filter_ishome='+id;
	});

	//Confirm button delete item
	$('.btn-delete').on('click', function() {
		if(!confirm('Bạn có chắc muốn xóa phần tử?'))
			return false;
	});
	
	$('input[name=ordering]').on('blur',function() {
		var new_value = $(this).val();
		var old_value = $(this).attr('value');
		var url       = $(this).data('url');
		var id 				= $(this).data('id');
		if(isNaN(new_value)) {
			warning('Please Insert Number');
		}
		if(old_value != new_value) {
			$.ajax({
				type: "GET",
				url: url.replace('value',new_value),
				dataType: "json",
				success: function(result) {
					if(result) notify('Ordering Updated!');
				}
			});
		} 
	});


	//ADD INPUT ATTRIBUTE
	var i = 1;
	var i=1;  
	$('#add').click(function(){  
			i++;  
			$('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="Nhập thuộc tính" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
	});  
	$(document).on('click', '.btn_remove', function(){  
		var button_id = $(this).attr("id");   
		$('#row'+button_id+'').remove();  
   });  

   
   	// $( "#sortable" ).sortable();
//    $( "#sortable" ).disableSelection();
   //TAGS INPUT FORM/PRODUCT


});