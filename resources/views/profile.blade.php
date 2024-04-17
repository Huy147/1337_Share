<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<!-- Mirrored from templatemo.com/templates/templatemo_556_catalog_z/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Apr 2024 15:53:15 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
@vite(['resources/css/app.css', 'resources/js/app.js'])

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
                        <a class="nav-link nav-link-1 active" href="/">Photos</a>
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
                            <a href="{{ url('/profile') }}active" aria-current="page" class="nav-link nav-link-4">Profile
                            </a>
                        @else
                            <a href="{{ route('login') }} " class="nav-link nav-link-4">Log in
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="nav-link nav-link-4">Register
                                </a>
                            @endif
                        @endauth
                    </li>

                </ul>
            </div>
        </div>
    </nav>

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
        <div class="col-md-12">
            <h2>{{ $user->name }}'s Profile</h2>
            <p>Email: {{ $user->email }}</p>
            <!-- Hiển thị thông tin khác về người dùng nếu cần -->
        </div>
        <h2>Collection</h2>
        <div class="row tm-mb-90 tm-gallery">
            @if ($images->isEmpty())
                <div class="col-12">
                    <p class="text-center">No photos were created</p>
                </div>
            @else
                <!-- Trong blade template của bạn -->
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
                            <form action="{{ route('delete', ['id' => $image->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
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


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <livewire:profile.update-profile-information-form />
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <livewire:profile.update-password-form />
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <livewire:profile.delete-user-form />
                </div>
            </div>
        </div>
    </div>

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
    $(document).ready(function() {
        $('.delete-image-btn').click(function(e) {
            e.preventDefault();
            var imageId = $(this).data('image-id');
            // Hiển thị hộp thoại xác nhận
            if (confirm('Are you sure you want to delete this image?')) {
                $.ajax({
                    url: '/images/' + imageId,
                    type: 'DELETE',
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        // Xử lý sau khi ảnh được xóa thành công
                        console.log(data);
                        // Cập nhật giao diện người dùng tại đây (nếu cần)
                    },
                    error: function(err) {
                        console.error(err);
                    }
                });
            }
        });
    });
</script>



</body>

<!-- Mirrored from templatemo.com/templates/templatemo_556_catalog_z/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Apr 2024 15:53:38 GMT -->

</html>
