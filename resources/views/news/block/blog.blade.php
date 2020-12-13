@php
     use App\Helpers\Template as Template;
     use App\Helpers\URL as URL;
@endphp
@if(count($articleFeatured) > 0)
    <div class="info-section">
        <h2 class="h3 title mb-4 text-center">Các bài viết nổi bật</h2>
        <div class="container">
            <div class="row">
                @foreach ($articleFeatured as $key => $val)
                    @php
                        $id             = $val['id'];
                        $name           = $val['name'];
                        $content        = Template::showContent($val['content'],234);
                        $thumb          = url("/images/article") . '/' . $val['thumb'];
                        $link           =   URL::linkArticle($id, $name) ;
                        $linkReadMore   = URL::linkCategoryArticle($val['category_id'], $val['category_article_name']);
                    @endphp
                    <div class="col-md-3">
                        <div class="feature-box feature-box-simple text-center">
                            <div>
                                <img style="display: initial; width:100% ; height:12em" src=" {{ $thumb }}" alt="">
                            </div>
                            <div class="feature-box-content">
                                <h3 class="entry-title" style="margin-top: 1em">
                                    <a href="{{ $link  }}">{{ $name }}</a>
                                </h3>
                                <div class="entry-content">
                                    <p style="justify-content: left">{!! $content !!}</p>
                                   
                                </div>
                                <a  style="margin-top: 1em;" href="{{ $link  }}" class="btn btn-dark">Đọc ngay</a>
                            </div>
                        </div>
                    </div>
                @endforeach             
            </div>
            <div class="xem-them">
                <a style="margin-top: 1em; background-color: deeppink; border-radius: 5em; border:none" href="{{ $linkReadMore  }}" class="btn btn-dark">Xem thêm</a>
            </div>
        </div>
    </div>
@endif