
<script>
    $(document).ready(function () {
        $('.sortable').sortable();
    });
</script>
<div class="col-md-6 col-sm-12 col-xs-12">
    <div class="x_panel">
        @include('admin.templates.x_title', ['title' => 'Quản lý hình ảnh'])
        <div class="formfield"><div id="my-dropzone" class="dropzone sortable"></div></div>
    </div>
</div>
<script> 
@php
    $thumb      = (json_decode($item['thumb']));
    $srcThumb   = asset('uploads');
@endphp
document.addEventListener("DOMContentLoaded", function() {
    var uploadedDocumentMap = {}
    var maxImageWidth = 120, maxImageHeight = 120;
  Dropzone.autoDiscover = false;
  $('div#my-dropzone').dropzone({
        url: "{{ route("product/storeMedia") }}",
        method: 'post',
        addRemoveLinks: true,
        previewTemplate:`<div class="dz-preview dz-file-preview">
                            <img data-dz-thumbnail/>
                        </div>`,
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        success: function (file, response) {
            console.log(response);
            $(file.previewElement).append('<input type="hidden" id="sortable" name="thumb[name][]" value="' + response.name + '">'),
            uploadedDocumentMap[file.name] = response.name
        },
        removedfile: function (file) {
            file.previewElement.remove()
            $('.formfield').find('input[name="thumb[name][]"][value="' + file.name + '"]').remove()
        },
        init: function () {
            @if(isset($item['thumb']))
                var files = JSON.parse({!! json_encode($item['thumb']) !!});
                for (var i in files) {
                    var file = files[i] // file name
                    var src  = "{{ $srcThumb }}"+"/"+file;
                    var mockFile = { name: file };
                    this.options.addedfile.call(this, mockFile);
                    this.options.thumbnail.call(this, mockFile, src);
                    $('.dz-preview img').width(120); // Units are assumed to be pixels
                    $('.dz-preview img').height(120);
                    $(mockFile.previewElement).append('<input type="hidden" name="thumb[name][]" value="' + file + '">')
                }
            @endif
        }
  });
});


    
   </script>