       
        @foreach ($tags as $tag )
            
        <div class="ltn__blog-area  pt-60 ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area text-center">
                            <h1 class="section-title section-title-border">{{ $tag->TITLE }}</h1>
                        </div>
                    </div>
                </div>
                <div class="row  ltn__blog-slider-one-active slick-arrow-1">
                    <!-- Blog Item -->
                    @php $count = 0 @endphp

                    @foreach ($tag->posts as $post )
                  @if ($count < 6)
                    <div class="col-lg-12">
                        <div class="ltn__blog-item">
                            <div class="ltn__blog-img">
                                <a href="{{ route('ShoWarticle',["id"=>$post->id]) }}"><img src="{{ asset($post->IMG ) }}" alt="#"></a>
                            </div>

                            <div class="ltn__blog-brief">
                                <div class="ltn__blog-meta">
                                    <ul style="justify-content: space-between;    display: flex;">
                                        <li class="ltn__blog-author d-none" >
                                            
                                        </li>
                                        <li>
                                         {{-- <span>{{ \Carbon\Carbon::parse($post->DATE_SCHEDULER)->locale('ar')->isoFormat('MMM DD, YYYY') }}</span> --}}

                                        </li>
                                      <h3 class="ltn__blog-title " style="text-align:right ;display: inline-block;">
    <a href="{{ route('ShoWarticle', ["id" => $post->id]) }}" >
        {{ $post->TITLE }} 
     

    </a>
</h3>
                                    </ul>

                                </div>

                                <span class="ltn__blog-title blog-title-line" style="text-align:right ;display:block;margin-top: -19px;
 max-width:100%" >
    <a href="{{ route('ShoWarticle', ["id" => $post->id]) }}" >
     
       {{ \Illuminate\Support\Str::limit($post->DESCRIPTION, $limit =60, $end = '...') }}

    </a>
</span>

                            </div>

                        </div>
                        @php $count++ @endphp
        </div>
    @endif
        @endforeach
               
                    <!--  -->
                </div>

            </div>
           
      
        @endforeach
