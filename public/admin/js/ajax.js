$(document).ready(function () {

    let $ajaxStatus                 = $("[name = change-ajax-status]");
    let $ajaxContact                = $("[name = change-ajax-contact]");
    let $ajaxOrdering               = $("input[name = change-ajax-ordering]");
    let $ajaxSelectArttribute       = $("[name = select_change_attr]");
    let $ajaxChangeCategoryNested   = $("[name = category_id]");
    let $ajaxIsHome                 = $("[name = change-ajax-isHome]");
    let $ajaxTag                    = $('#tag');
    let $ajaxAttrChangePrice        = $('#attribute-group-change-price');
    let $removeRow                  = $("[name = remove-row]");
    // Change Ajax Status
    $ajaxStatus.click(function () {
        let url = $(this).data("url");
        let element = $(this);
        callAjax(url, element, 'status');
    });

    $ajaxIsHome.click(function () {
        let url = $(this).data("url");
        let element = $(this);
        callAjax(url, element, 'status');
    });
    // Change Ajax Contact in route contact
    $ajaxContact.click(function () {
        let url = $(this).data("url");
        let element = $(this);
        callAjax(url, element, 'contact');
    });
    // Change Ordering 
    $ajaxOrdering.on("change", function () {
        let url = $(this).data("url").replace("new_value", $(this).val());
        let element = $(this);
        callAjax(url, element, 'ordering');
    });
    // Change SelectBox
    $ajaxSelectArttribute.on("change", function () {
        let url = $(this).data("url").replace("new_value", $(this).val());
        let element = $(this);
        callAjax(url, element, 'select');
    });

    $ajaxChangeCategoryNested.on("change", function () {
        let url = $(this).data("url").replace("new_value", $(this).val());
        let element = $(this);
        callAjax(url, element, 'select');
    });

    
    function callAjax(url, element, type) {
        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",
            success: function (result) {
                if (result) {
                    switch (type) {
                        case 'status':
                            element.text(result.name);
                            element.removeClass();
                            element.addClass(result.class);
                            element.data('url', result.link); //
                            notify(element, result.message);
                            case 'contact':
                                element.text(result.name);
                                element.removeClass();
                                element.addClass(result.class);
                                element.data('url', result.link); //
                                notify(element, result.message);
                                case 'ordering':
                                    notify(element, result.message);
                                    case 'select':
                                        notify(element, result.message);
                                        case 'coupon':
                                            $("#value").find('option').remove();
                                            $.each(result, function (key, value) {
                                                $("#value").append('<option value=' + key + '>' + value + '</option>');
                                            });
                                            
                                        }
                                    } else {
                                        console.log(result);
                                    }
                                }
                            });
                        }
    function notify(element, message) {
        $(element).notify(
            '' + message + '', { className: "success", position: "top", autoHideDelay: 1000, }
            );
    }

    // SELECT2 TAG
    $('.tag-select').select2();
        
    // SHOW THUỘC TÍNH KHÔNG THAY ĐỔI GIÁ (SELECBOX)
    $('.attribute_group').change(function (e) { 
        e.preventDefault();
        id  = $(this).val();
        url = $(this).data("url");
        url = url.replace("new_value", id);
        $.ajax({
            url: url,
            type: "GET",
            dataType: "html",
            success: function (result) {
                $('.list-product-no-change-price').html(result);
                $('.input-tags-attr').tagsInput();
                $('.btn-delete-no-change-price').click(function (e) { 
                    let ele = $(this).parents('.new')
                    $(ele).hide('slow', function () { $(ele).remove(); });
                });
            }
        })
    });

    //SHOW THUỘC TÍNH THAY ĐỔI GIÁ(SELECBOX)
    $('.attribute-group-change-price').change(function (e) { 
        e.preventDefault();
        id  = $(this).val();
        url = $(this).data("url");
        url = url.replace("new_value", id);
        $.ajax({
            url: url,
            type: "GET",
            dataType: "html",
            success: function (result) {
                console.log(result);
                $('.list-product-change-price').html(result);
                $('.input-tags-attr').tagsInput();
                $('.btn-delete-no-change-price').click(function (e) { 
                    let ele = $(this).parents('.new')
                    $(ele).hide('slow', function () { $(ele).remove(); });
                });
            }
        })
    });
    // THÊM THUỘC TÍNH KHÔNG THAY ĐỔI GIÁ (BUTTON)
    $('.btn-add-attribute-no-change-price').click(function (e) { 
        e.preventDefault();
        $.ajax({
            url: $(this).data('link'),
            type: "GET",
            dataType: "html",
            success: function (result) {
                $('.list-product-no-change-price').append(result);
                $('.input-tags-attr').tagsInput();
                $('.btn-delete-no-change-price').click(function (e) { 
                    let ele = $(this).parents('.new')
                    $(ele).hide('slow', function () { $(ele).remove(); });
                });
                $('.btn-delete-price-row').click(function (e) { 
                    let ele = $(this).parents('.price-row')
                    $(ele).hide('slow', function () { $(ele).remove(); });
                });
            }
        })
        
    });

    // THÊM THUỘC TÍNH THAY ĐỔI GIÁ (BUTTON)
    $('.btn-add-attribute-change-price').click(function (e) { 
        e.preventDefault();
        $.ajax({
            url: $(this).data('link'),
            type: "GET",
            dataType: "html",
            success: function (result) {
                $('.list-product-change-price').append(result);
                $('.input-tags-attr').tagsInput();
                $('.btn-delete-change-price').click(function (e) { 
                    let ele = $(this).parents('.new')
                    $(ele).hide('slow', function () { $(ele).remove(); });
                });
                $('.btn-delete-price-row').click(function (e) { 
                    let ele = $(this).parents('.price-row')
                    $(ele).hide('slow', function () { $(ele).remove(); });
                });
            }
        })
        
    });

    $('.btn-delete-no-change-price-edit').click(function (e) { 
        e.preventDefault();
        let ele = $(this).parents('.new')
        $(ele).hide('slow', function () { $(ele).remove(); });
    });
    $('.btn-delete-change-price-edit').click(function (e) { 
        e.preventDefault();
        let ele = $(this).parents('.price-row')
        $(ele).hide('slow', function () { $(ele).remove(); });
    });

        
    
    
});




