@extends('admin.main')
@section('content')
    @include ('admin.templates.page_header', ['pageIndex' => true , 'hidden' => true])
    @include ('admin.templates.zvn_notify')
    @include ('admin.templates.error')
    @php
      $linkHead    = route($controllerName) . '?type=head' ;
      $linkFooter  = route($controllerName) . '?type=footer' ;
      $classHead   = ($params['type'] === 'head' || empty($params['type'])) ? "active" : null ;
      $classFooter = ($params['type'] === 'footer') ? "active" : null ;
    @endphp
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                @include('admin.templates.x_title', ['title' => ''])
                <div class="x_content">
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li class="{{ $classHead  }}"><a href="{{ $linkHead  }}">Phần Đầu</a></li>
                          <li class="{{ $classFooter}}"><a href="{{ $linkFooter }}" >Phần cuối</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                            @if($params['type'] === 'head' OR empty($params['type']) ) 
                              @include('admin.pages.script.head')  
                            @elseif($params['type'] === 'footer')
                              @include('admin.pages.script.footer')  
                            @endif
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>  
@endsection



