@extends('admin.main')
@section('content')
    @include ('admin.templates.page_header', ['pageIndex' => true , 'hidden' => true])
    @include ('admin.templates.zvn_notify')
    @include ('admin.templates.error')
    @php
      $linkGeneral    = route($controllerName) . '?type=general' ;
      $linkEmail      = route($controllerName) . '?type=email' ;
      $linkSocial     = route($controllerName) . '?type=social' ;
      $classGeneral   = ($params['type'] === 'general' || empty($params['type'])) ? "active" : null ;
      $classEmail     = ($params['type'] === 'email')  ? "active" : null ;
      $classSocial    = ($params['type'] === 'social') ? "active" : null ;
    @endphp
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                {{-- @include('admin.templates.x_title', ['title' => '']) --}}
                <div class="x_content">
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li class="{{ $classGeneral }}"><a href="{{ $linkGeneral }}"> Cấu hình chung</a></li>
                          <li class="{{ $classEmail   }}"><a href="{{ $linkEmail   }}"> Cấu hình Email </a></li>
                          <li class="{{ $classSocial  }}"><a href="{{ $linkSocial  }}"> Cấu hình Social </a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                            @if($params['type'] === 'general' OR empty($params['type']) ) 
                              @include('admin.pages.setting.general')  
                            @elseif($params['type'] === 'email')
                              @include('admin.pages.setting.email')  
                            @elseif($params['type'] === 'social')
                              @include('admin.pages.setting.social') 
                            @endif
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>  
@endsection



