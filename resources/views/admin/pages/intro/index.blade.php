@extends('admin.main')
@section('content')
    @include ('admin.templates.page_header', ['pageIndex' => true , 'hidden' => true])
    @include ('admin.templates.zvn_notify')
    @include ('admin.templates.error')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                @include('admin.templates.x_title', ['title' => ''])
                <div class="x_content">
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                              @include('admin.pages.intro.head')   
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>  
@endsection



