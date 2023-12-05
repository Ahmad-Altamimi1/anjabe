
     @extends('../layouts.pagesLayouts.Master')
    @section('content')
 <div class="ltn__utilize-overlay"></div>
<style>

/* Blur-zoom Container */
.img-hover-zoom--blur a img:hover {
  transition: transform 1s, filter 2s ease-in-out;
  filter: blur(2px);
  
  transform: scale(1.2);
}

/* The Transformation */
.img-hover-zoom--blur:hover a img{
  filter: blur(0);
  transform: scale(1);
}
<style>
    /* Add preloader styles */
    .preloader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.9);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
    }

    .preloader img {
        width: 50px; /* Adjust the size of the preloader image */
    }
</style>

    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area ltn__breadcrumb-area-4 ltn__breadcrumb-color-white---"  
    style="background-image:url(../{{ $postintag[0]->tag->IMG}})">
        <div class="container">
            <div class="row">

@php
if (count($postintag)>0) {
 $lastIndex = count($postintag) - 1;
    $lastTagTitle = $postintag[$lastIndex]->tag->TITLE;
}else {
    $lastTagTitle =$postintag[0]->tag->TITLE;
}
   
@endphp

                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner text-center">
                        <h1 class="ltn__page-title">{{ $lastTagTitle }}</h1>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="{{ ROUTE('home') }}">Home</a></li>
                                <li>{{ $lastTagTitle}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->
    
    <!-- PRODUCT DETAILS AREA START -->
    <div class="ltn__product-area mb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__shop-options">
                        <ul>
                            <li>
                               <div class="showing-product-number text-right">
    <span>
        Showing {{ $postintag->firstItem() }} - {{ $postintag->lastItem() }} of {{ $postintag->total() }} results
    </span>
</div>

                            </li>
                            <li>
                               <div class="short-by text-center">
                                    <select class="nice-select" id="sorting-options">
     
    <option value="default">ترتيب عشوائي</option>
    <option value="popularity" data-sort="popularity">الترتيب حسب </option>
    <option value="new" data-sort="created_at">الترتيب حسب ج</option>

                                    </select>
                                </div>
                                <div class="ltn__grid-list-tab-menu ">
                                    <div class="nav">
                                        <a class="active show" data-bs-toggle="tab" href="#liton_product_grid"><i class="icon-grid"></i></a>
                                        <a data-bs-toggle="tab" href="#liton_product_list"><i class="icon-menu"></i></a>
                                    </div>
                                </div> 
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="liton_product_grid">
                            <div class="ltn__product-tab-content-inner ltn__product-grid-view">
                                <div class="row" style="flex-direction: row-reverse; justify-content: center;">
                                    <!-- ltn__product-item -->
                                    <div class="ltn__utilize-overlay"></div>
                                    @foreach ($postintag as $postintags)
                                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                        <div class="ltn__product-item text-center">

                                            <div class="product-img img-hover-zoom img-hover-zoom--blur img-hover-zoom--xyz">
                                                <a href="{{ route('ShoWarticle',['id'=>$postintags->id]) }}"><img src="../{{ $postintags->IMG }}" alt="#" ></a>
                                                <div class="product-badge">
                                                    @if ($popularpost->id==$postintags->id)
                                                        
                                                    <ul>
                                                        <li class="badge-2">ألأكثر قراءه</li>
                                                    </ul>
                                                    @endif
                                                </div>
                                           
                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="{{ ROUTE('home',['id'=>$postintags->id]) }}">{{ $postintags->TITLE }}</a></h2>
                                                <div class="product-price">
                                                           {{ \Illuminate\Support\Str::limit($postintags->DESCRIPTION, $limit =20, $end = '...') }}

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                               
                                    <!--  -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="liton_product_list">
                            <div class="ltn__product-tab-content-inner ltn__product-list-view">
                                <div class="row">
                                    <!-- ltn__product-item -->
                                    <div class="col-lg-12">
                                    @foreach ($postintag as $postintags)

                                        <div class="ltn__product-item">
                                            <div class="product-img">
                                              <a href="{{ route('ShoWarticle',['id'=>$postintags->id]) }}"><img src="../{{ $postintags->IMG }}" alt="#"></a>

                                              <div class="product-badge">
                                                    @if ($popularpost->id==$postintags->id)
                                                        
                                                    <ul>
                                                        <li class="badge-2">ألأكثر قراءه</li>
                                                    </ul>
                                                    @endif
                                                </div>
                                            </div>

                                            
                                           <div class="product-info">
                                                <h2 class="product-title"><a href="{{ ROUTE('home',['id'=>$postintags->id]) }}">{{ $postintags->TITLE }}</a></h2>
                                                <div class="product-price">
{{ \Carbon\Carbon::parse($postintags->DATE_SCHEDULER)->locale('ar')->isoFormat('MMM DD, YYYY') }}
                                            </div>
                                              
                                                <div class="product-brief">
                                                           {{ \Illuminate\Support\Str::limit($postintags->DESCRIPTION, $limit =20, $end = '...') }}
</p>
                                                </div>
                                           
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   <div class="ltn__pagination-area text-center">
    <div class="ltn__pagination ltn__pagination-2">
        <ul>
            @if ($postintag->onFirstPage())
                <li class="disabled"><span ></span></li>
            @else
                <li><a href="{{ $postintag->previousPageUrl() }}"><i class="icon-arrow-left"></i></a></li>
            @endif

            @foreach ($postintag->getUrlRange(1, $postintag->lastPage()) as $page => $url)
                <li class="{{ $page == $postintag->currentPage() ? 'active' : '' }}">
                    <a href="{{ $url }}">{{ $page }}</a>
                </li>
            @endforeach

            @if ($postintag->hasMorePages())
                <li><a href="{{ $postintag->nextPageUrl() }}"><i class="icon-arrow-right"></i></a></li>
            @else
                <li class="disabled"><span></span></li>
            @endif
        </ul>
    </div>
</div>

                </div>
            </div>
        </div>
    </div>
    <!-- PRODUCT DETAILS AREA END -->

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
  <script src="{{ url('https://code.jquery.com/jquery-3.6.4.min.js') }}"></script>
<script>
  $(document).ready(function() {
        var pageid = "{{ $pageid }}"; // Make sure this value is set correctly

        $('#sorting-options').change(function() {
            var selectedOption = $(this).find(':selected');
            var sortValue = selectedOption.data('sort');

            // Show preloader while waiting for the AJAX response
            var preloader = $('<div class="preloader"><img src="../uploads/1700929636.jpg" alt="Loading..."></div>');
            $('body').append(preloader);

            // Make an AJAX request to the server
            $.ajax({
                url: '/showtag/' + pageid,
                type: 'GET',
                data: { sort: sortValue },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // Hide the preloader
                    preloader.remove();

                    // Update only the product grid content
                    $('#liton_product_grid .ltn__product-grid-view').html($(response).find('.ltn__product-grid-view').html());
                    $('#liton_product_list .ltn__product-list-view').html($(response).find('.ltn__product-list-view').html());
                },
                error: function(error) {
                    console.error('Error:', error);

                    // Hide the preloader on error
                    preloader.remove();
                }
            });
        });
    });
</script>


    @endsection
    <!-- BRAND LOGO AREA END -->
