
<!doctype html>
{{-- <html class="no-js" lang="ar" dir="rtl">    --}}

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Fiama - Flower Shop eCommerce HTML Template</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- <link rel="stylesheet" href="{{ url('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css') }}" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}

    <link rel="stylesheet" href="{{ url('css/animate.css') }}">
    
    <link rel="stylesheet" href="{{ url('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ url('css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ url('css/jquery.timepicker.css') }}">
  <link rel="shortcut icon" href="{{ url('assets/images/favicon.ico') }}" />
        <link rel="stylesheet" href="{{ url('assets/libs/icofont/icofont.min.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/tailwind.min.css') }}">
    
    <link rel="stylesheet" href="{{ url('css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <!-- Place favicon.png in the root directory -->
    <link rel="shortcut icon" href="pages/img/favicon.png" type="image/x-icon" />
    <!-- Font Icons css -->
    <link rel="stylesheet" href="{{ url ('pages/css/font-icons.css') }}">
    <!-- plugins css -->
    <link rel="stylesheet" href="{{ url('pages/css/plugins.css') }}">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ url('pages/css/style.css') }}">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{ url('pages/css/responsive.css') }}">
    {{-- /* gogle fonts  */ --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900;1000&family=EB+Garamond:ital,wght@0,400;0,500;1,400;1,500&family=M+PLUS+1p:wght@100;300;400;500;700;800;900&family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    {{-- /* gogle fonts  */ --}}
    <style>
        /* Define the styles for the scrollbar */
::-webkit-scrollbar {
    width: 16px; /* width of the scrollbar */
}

/* Handle */
::-webkit-scrollbar-thumb {
    background-color: pink; /* color of the scrollbar handle */
}

/* Track */
::-webkit-scrollbar-track {
    background: #f1f1f1; /* color of the scrollbar track */
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
    background: rgb(225, 98, 119); /* color of the scrollbar handle on hover */
}

    </style>
</head>
<body style="text-align: right" >
<div class="body-wrapper">
 <!-- HEADER AREA START (header-3) -->
    <!-- HEADER AREA START (header-4) -->
    <header class="ltn__header-area ltn__header-8 section-bg-6">
        <!-- ltn__header-top-area start -->
        <div class="ltn__header-top-area top-area-color-white d-none">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="ltn__top-bar-menu">
                            <ul>
                                <li><a href="mailto:info@webmail.com?Subject=Flower%20greetings%20to%20you"><i class="icon-mail"></i> info@webmail.com</a></li>
                                <li><a href="locations.html"><i class="icon-placeholder"></i> 15/A, Nest Tower, NYC</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="top-bar-right text-right">
                            <div class="ltn__top-bar-menu">
                                <ul>
                               
                                    <li>
                                        <!-- ltn__social-media -->
                                        <div class="ltn__social-media">
                                            <ul>
                                                <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                                
                                                <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                                                <li><a href="#" title="Dribbble"><i class="fab fa-dribbble"></i></a></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ltn__header-top-area end -->
        
        <!-- ltn__header-middle-area start -->
        <div class="ltn__header-middle-area ltn__header-sticky ltn__sticky-bg-white plr--5---">
            <div class="container">
                <div class="row">
                    <div class="col logo-column">
                        <div class="site-logo">
                            <a href="{{ route('home') }}"><img src="../انجابي فكتور-01-01.jpg" alt="Logo" style="
    width: 140px;
"></a>
                        </div>
                    </div>
                    <div class="col header-menu-column">
                        <div class="header-menu d-none d-xl-block">
                            <nav>
                                <div class="ltn__main-menu">
                                    <ul>
                                                                          <li class="menu-icon"><a href="#">نبذه عنا </a>
<?php 
use App\Models\Post;

    $First_trimester=Post::where('Monthsofpregnancy' ,'=','1')->take(3)->get();
    $Second_trimester=Post::where('Monthsofpregnancy' ,'=','1')->skip(3)->take(3)->get();
    $Third_trimester=Post::where('Monthsofpregnancy' ,'=','1')->skip(6)->take(3)->get();
    ?>
                                        <li class="menu-icon"><a href="#">الحمل</a>
                                            <ul class="mega-menu">
                                             
                                                <li style="text-align: right"><a href="#">الثلث الثالث </a>
                                                    <ul>
                                                        @foreach ($Third_trimester as $Third_trimester_month )
                                                            
                                                        <li style="text-align: right"><a href="{{ route('ShoWarticle',['id'=>$Third_trimester_month->id]) }}">{{ $Third_trimester_month->TITLE }}</a></li>
                                                        @endforeach
                                                      
                                                    </ul>
                                                </li>
                                                <li><a href="#" style="text-align: right">الثلث الثاني</a>
                                                    <ul>
                                                   @foreach ($Second_trimester as $Second_trimester_month )
                                                            
                                                        <li style="text-align: right"><a href="{{ route('ShoWarticle',['id'=>$Second_trimester_month->id]) }}">{{ $Second_trimester_month->TITLE }}</a></li>
                                                        @endforeach
                                                      
                                                    </ul>
                                                </li>
                                                <li><a href="#" style="text-align: right">الثلث الأول</a>
                                                    <ul>
                                                        
                                                           @foreach ($First_trimester as $First_trimester_month )
                                                            
                                                        <li style="text-align: right"><a href="{{ route('ShoWarticle',['id'=>$First_trimester_month->id]) }}">{{ $First_trimester_month->TITLE }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
             <li class="menu-icon">
    <a href="#">الفئات</a>
   
</li>



             <li class="menu-icon">
    <a href="#">فئات أخرى</a>
    <ul>


           @foreach ($allgroups as $group)
                                                    <?php
                                                    $string = $group->TAG;
                                                    $str_arr='';
                                                    $str_arr = explode(',', $string);

                                                    ?>

<li >
{{ $group->TITLE }}
<ul>
                                                    @foreach ($tags as $key=> $singletag)
                                                        @if (in_array($singletag->id, $str_arr) )

                                                          <li>
                    <a href="{{ route('showtag', ['tag' => $singletag->id]) }}" style="display: block; width: 100%; text-align: right; padding-right: 20px;">
                        {{ $singletag->TITLE }}
                    </a>
                </li>
                                                        @endif
                                                        @endforeach
                                                    </ul>
                                                    </li>
                                                     
                                            @endforeach
   

                                            
                                        </ul>
             </li>
             <
                                        <li><a href="{{ route('home') }}">الصفحة الرئيسيه</a></li>
                                    </div>
                            </nav>
                        </div>
                    </div>
                    <div class="col">
                        <div class="ltn__header-options">
                            <ul>
                                <li class="d-none">
                                    <!-- ltn__currency-menu -->
                                    <div class="ltn__drop-menu ltn__currency-menu">
                                        <ul>
                                            <li><a href="#" class="dropdown-toggle"><span class="active-currency">USD</span></a>
                                                <ul>
                                                    <li><a href="login.html">USD - US Dollar</a></li>
                                                    <li><a href="wishlist.html">CAD - Canada Dollar</a></li>
                                                    <li><a href="register.html">EUR - Euro</a></li>
                                                    <li><a href="account.html">GBP - British Pound</a></li>
                                                    <li><a href="wishlist.html">INR - Indian Rupee</a></li>
                                                    <li><a href="wishlist.html">BDT - Bangladesh Taka</a></li>
                                                    <li><a href="wishlist.html">JPY - Japan Yen</a></li>
                                                    <li><a href="wishlist.html">AUD - Australian Dollar</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="d-none">
                                    <!-- header-search-1 -->
                                    <div class="header-search-wrap">
                                        <div class="header-search-1">
                                            <div class="search-icon">
                                                <i class="icon-magnifier  for-search-show"></i>
                                                <i class="icon-magnifier-remove  for-search-close"></i>
                                            </div>
                                        </div>
                                        <div class="header-search-1-form">
                                            <form id="#234" method="get"  action="#">
                                                <input type="text" name="search" value="" placeholder="Search here..."/>
                                                <button type="submit">
                                                    <span><i class="icon-magnifier"></i></span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-none"> 
                                    <!-- user-menu -->
                                    <div class="ltn__drop-menu user-menu">
                                        <ul>
                                            <li>
                                                <a href="#"><i class="icon-user"></i></a>
                                                <ul>
                                                    <li><a href="login.html">Sign in</a></li>
                                                    <li><a href="register.html">Register</a></li>
                                                    <li><a href="account.html">My Account</a></li>
                                                    <li><a href="wishlist.html">Wishlist</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="d-none">
                                    <!-- header-wishlist -->
                                    <div class="header-wishlist">
                                        <a href="wishlist.html"><i class="icon-heart"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <!-- mini-cart 2 -->
                                      <li>
                                    <!-- header-search-1 -->
                                    <div class="header-search-wrap">
                                        <div class="header-search-1">
                                            <div class="search-icon">
                                                <i class="icon-magnifier  for-search-show"></i>
                                                <i class="icon-magnifier-remove  for-search-close"></i>
                                            </div>
                                        </div>
                                        <div class="header-search-1-form " id="searchcontent" >
                                           
                                               <input type="text" id="searchInput" placeholder="Type to search" style="margin: 0;">
                                            <ul id="searchResults"></ul>
                                        </div>
                                    </div>
                                </li>
                                </li>
                                <li>      
                                    <!-- Mobile Menu Button -->
                                    <div class="mobile-menu-toggle d-xl-none">
                                        <a href="#ltn__utilize-mobile-menu" class="ltn__utilize-toggle">
                                            <svg viewBox="0 0 800 600">
                                                <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" id="top"></path>
                                                <path d="M300,320 L540,320" id="middle"></path>
                                                <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
                                            </svg>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ltn__header-middle-area end -->
    </header>
    <!-- HEADER AREA END -->


    <!-- Utilize Mobile Menu Start -->
    <div id="ltn__utilize-mobile-menu" class="ltn__utilize ltn__utilize-mobile-menu">
        <div class="ltn__utilize-menu-inner ltn__scrollbar">
            <div class="ltn__utilize-menu-head">
                <div class="site-logo">
                    <a href="{{ route('home') }}"><img src="انجابي فكتور-01.png" alt="Logo"></a>
                </div>
                <button class="ltn__utilize-close">×</button>
            </div>
            <div class="ltn__utilize-menu-search-form">
                <form action="#">
                    <input type="text" placeholder="Search...">
                    <button><i class="icon-magnifier"></i></button>
                </form>
            </div>
            <div class="ltn__utilize-menu">
                <ul>
                      <li><a href="{{ route('home') }}">الصفحة الرئيسيه</a></li>

    
                    
                    <li><a href="#">Pages</a>
                        <ul class="sub-menu">
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="portfolio.html">Portfolio</a></li>
                            <li><a href="portfolio-2.html">Portfolio - 02</a></li>
                            <li><a href="portfolio-details.html">Portfolio Details</a></li>
                            <li><a href="faq.html">FAQ</a></li>
                            <li><a href="locations.html">Google Map Locations</a></li>
                            <li><a href="404.html">404</a></li>
                            <li><a href="contact.html">Contact</a></li>
                            <li><a href="coming-soon.html">Coming Soon</a></li>
                        </ul>
                    </li>
                 <li class="menu-icon"><a href="#">نبذه عنا </a>

                </ul>
            </div>
          
            <div class="ltn__social-media-2">
                <ul>
                    <li><a href="#" title="Facebook"><i class="icon-social-facebook"></i></a></li>
                    <li><a href="#" title="Twitter"><i class="icon-social-twitter"></i></a></li>
                    <li><a href="#" title="Pinterest"><i class="icon-social-pinterest"></i></a></li>
                    <li><a href="#" title="Instagram"><i class="icon-social-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <body>