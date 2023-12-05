 <header class="ltn__header-area ltn__header-3 section-bg-6">
     <!-- ltn__header-middle-area start -->

     <!-- ltn__header-middle-area end -->

     <!-- header-bottom-area start -->
     <div class="header-bottom-area ltn__border-top ltn__header-sticky  ltn__sticky-bg-white ltn__primary-bg---- menu-color-white---- d-none d-lg-block">
         <div class="container">
             <div class="row">
                 <div class="col header-menu-column justify-content-center">
                     <div class="sticky-logo">

                     </div>
                     <div class="header-menu header-menu-2">



                         <nav>

                             <div class="ltn__main-menu">
                                 <ul>
                                     <li class="ltn__main-menu">
                                         <div class="site-logo">
                                             <a href=""><img src="pages/img/logo.png" alt="Logo"></a>
                                         </div>
                                     </li>


                                     <li class="menu-icon"><a href="#">نبذه عنا </a>

                                     </li>
                                     <li class="menu-icon"><a href="#">Pages</a>
                                         <ul class="mega-menu">
                                             <li><a href="#">Inner Pages</a>
                                                 <ul>
                                                     <li><a href="about.html">About Us</a></li>
                                                     <li><a href="portfolio.html">Portfolio</a></li>
                                                     <li><a href="portfolio-2.html">Portfolio - 02</a></li>
                                                     <li><a href="portfolio-details.html">Portfolio Details</a></li>
                                                     <li><a href="faq.html">FAQ</a></li>
                                                 </ul>
                                             </li>
                                             <li><a href="#">Inner Pages</a>
                                                 <ul>
                                                     <li><a href="locations.html">Google Map Locations</a></li>
                                                     <li><a href="404.html">404</a></li>
                                                     <li><a href="contact.html">Contact</a></li>
                                                     <li><a href="coming-soon.html">Coming Soon</a></li>
                                                 </ul>
                                             </li>
                                             <li><a href="#">Shop Pages</a>

                                             </li>
                                             <li><a href="#">Blog Pages</a>

                                             </li>
                                         </ul>
                                     </li>
                                     <li class="menu-icon">
                                         <a href="#">الفئات</a>
                                         <ul>
                                             @php
                                             $tagCount = count($alltags);
                                             $tagsToShow = min(4, $tagCount);
                                             @endphp

                                             @foreach ($alltags->take($tagsToShow) as $tags)
                                             @if (count($tags->posts) > 0)
                                             <a href="{{ route('showtag', ['tag' => $tags->id]) }}" style="    display: block;
    width: 100%;
    text-align: right;
    padding-right: 20px;">{{ $tags->TITLE }}</a>

                                             @endif
                                             @endforeach

                                             @if ($tagCount > 4)
                                             <li>
                                                 <a href="#">Other Pages <span class="float-right">>></span></a>
                                                 <ul>
                                                     @foreach ($alltags->slice(4) as $tags)
                                                     @if (count($tags->posts) > 0)
                                                     <a href="{{ route('showtag', ['tag' => $tags->id]) }}">{{ $tags->TITLE }}</a>

                                                     @endif
                                                     @endforeach
                                                     <!-- Add other pages here if needed -->
                                                 </ul>
                                             </li>
                                             @endif
                                         </ul>
                                     </li>



                                     <li><a href="{{ route('home') }}">الصفحة الرئيسيه</a></li>

                                 </ul>
                             </div>
                         </nav>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- header-bottom-area end -->
 </header>
 <!-- HEADER AREA END -->

 <!-- Utilize Mobile Menu Start -->
 <div id="ltn__utilize-mobile-menu" class="ltn__utilize ltn__utilize-mobile-menu">
     <div class="ltn__utilize-menu-inner ltn__scrollbar">
         <div class="ltn__utilize-menu-head">

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
                 <li><a href="#">Home</a>
                     <ul class="sub-menu">
                         <li><a href="index.html">Home Style - 01</a></li>
                         <li><a href="index-2.html">Home Style - 02</a></li>
                         <li><a href="index-3.html">Home Style - 03</a></li>
                         <li><a href="index-4.html">Home Style - 04</a></li>
                     </ul>
                 </li>
                 <li><a href="about.html">About Us</a></li>
                 <li><a href="#">Shop</a>
                     <ul class="sub-menu">
                         <li><a href="shop.html">Shop</a></li>
                         <li><a href="shop-grid.html">Shop Grid</a></li>
                         <li><a href="shop-left-sidebar.html">Shop Left sidebar</a></li>
                         <li><a href="shop-right-sidebar.html">Shop right sidebar</a></li>
                         <li><a href="product-details.html">Shop details </a></li>
                         <li><a href="cart.html">Cart</a></li>
                         <li><a href="wishlist.html">Wishlist</a></li>
                         <li><a href="checkout.html">Checkout</a></li>
                         <li><a href="order-tracking.html">Order Tracking</a></li>
                         <li><a href="account.html">My Account</a></li>
                         <li><a href="login.html">Sign in</a></li>
                         <li><a href="register.html">Register</a></li>
                     </ul>
                 </li>
                 <li><a href="#">News</a>
                     <ul class="sub-menu">
                         <li><a href="blog.html">News</a></li>
                         <li><a href="blog-grid.html">News Grid</a></li>
                         <li><a href="blog-left-sidebar.html">News Left sidebar</a></li>
                         <li><a href="blog-right-sidebar.html">News Right sidebar</a></li>
                         <li><a href="blog-details.html">News details</a></li>
                     </ul>
                 </li>
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
                 <li><a href="contact.html">Contact</a></li>
             </ul>
         </div>
         <div class="ltn__utilize-buttons ltn__utilize-buttons-2">
             <ul>
                 <li>
                     <a href="account.html" title="My Account">
                         <span class="utilize-btn-icon">
                             <i class="icon-user"></i>
                         </span>
                         My Account
                     </a>
                 </li>
                 <li>
                     <a href="wishlist.html" title="Wishlist">
                         <span class="utilize-btn-icon">
                             <i class="icon-heart"></i>
                             <sup>3</sup>
                         </span>
                         Wishlist
                     </a>
                 </li>
                 <li>
                     <a href="cart.html" title="Shoping Cart">
                         <span class="utilize-btn-icon">
                             <i class="icon-handbag"></i>
                             <sup>5</sup>
                         </span>
                         Shoping Cart
                     </a>
                 </li>
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
 <!-- Utilize Mobile Menu End -->

 <body>