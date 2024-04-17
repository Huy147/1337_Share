<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<!-- Mirrored from templatemo.com/templates/templatemo_556_catalog_z/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Apr 2024 15:53:15 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1337 Share</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
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
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <i class="fas fa-film mr-2"></i>
                1337 Share
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link nav-link-1 active" aria-current="page" href="/">Photos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-2" href="/videos">Videos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-3" href="/images">Add</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-4" href="/contact">Contact</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link nav-link-4" href="/login">Login</a>
                    </li> --}}
                    <li class="nav-item">
                        @auth
                            <a href="{{ url('/profile') }}" class="nav-link nav-link-4">Profile
                            </a>
                        <li class="nav-item">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                            <a href="#" id="logout-btn" class="nav-link nav-link-4">Logout</a>
                        </li>
                    @else
                        <a href="{{ route('login') }}" class="nav-link nav-link-4">Log in
                        </a>
                        <li class="nav-item">
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="nav-link nav-link-4">Register
                                </a>
                            @endif
                        </li>
                    @endauth
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll"
        data-image-src="img/hero.jpg">
        <form action="{{ route('index') }}" method="GET" class="d-flex position-absolute tm-search-form">
            <div class="input-group mb-3">
                <input type="text" name="keyword" value="{{ request('keyword') }}"
                    class="form-control tm-search-input" placeholder="Search by title">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-outline-success tm-search-btn"> <i
                            class="fas fa-search"></i></button>
                </div>
            </div>
        </form>

    </div>

    <div class="container-fluid tm-container-content tm-mt-60">
        {{-- <div class="row mb-4">
            <h2 class="col-6 tm-text-primary">
                Latest Photos
            </h2>
            <div class="col-6 d-flex justify-content-end align-items-center">
                <form action="#" class="tm-text-primary">
                    Page <input type="text" value="1" size="1" class="tm-input-paging tm-text-primary"> of
                    200
                </form>
            </div>
        </div> --}}
        <div class="row tm-mb-90 tm-gallery">
            @if ($images->isEmpty())
                <div class="col-12">
                    <p class="text-center">There are no photos matching the search keyword</p>
                </div>
            @else
                @foreach ($images as $image)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                        <figure class="effect-ming tm-video-item">
                            <img src="{{ asset('storage/uploadimages/' . $image->image) }}" alt="{{ $image->title }}"
                                class="img-fluid">
                            <figcaption class="d-flex align-items-center justify-content-center">
                                <h2>{{ $image->title }}</h2>
                                <a href="/{{ $image->id }}">View more</a>
                            </figcaption>
                        </figure>
                        <div class="d-flex justify-content-between tm-text-gray">
                            <span class="tm-text-gray-light">{{ $image->created_at->format('d M Y') }}</span>
                            <!-- Phần tym -->
                            <style>
                                /* CSS cho trạng thái hover */
                                .heart-icon:hover path {
                                    fill: red;
                                }

                                /* CSS cho trạng thái clicked */
                                .heart-icon.clicked path {
                                    fill: red;
                                }
                            </style>

                            <svg class="heart-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                fill="currentColor" class="bi bi-heart" data-image-id="{{ $image->id }}">
                                <path
                                    d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.920 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.090.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
                            </svg>
                            <span>{{ $image->viewed }} views</span> <!-- Hiển thị số lượt xem -->
                        </div>
                    </div>
                @endforeach
            @endif
        </div>



        <!-- Phần phân trang -->
        <div class="row tm-mb-90">
            <div class="col-12 d-flex justify-content-between align-items-center tm-paging-col">
                <!-- Nút trang trước -->
                @if ($images->previousPageUrl())
                    <a href="{{ $images->previousPageUrl() }}" class="btn btn-primary tm-btn-prev mb-2">Previous</a>
                @else
                    <a href="#" class="btn btn-primary tm-btn-prev mb-2 disabled">Previous</a>
                @endif

                <!-- Hiển thị số trang -->
                <div class="tm-paging d-flex">
                    @for ($i = 1; $i <= $images->lastPage(); $i++)
                        <a href="{{ $images->url($i) }}"
                            class="tm-paging-link {{ $images->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a>
                    @endfor
                </div>

                <!-- Nút trang kế tiếp -->
                @if ($images->nextPageUrl())
                    <a href="{{ $images->nextPageUrl() }}" class="btn btn-primary tm-btn-next">Next Page</a>
                @else
                    <a href="#" class="btn btn-primary tm-btn-next disabled">Next Page</a>
                @endif
            </div>
        </div>
    </div> <!-- container-fluid, tm-container-content -->

    <footer class="tm-bg-gray pt-5 pb-3 tm-text-gray tm-footer">
        <div class="container-fluid tm-container-small">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12 px-5 mb-5">
                    <h3 class="tm-text-primary mb-4 tm-footer-title">About Catalog-Z</h3>
                    <p>Catalog-Z is free <a rel="sponsored" href="https://v5.getbootstrap.com/">Bootstrap 5</a> Alpha
                        2
                        HTML Template for video and photo websites. You can freely use this TemplateMo layout for a
                        front-end integration with any kind of CMS website.</p>
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
                    Designed by <a href="https://templatemo.com/" class="tm-text-gray" rel="sponsored"
                        target="_parent">TemplateMo</a>
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
    <script>
        // Sự kiện khi nhấn vào nút logout
        document.getElementById('logout-btn').addEventListener('click', function(event) {
            event.preventDefault(); // Ngăn chặn hành động mặc định của nút
            document.getElementById('logout-form').submit(); // Gửi request logout
        });
    </script>
    <script>
        // Sự kiện khi click vào trái tym
        $('.heart-icon').on('click', function() {
            var heartIcon = $(this); // Lưu tham chiếu đến đối tượng .heart-icon
            var imageId = heartIcon.data('image-id');
            var clicked = heartIcon.hasClass('clicked'); // Kiểm tra xem đã được click hay chưa
            $.ajax({
                url: '/images/' + imageId + '/like',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (!clicked) {
                        heartIcon.addClass('clicked'); // Thêm class clicked nếu chưa có
                        heartIcon.find('path').css('fill', 'red'); // Thay đổi màu sắc khi click
                    } else {
                        heartIcon.removeClass('clicked'); // Xóa class clicked nếu đã có
                        heartIcon.find('path').css('fill', ''); // Xóa màu sắc khi hủy click
                    }
                    // Nếu cần thực hiện thêm bất kỳ thao tác nào sau khi like, bạn có thể thêm code ở đây
                    // location.reload(); // Load lại trang sau khi like để cập nhật số lượt like (nếu cần)
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
    </script>

</body>

<!-- Mirrored from templatemo.com/templates/templatemo_556_catalog_z/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Apr 2024 15:53:38 GMT -->

</html>
