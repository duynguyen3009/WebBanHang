@if (count($items) > 0 )
   @foreach ($items as $item)
      <div class="form-group new" id="attr">
         <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ $item['name'] }}</label>
         <div class="col-md-3 col-sm-3 col-xs-12">
            <input class="form-control col-md-3 col-xs-12  input-tags-attr" name="attribute[{{ $item['id'] }}][]" type="text" >
         </div>
         <div class="col-md-2 col-sm-2 col-xs-12">
            <a style="margin-left: 162px;" class="btn btn-sm btn-danger btn-rounded btn-delete-no-change-price">X</a>
         </div>
      </div>
   @endforeach
@endif
