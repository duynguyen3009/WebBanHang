$(document).ready(function(){

    let $ajaxStatus             = $("[name = change-ajax-status]");
    let $ajaxContact            = $("[name = change-ajax-contact]");
    let $ajaxOrdering           = $("input[name = change-ajax-ordering]");
    let $ajaxSelectArttribute   = $("[name = select_change_attr]");
    let $ajaxIsHome             = $("[name = change-ajax-isHome]");
    let $ajaxTag                = $('#tag');
    let $ajaxAttrChangePrice    = $('#attribute-group-change-price');
    let $removeRow              = $("[name = remove-row]");
    // Change Ajax Status
    $ajaxStatus.click(function(){
        let url      = $(this).data("url") ;
        let element  = $(this) ;
        callAjax(url,element,'status');
    });

    $ajaxIsHome.click(function(){
        let url      = $(this).data("url") ;
        let element  = $(this) ;
        callAjax(url,element,'status');
    });
    // Change Ajax Contact in route contact
    $ajaxContact.click(function(){
        let url      = $(this).data("url") ;
        let element  = $(this) ;
        callAjax(url,element,'contact');
    });
    // Change Ordering 
    $ajaxOrdering.on("change" ,function(){
        let url      = $(this).data("url").replace("new_value",$(this).val()) ;
        let element  = $(this) ;
        callAjax(url,element,'ordering');
    });
    // Change SelectBox
    $ajaxSelectArttribute.on("change" ,function(){
        let url   = $(this).data("url").replace("new_value",$(this).val()) ;
        console.log(url);
        let element  = $(this) ;
        callAjax(url,element,'select');
    });
    // Change Attribute change-price
    $ajaxAttrChangePrice.on("change" ,function(){
        $('.new').remove();
        $('.x_content_attribute').after('<div class="form-group new"  id="attr"><div class="col-md-10 col-sm-6 col-xs-12 row-123 " name="remove-row"><input class="col-md-4 col-xs-12" name="attribute_change_price[name][]" type="text" placeholder="Tên"><input class=" col-md-4 col-xs-12" name="attribute_change_price[price][]" type="text" placeholder="Giá" style="margin-left:2px"><input class=" col-md-2 col-xs-12" name="attribute_change_price[ordering][]" type="text" placeholder="Thứ tự" style="margin-left:2px"><a href="#" id="remove-row" style="margin: 15px;  border: 2px solid red; border-radius: 12px; color: red; padding: 2px"><i class="fa fa-minus"></i></a></div><a href="#" id="add-row" style="margin: 15px;  border: 2px solid aqua; border-radius: 12px; color: aqua; padding: 2px"><i class="fa fa-plus"></i></a></div>');
        $('#add-row').click(function(){
            $('.x_content_attribute').after('<div class="form-group new" id="attr"><div class="col-md-10 col-sm-6 col-xs-12 row-123" name="remove-row"><input class="col-md-4 col-xs-12" name="attribute_change_price[name][]" type="text" placeholder="Tên"><input class=" col-md-4 col-xs-12" name="attribute_change_price[price][]" type="text" placeholder="Giá" style="margin-left:2px"><input class=" col-md-2 col-xs-12" name="attribute_change_price[ordering][]" type="text" placeholder="Thứ tự" style="margin-left:2px"><a href="#" id="remove-row" style="margin: 15px;  border: 2px solid red; border-radius: 12px; color: red; padding: 2px"><i class="fa fa-minus"></i></a></div><a href="#" id="add-row" style="margin: 15px;  border: 2px solid aqua; border-radius: 12px; color: aqua; padding: 2px"><i class="fa fa-plus"></i></a></div>');
        });

        $removeRow.click(function(){
            alert('Chưa có làm nha, hihi');
            // $(this).remove();
        });
    });
    
    //AUTOCOMPLETE TAG
    $ajaxTag.autocomplete({
        source:'autocomplete',
    })
    
    function callAjax(url,element,type){
        $.ajax({
            url : url ,
            type: "GET",
            dataType: "json",
            success: function (result) {
                if(result){
                    switch(type){
                        case 'status' :
                            element.text(result.name) ;
                            element.removeClass();
                            element.addClass(result.class) ;
                            element.data('url',result.link); //
                            notify(element, result.message);
                        case 'contact' :
                            element.text(result.name) ;
                            element.removeClass();
                            element.addClass(result.class) ;
                            element.data('url',result.link); //
                            notify(element, result.message);
                        case 'ordering' :
                            notify(element, result.message);
                        case 'select' :
                            notify(element, result.message);
                        case 'coupon' :
                            $("#value").find('option').remove();
                            $.each(result,function(key, value)
                            {
                                $("#value").append('<option value=' + key + '>' + value + '</option>') ; 
                            });

                    }
                }else{
                    console.log(result);
                }    
            }
        });
    }
    function notify(element,message){
        $(element).notify(
           ''+message+'' , {className: "success", position: "top", autoHideDelay: 1000, }
        );
    }
    //AUTOCOMPLETE TAG
    $ajaxTag.autocomplete({
        source:'autocomplete',
    })
    
}) ;

//ADMIN - PRODUCT - ATTRIBUTE
function showName(url){
    let id = $('#attribute-group').val();
    url = url.replace('attribute_new', id); // 
    $.get(url, function(data) { 
       $('.new').remove();
       $.each(data, function(index, value) {
          let name = value ;
          $('.x_content_attribute').after('<div class="form-group new" id="attr"><label  class="control-label col-md-3 col-sm-3 col-xs-12"> '+ value +'</label><div class="col-md-6 col-sm-6 col-xs-12"><input class="form-control col-md-6 col-xs-12  input-tags-attr" name="attribute['+name+'][]" type="text" ></div></div>');
          $('.input-tags-attr').tagsInput();
        });
   }, 'json');
}

//ADMIN - PRODUCT - ATTRIBUTE - CHANGE PRICE
function showNameChangePrice(url){
    // $('.x_content_attribute').after('<div class="form-group new1" id="attr"><div class="col-md-6 col-sm-6 col-xs-12"><input class="form-control col-md-6 col-xs-12" name="attribute['+name+'][]" type="text" ><input class="form-control col-md-6 col-xs-12" name="attributeChangePrice['+price+']" type="text" ></div></div>');
    // $('.input-tags-attr').tagsInput();
//     let id = $('#attribute-group-change-price').val();
//     url = url.replace('attribute_new', id); // 
//     $.get(url, function(data) { 
//        $('.new1').remove();
//        $.each(data, function(index, value) {
//           let name = value ;
//           $('.x_content_attribute').after('<div class="form-group new1" id="attr"><div class="col-md-6 col-sm-6 col-xs-12"><input class="form-control col-md-6 col-xs-12" name="attribute['+name+'][]" type="text" ><input class="form-control col-md-6 col-xs-12" name="attributeChangePrice['+price+']" type="text" ></div></div>');
//           $('.input-tags-attr').tagsInput();
//         });
//    }, 'json');
}
