<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from templatemo.com/templates/templatemo_556_catalog_z/photo-detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Apr 2024 15:54:02 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1337 Share</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/templatemo-style.css') }}">
<!--
    
TemplateMo 556 Catalog-Z

https://templatemo.com/tm-556-catalog-z

-->
</head>
<body>
    <!-- Page Loader -->
    <div id="loader-wrapper">
        <div id="loader"></div>

        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>

    </div>

    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="img/hero.jpg">
        <form class="d-flex tm-search-form">
            <input class="form-control tm-search-input" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success tm-search-btn" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>

    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row mb-4">
          <h2 class="col-12 tm-text-primary">{{ $image->title }}</h2> </div>
        <div class="row tm-mb-90">
          <div class="col-xl-8 col-lg-7 col-md-6 col-sm-12">
            <img src="{{ asset('public/images/' . $image->image) }}" alt="{{ $image->title }}" class="img-fluid">
          </div>
          <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
            <div class="tm-bg-gray tm-video-details">
              <p class="mb-4">
                Please support us by making <a href="https://paypal.me/templatemo" target="_parent" rel="sponsored">a PayPal donation</a>. Nam ex nibh, efficitur eget libero ut, placerat aliquet justo. Cras nec varius leo.
              </p>
              <div class="text-center mb-5">
                <a href="#" class="btn btn-primary tm-btn-big">Download</a>
              </div>
              <div class="mb-4 d-flex flex-wrap">
                {{-- <div class="mr-4 mb-2">
                  <span class="tm-text-gray-dark">Dimension: </span><span class="tm-text-primary">{{ $image->path ? explode('x', $image->path) : ['N/A', 'N/A'] }}</span> </div>
                <div class="mr-4 mb-2"> --}}
                  <span class="tm-text-gray-dark">Format: </span><span class="tm-text-primary">{{ pathinfo($image->image, PATHINFO_EXTENSION) }}</span>
                </div>
              </div>
              <div class="mb-4">
                <h3 class="tm-text-gray-dark mb-3">License</h3>
                <p>Free for both personal and commercial use. No need to pay anything. No need to make any attribution.</p>
              </div>
              <div>
                <h3 class="tm-text-gray-dark mb-3">Tags</h3>
                @if ($image->hashtag) @foreach(explode(' ', $image->hashtag) as $tag)
                    <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">{{ $tag }}</a>
                  @endforeach
                @else
                  <p>No tags.</p>
                @endif
              </div>
            </div>
          </div>
        </div>
        <div class="row mb-4">
          <h2 class="col-12 tm-text-primary">
            Related Photos
          </h2>
        </div>
        </div>
      
    <footer class="tm-bg-gray pt-5 pb-3 tm-text-gray tm-footer">
        <div class="container-fluid tm-container-small">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12 px-5 mb-5">
                    <h3 class="tm-text-primary mb-4 tm-footer-title">About Catalog-Z</h3>
                    <p>Integer ipsum odio, pharetra ac massa ac, pretium facilisis nibh. Donec lobortis consectetur molestie. Nullam nec diam dolor. Fusce quis viverra nunc, sit amet varius sapien.</p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 px-5 mb-5">
                    <h3 class="tm-text-primary mb-4 tm-footer-title">Our Links</h3>
                    <ul class="tm-footer-links pl-0">
                        <li><a href="#">Advertise</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Our Company</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 px-5 mb-5">
                    <ul class="tm-social-links d-flex justify-content-end pl-0 mb-5">
                        <li class="mb-2"><a href="https://facebook.com/"><i class="fab fa-facebook"></i></a></li>
                        <li class="mb-2"><a href="https://twitter.com/"><i class="fab fa-twitter"></i></a></li>
                        <li class="mb-2"><a href="https://instagram.com/"><i class="fab fa-instagram"></i></a></li>
                        <li class="mb-2"><a href="https://pinterest.com/"><i class="fab fa-pinterest"></i></a></li>
                    </ul>
                    <a href="#" class="tm-text-gray text-right d-block mb-2">Terms of Use</a>
                    <a href="#" class="tm-text-gray text-right d-block">Privacy Policy</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-7 col-12 px-5 mb-3">
                    Copyright 2020 Catalog-Z Company. All rights reserved.
                </div>
                <div class="col-lg-4 col-md-5 col-12 px-5 text-right">
                    Designed by <a href="https://templatemo.com/" class="tm-text-gray" rel="sponsored" target="_parent">TemplateMo</a>
                </div>
            </div>
        </div>
    </footer>
    
    <script src="js/plugins.js"></script>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });
    </script>
</body>

<!-- Mirrored from templatemo.com/templates/templatemo_556_catalog_z/photo-detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Apr 2024 15:54:04 GMT -->
</html>