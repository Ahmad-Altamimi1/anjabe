
    @extends('../layouts.pagesLayouts.Master')
@section('content')
    <style>
        .blog-title-line::before{
            left: 90%;
        }
        a,
a:hover,
a:focus,
a:active {
  text-decoration: none;
  outline: none;
  color: inherit !important ; }

a:hover {
  color: var(--ltn__secondary-color) !important;
text-decoration:none !important}
.recnt_title{
        font-size: 19px !important;
    margin-top: 12px;
    display: inline-block;
}
.text-center .section-title-border::before{
    width: 0;
}
h3{
    font-size: 27px !important;
}
    </style>
    <div class="ltn__utilize-overlay"></div>

    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area ltn__breadcrumb-area-4 ltn__breadcrumb-color-white---" style="background-image:url(../{{ $post->tag->IMG }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner text-center">
                        <h1 class="ltn__page-title">{{ $post->TITLE }}</h1>
                        <div class="ltn__breadcrumb-list">
                            <ul style="display: flex;flex-direction:row-reverse ;justify-content:center">
                                <br>
                                <span><a href="{{ route('home') }}">الصفحة الرئيسية</a> 
                                
                                     @foreach ($Categories as $stag)
                                    @foreach ($tags as $singletag)
                                    @if ($stag == $singletag->id  )
                                    <span> <a href="{{ count($singletag->posts) > 0 ? route('showtag', ['tag' => $singletag->id]) : '#' }}"
>  {{  '/'. $singletag->TITLE  }}</a></span>
                                   
                                    @endif
                                    @endforeach
                                    @endforeach
                            
                                </span>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->

    <!-- PAGE DETAILS AREA START (blog-details) -->
    <div class="ltn__page-details-area ltn__blog-details-area mb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="ltn__blog-details-wrap">
                        <div class="ltn__page-details-inner ltn__blog-details-inner">
                            <div class="ltn__blog-meta" style="text-align: left;">
                                <ul>
                                        {{-- <span> by: {{ $post->user->name }}</span> --}}

                                    <li class="ltn__blog-author d-none">
                                        {{-- <a href="#">by: {{ $post->user->name }}</a> --}}
                                    </li>
                                    <li>
                                                            <span>{{ \Carbon\Carbon::parse($post->DATE_SCHEDULER)->locale('ar')->isoFormat('MMM DD, YYYY') }}</span>

                                    </li>
                                    {{-- <li class="ltn__blog-comment">
                                        <a href="#"><i class="icon-speech"></i> 2</a>
                                    </li> --}}
                                </ul>
                            </div>
                            <h3 class="ltn__blog-title blog-title-line" style="text-align: right"><a >{{ $post->TITLE }} </a></h3>
                            <img class="blog-details-main-image mb-15" src="../{{ $post->IMG }}" alt="Image" data-toggle="modal" data-target="#imageModal">
<p style="word-break: break-all; text-align:right">  <?php echo $post->TEXT1 ?>  </p>
<p>{{ $post->TEXT2 }}</p>
<p>{{ $post->TEXT3 }}</p>

{{-- لعرض الصوره في موديل  --}}

                            <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="justify-content: end;
            ">
                <h5 class="modal-title" id="imageModalLabel" >{{ $post->TITLE }} </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Use Blade syntax to get the image source -->
                <img src="{{ asset($post->IMG) }}" class="img-fluid" alt="Image">
            </div>
        </div>
    </div>
</div>
{{-- لعرض الصوره في موديل الأنتهاء --}}

                            {{-- <div class="row mt-30">
                                <div class="col-sm-6">
                                    <img src="../pages/img/blog/blog-details/1.jpg" alt="Image">
                                    <label>Image Caption Here</label>
                                </div>
                                <div class="col-sm-6">
                                    <img src="../pages/img/blog/blog-details/2.jpg" alt="Image">
                                </div>
                            </div> --}}

                            
                        </div>
                        
                        <!-- blog-tags-social-media -->
                        <div class="ltn__blog-tags-social-media mt-20 row" style="flex-direction: row-reverse;">
                            <div class="ltn__tagcloud-widget col-lg-7" style="flex-direction: row-reverse;">
                                <h4>:الفئات</h4>
                                <h4></h4>

                                
                                <ul >
                                                              @foreach ($tags as $tag)
                                    
                         @if (count($tag->posts)>0)
                                    <li>
    <a href="{{ route('showtag', ['tag' => $tag->id]) }}">
        {{ $tag->TITLE }}
    </a>
</li>
      
                                @else
                                    
                                @endif
                                @endforeach
                             
                                </ul>
                            </div>
                            <div class="ltn__social-media text-right col-lg-5" style="flex-direction: row-reverse;">
                                <h4 style="text-align: right">:مشاركه </h4>
                              {!! $sharebutton->__toString() !!}
                            </div>
                        </div>
                        <hr>
                        <!-- prev-next-btn -->
                        <div class="ltn__prev-next-btn row mb-50">
                             <div class="ltn__product-slider-area ltn__product-gutter  ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area text-center">
                            <h3 class="section-title section-title-border"> موضوعات أخرى </h3>
                        </div>
                    </div>
                </div>
                <div class="row ltn__product-slider-item-four-active slick-arrow-1">
                    <!-- ltn__product-item -->
                    @foreach ($Otherposts as $Otherpost)
                        
                    <div class="col-12">
                        <div class="ltn__product-item text-center">
                            <div class="product-img">
                                <a href="{{ route('ShoWarticle',['id'=>$Otherpost->id]) }}"><img src="{{ asset('../'. $Otherpost->IMG) }}" alt="#"></a>
                                <div class="product-badge">
                                
                                </div>
                               
                            </div>
                            <div class="product-info">
                                <h2 class="product-title"><a href="{{ route('ShoWarticle',['id'=>$Otherpost->id]) }}">{{ $Otherpost->TITLE }}</a></h2>
                                <div class="product-price">
                                 
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
              
                </div>
            </div>
        </div>
                            <div class="blog-prev col-lg-6"  style="display: flex; flex-direction : column">
                                @isset($previousPost)
                                <div class="blog-prev-next-img" style="flex-direction: row-reverse">
                                  <h3 class="ltn__blog-title"><a href="{{ route('ShoWarticle', ['id' => $previousPost->id]) }}"><img src="" ></a>

                                </div>
                                <div class="blog-prev-next-info" style="display: flex; flex-direction : column">
                                    <p><a href="{{ route('ShoWarticle', ['id' => $previousPost->id]) }}"> </a></p>

                                
                                   <h3 class="ltn__blog-title"><a href="{{ route('ShoWarticle', ['id' => $previousPost->id]) }}"></a></h3>

                                </div>
                                
                                @endisset
                            </div>

                            <div class="blog-prev blog-next text-right col-lg-6" style="flex-direction: row-reverse ; gap:10px">
                                @isset($secondPost)

                                <div class="blog-prev-next-info">
                                    <p><a href="{{ route('ShoWarticle', ['id' => $secondPost->id]) }}"> </a></p>


                      
                                    <h3 class="ltn__blog-title"><a href="{{ route('ShoWarticle', ['id' => $secondPost->id]) }}"></a></h3>
                                </div>
                                <div class="blog-prev-next-img">
                                    <a href="{{ route('ShoWarticle', ['id' => $secondPost->id]) }}"><img src="" ></a>
                                </div>
                                @endisset

                            </div>
                        </div>
                        <hr>
                    
                    </div>
                </div>
                <div class="col-lg-4">
                    <aside class="sidebar-area blog-sidebar ltn__right-sidebar">
                        <!-- Search Widget -->
                   
                        <!-- Author Widget -->
                        <div class="widget ltn__author-widget">
                         <h2 class="ltn__widget-title">المقالات المشابهه</h2>


                            <div class="ltn__author-widget-inner">
                                <a href="{{ route('ShoWarticle', ['id' => $similar_and_popular_post->id]) }}"><img src="../{{ $similar_and_popular_post->IMG }}" alt="Image"></a>

                                <a href="{{ route('ShoWarticle', ['id' =>  $similar_and_popular_post->id]) }}">{{ $similar_and_popular_post->TITLE }}</a>
                                <p class="d-none">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis distinctio, odio, eligendi suscipit reprehenderit atque.</p>
                                <div class="ltn__social-media d-none">
                                    <ul>
                                        <li><a href="#" title="Facebook"><i class="icon-social-facebook"></i></a></li>
                                        <li><a href="#" title="Twitter"><i class="icon-social-twitter"></i></a></li>
                                        <li><a href="#" title="Pinterest"><i class="icon-social-pinterest"></i></a></li>
                                        <li><a href="#" title="Instagram"><i class="icon-social-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Popular Post Widget -->
                           <div class="widget ltn__popular-post-widget">
                            <h2 class="ltn__widget-title">المقالات الحديثه</h2>

                                <ul>
                                    @foreach ($recentposts as $recentpost)
                                        
                                    <li>
                                        <div class="popular-post-widget-item clearfix">
                                            <div class="popular-post-widget-img">
                                                <a href="{{ route('ShoWarticle', ['id' => $recentpost->id]) }}"><img src="{{ asset($recentpost->IMG) }}" alt="#"></a>
                                            </div>
                                            <div class="popular-post-widget-brief">
                                                <div class="ltn__blog-meta" >
                                                    <ul style="display: flex;
    justify-content: space-between;">
                                                        <li class="ltn__blog-author d-none">
                                                            <a href="#">by: {{ $recentpost->WRITER }}</a>
                                                        </li>
                                                                        <li class="ltn__blog-comment">
                                                                            
                                        <span style="font-size: 12px" >  <i class="fa fa-eye" aria-hidden="true"></i> {{ $recentpost->SHOW }}</span>
                                     
                                    </li>
                                                        <li>
                                                            {{-- <span>{{ \Carbon\Carbon::parse($recentpost->DATE_SCHEDULER)->locale('ar')->isoFormat('MMM DD, YYYY') }}</span> --}}
                                                        </li>
                                      
                                                    </ul>
                                                </div>
                                                
                                                <h6 class="ltn__blog-title blog-title-line " style="text-align: right"><a href="{{ route('ShoWarticle', ['id' => $recentpost->id]) }}" class="recnt_title"> {{ $recentpost->TITLE }}</a></h6>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                
                                </ul>
                            </div>
                        <!-- Category Widget -->
                        <div class="widget ltn__menu-widget">
                            <h4 class="ltn__widget-title">الفئأت</h4>
                            <ul>
                                @foreach ($tags as $tag)
                                @if (count($tag->posts)>0)
                                    <li>
    <a href="{{ route('showtag', ['tag' => $tag->id]) }}">
        {{ $tag->TITLE }}
    </a>
</li>
      
                                @else
                                    
                                @endif
                                    
                             @endforeach

                       
                            </ul>
                        </div>
                        <!-- Tagcloud Widget -->

                        <!-- Social Media Widget -->
                        <div class="widget ltn__social-media-widget d-none">
                            <h4 class="ltn__widget-title ltn__widget-title-border">Never Miss News</h4>
                            <div class="ltn__social-media-2">
                                <ul>
                                    <li><a href="#" title="Facebook"><i class="icon-social-facebook"></i></a></li>
                                    <li><a href="#" title="Twitter"><i class="icon-social-twitter"></i></a></li>
                                    <li><a href="#" title="Pinterest"><i class="icon-social-pinterest"></i></a></li>
                                    <li><a href="#" title="Instagram"><i class="icon-social-instagram"></i></a></li>                                    
                                </ul>
                            </div>
                        </div>
                        <!-- Popular Post Widget (Twitter Post) -->
                        <div class="widget ltn__popular-post-widget ltn__twitter-post-widget d-none">
                            <h4 class="ltn__widget-title ltn__widget-title-border">Twitter Feeds</h4>
                            <ul>
                                <li>
                                    <div class="popular-post-widget-item clearfix">
                                        <div class="popular-post-widget-img">
                                            <a href="blog-details.html"><i class="fab fa-twitter"></i></a>
                                        </div>
                                        <div class="popular-post-widget-brief">
                                            <p>Carsafe - #Gutenberg ready 
                                                @wordpress
                                                 Theme for Car Service, Auto Parts, Car Dealer available on 
                                                @website
                                                <a href="https://website.net">https://website.net</a></p>
                                            <div class="ltn__blog-meta">
                                                <ul>
                                                    <li class="ltn__blog-date">
                                                        <a href="#"><i class="far fa-calendar-alt"></i>June 22, 2020</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="popular-post-widget-item clearfix">
                                        <div class="popular-post-widget-img">
                                            <a href="blog-details.html"><i class="fab fa-twitter"></i></a>
                                        </div>
                                        <div class="popular-post-widget-brief">
                                            <p>Carsafe - #Gutenberg ready 
                                                @wordpress
                                                 Theme for Car Service, Auto Parts, Car Dealer available on 
                                                @website
                                                <a href="https://website.net">https://website.net</a></p>
                                            <div class="ltn__blog-meta">
                                                <ul>
                                                    <li class="ltn__blog-date">
                                                        <a href="#"><i class="far fa-calendar-alt"></i>June 22, 2020</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="popular-post-widget-item clearfix">
                                        <div class="popular-post-widget-img">
                                            <a href="blog-details.html"><i class="fab fa-twitter"></i></a>
                                        </div>
                                        <div class="popular-post-widget-brief">
                                            <p>Carsafe - #Gutenberg ready 
                                                @wordpress
                                                 Theme for Car Service, Auto Parts, Car Dealer available on 
                                                @website
                                                <a href="https://website.net">https://website.net</a></p>
                                            <div class="ltn__blog-meta">
                                                <ul>
                                                    <li class="ltn__blog-date">
                                                        <a href="#"><i class="far fa-calendar-alt"></i>June 22, 2020</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- Instagram Widget -->
                        <div class="widget ltn__instagram-widget d-none">
                            <h4 class="ltn__widget-title ltn__widget-title-border">Instagram Feeds</h4>
                            <div class="ltn__instafeed ltn__instafeed-grid insta-grid-gutter"></div>
                        </div>
                        <!-- Banner Widget -->
                        <div class="widget ltn__banner-widget d-none">
                            <a href="shop.html"><img src="../pages/img/banner/1.jpg" alt="Banner Image"></a>
                        </div>
                        
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- PAGE DETAILS AREA END -->

    <!-- BRAND LOGO AREA START -->
    <div class="ltn__brand-logo-area  ltn__brand-logo-1 section-bg-1 pt-35 pb-35 plr--5">
        <div class="container-fluid">
            <div class="row ltn__brand-logo-active">
                <div class="col-lg-12">
                    <div class="ltn__brand-logo-item">
                        <img src="../pages/img/brand-logo/1.png" alt="Brand Logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__brand-logo-item">
                        <img src="../pages/img/brand-logo/2.png" alt="Brand Logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__brand-logo-item">
                        <img src="../pages/img/brand-logo/3.png" alt="Brand Logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__brand-logo-item">
                        <img src="../pages/img/brand-logo/4.png" alt="Brand Logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__brand-logo-item">
                        <img src="../pages/img/brand-logo/5.png" alt="Brand Logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__brand-logo-item">
                        <img src="../pages/img/brand-logo/1.png" alt="Brand Logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__brand-logo-item">
                        <img src="../pages/img/brand-logo/2.png" alt="Brand Logo">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BRAND LOGO AREA END -->
    <!-- Add these links in the head section of your HTML file -->
<link rel="stylesheet" href="{{ url('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css') }}">
<script src="{{ url('https://code.jquery.com/jquery-3.3.1.slim.min.js') }}"></script>
<script src="{{ url('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js') }}"></script>

@endsection
