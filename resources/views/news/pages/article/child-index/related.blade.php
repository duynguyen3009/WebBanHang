@php
     use App\Helpers\Template as Template;
     use App\Helpers\URL as URL;
@endphp
@if(count($items['related_articles']) > 0)
    <div class="related-posts">
        <h4 class="light-title"><strong>Bài viết liên quan</strong></h4>
        <div class="owl-carousel owl-theme related-posts-carousel owl-loaded owl-drag">
            <div class="owl-stage-outer">
                <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1200px;">

                    @foreach($items['related_articles'] as $key => $value)
                        @php
                            $thumb   = asset('images/article/' . $value['thumb']);
                            $content     = Template::showContent($value['content'],120);
                            $name        = substr($value['name'], 0, 75) ;
                            $link        = URL::linkArticle($value['id'],$value['name']);
                        @endphp
                        <div class="owl-item active" style="width: 270px; margin-right: 30px;">
                            <article class="entry">
                                <div class="entry-media">
                                    <img  style="height: 176px; width:270px" src="{{ $thumb }}" alt="Post">
                                </div>
                                    <h2 class="entry-title">
                                        <a href="{{ $link }}">{{ $name   }}</a>
                                    </h2>
                                    <div class="entry-content">
                                        <p>{!! $content !!}</p>
                                        <a href="{{ $link }}" class="read-more">Xem chi tiết <i class="icon-angle-double-right"></i></a>
                                    </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><i class="icon-left-open-big"></i></button><button type="button" role="presentation" class="owl-next"><i class="icon-right-open-big"></i></button></div>
        </div>
    </div>
@endif