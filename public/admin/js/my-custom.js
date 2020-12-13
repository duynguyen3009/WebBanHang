// // RAMDOM
// function ramdom(length) {
//     var result           = '';
//     var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
//     var charactersLength = characters.length;
//     for ( var i = 0; i < length; i++ ) {
//        result += characters.charAt(Math.floor(Math.random() * charactersLength));
//     }
//     return result;
// }
// //=======CHANGE - CODE - FORM/COUPON=====
// $("a#change-code").click(function(e) {
//    let valueRandoom   =  ramdom(10)   ;
//    var name           = $("input[name=code]").val(valueRandoom);
//  });
//  // DISPLAY STAR
// $( document ).ready(function() {
    
//     $('#combostar').combostars({
//         starUrl:'../../../admin/img/stars.png',
//         starWidth: 16,
//         starHeight: 15,
//         clickMiddle:true
        
//      });
        
//     $('#combostar').on('change',function () {
//         $('#starcount').text($(this).val());
//     });
// });
// // KÉO THẢ INPUT THAY ĐỔI GIÁ


// // $('#attribute-group-change-price').on('change', function () {
// //     if ($(this).val() != 'default') {     
// //         $('.btn-add-attribute-price').css('display', 'unset'); // Hiển thị nút thêm thuộc tính
// //         $.ajax({
// //             url: $(this).data('link'),
// //             type: "GET",
// //             dataType: "html",
// //             success: function (result) {
// //                 $('.price-list').html(result);
// //                 deleteInputChangePrice();
// //             }
// //         })
// //     }
// // })

// $('.btn-add-attribute-price').on('click', function () {
//     $.ajax({
//         url: $('#attribute-group-change-price').data('link'),
//         type: "GET",
//         dataType: "html",
//         success: function (result) {
//             $('.price-list').append(result);
//             deleteInputChangePrice();
//         }
//     })
// })

// $('.btn-add-attribute-price-edit').on('click', function () {
//     $.ajax({
//         url: $('.attribute-group-change-price').data('link'),
//         type: "GET",
//         dataType: "html",
//         success: function (result) {
//             $('.price-list').append(result);
//             deleteInputChangePrice();
//         }
//     })
// })

// function deleteInputChangePrice(){
//     $('.btn-delete-price-row').on('click', function () {
//         // $(this).parents('.price-row').remove();
//         let ele = $(this).parents('.price-row')
//         $(ele).hide('slow', function () { $(ele).remove(); });
//     })
// }
// // THUỘC TÍNH KHÔNG THAY ĐỔI GIÁ
// function showName(url) {
//     let getValue = $('#attribute-group').val();
//     if(getValue == "default"){
//         $('.new').remove();
//     }else{
//         url = url.replace('attribute_new', getValue); // 
//         $.get(url, function (data) {
//             $('.new').remove();
//             $.each(data, function (index, value) {
//                 let name    = value;
//                 let id      = index
//                 $('.x_content_attribute').after('<div class="form-group new" id="attr"><label  class="control-label col-md-3 col-sm-3 col-xs-12"> ' + name + '</label><div class="col-md-6 col-sm-6 col-xs-12"><input class="form-control col-md-6 col-xs-12  input-tags-attr" name="attribute['+id+'][]" type="text" ></div></div>');
//                 $('.input-tags-attr').tagsInput();
//             });
//         }, 'json');
//     }
   
// }

// $('.list-draggable').sortable();