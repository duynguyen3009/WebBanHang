@php
    use App\Helpers\Template;
    $id = Template::generateRandomString(5);
@endphp
<div class="form-group new" id="attr">
    <div class="col-md-3 col-sm-3 col-xs-12">
        <input type="text" class="form-control" name="attribute[newattr][{{$id}}][name]">
    </div>
    <div class="col-md-3 col-sm-3 col-xs-12">
       <input class="form-control input-tags-attr" name="attribute[newattr][{{$id}}][value]" type="text" >
   </div>
   <div class="col-md-2 col-sm-2 col-xs-12">
      <a style="margin-left: 162px;" class="btn btn-sm btn-danger btn-rounded btn-delete-no-change-price">X</a>
   </div>
</div>