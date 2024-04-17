<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from templatemo.com/templates/templatemo_556_catalog_z/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Apr 2024 15:54:01 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalog-Z About page</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
</head>
<!--
    
TemplateMo 556 Catalog-Z

https://templatemo.com/tm-556-catalog-z

-->

<style>
    .container-fluid {
        padding: 0;
    }

    .container {
        padding: 0 15px;
    }

    .card {
        border-radius: 15px;
    }

    .custom-file-upload {
        background: #ffffff;
        border: 2px solid #007bff;
        color: #007bff;
        border-radius: 10px;
        padding: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 200px;
        font-weight: bold;
        font-size: 1.2rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        cursor: pointer;
    }

    .custom-file-upload:hover {
        background: #f8f9fa;
    }

    .form-control,
    .btn-primary {
        border-radius: 5px;
    }

    .btn-primary {
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    .tm-text-right {
        text-align: right;
    }

    .tm-mt-60 {
        margin-top: 60px;
    }

    #imagePreview {
        max-width: 100%;
        max-height: 400px;
        margin-top: 10px;
    }

    /* Hiệu ứng khi hover */
    .custom-file-upload:hover,
    .btn-primary:hover {
        transform: translateY(-3px);
        transition: transform 0.3s ease;
    }

    /* Hiệu ứng shadow */
    .card,
    .custom-file-upload,
    .btn-primary {
        transition: box-shadow 0.3s ease;
    }

    .card:hover,
    .custom-file-upload:hover,
    .btn-primary:hover {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .form-container {
        display: flex;
        justify-content: flex-start;
        /* Căn các phần tử về bên trái */
        align-items: start;
        /* Căn các phần tử từ trên xuống dưới */
    }

    .left-panel {
        flex: 1;
        /* Cho phép .left-panel chiếm đầy không gian có thể */
        margin-right: 20px;
        /* Thêm khoảng cách giữa .left-panel và phần tử tiếp theo */
    }

    .right-panel {
        flex: 2;
        /* Cho phép .right-panel chiếm gấp đôi không gian của .left-panel */
    }
</style>
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
                        <a class="nav-link nav-link-1 " href="/">Photos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-2" href="/videos">Videos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-3 active" aria-current="page" href="/images">Add</a>
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
        data-image-src="img/hero.jpg"></div>

    <div class="container-fluid tm-mt-60">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10">
                    <div class="card borde border-0 shadow-lg my-4">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form id="contact-form" action="{{ route('images') }}" method="POST"
                            class="tm-contact-form mx-auto" enctype="multipart/form-data">
                            @csrf
                            <div class="left-panel">
                                <input type="file" name="fileToUpload" id="fileToUpload" style="display: none;"
                                    required onchange="displayImage(this)" />
                                <label for="fileToUpload" class="custom-file-upload" id="uploadLabel"
                                    style="position: relative;left: -15vw;top: 26vh;">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    Chọn một tệp hoặc kéo và thả tệp ở đây
                                </label>
                                <img id="imagePreview" src="#" alt="Image Preview"
                                    style="display: none; max-width: 100%; max-height: 400px; margin-top: 10px;    position: relative;left: -25vh;top: 13vw;" />
                            </div>
                            <script>
                                function displayImage(input) {
                                    if (input.files && input.files[0]) {
                                        var reader = new FileReader();

                                        reader.onload = function(e) {
                                            // Hiển thị ảnh xem trước
                                            var imagePreview = document.getElementById('imagePreview');
                                            var uploadLabel = document.getElementById('uploadLabel');

                                            imagePreview.src = e.target.result;
                                            imagePreview.style.display = 'block'; // Hiện ảnh

                                            // Ẩn label và input
                                            uploadLabel.style.display = 'none';
                                            input.style.display = 'none';
                                        };

                                        reader.readAsDataURL(input.files[0]);
                                    }
                                }
                            </script>
                            <div class="right-panel">
                                <div class="form-group" style="position: relative;left: 15vw;top: -14vh;">
                                    <input type="text" name="title" class="form-control rounded-0"
                                        placeholder="Title" required />
                                </div>

                                <div class="form-group" style="position: relative;left: 15vw;top: -10vh;">
                                    <select class="form-control" id="hashtag-select" name="hashtag">
                                        <option value="">Hashtag (Optional)</option>
                                        <option value="sales">Sales &amp; Marketing</option>
                                        <option value="creative">Natrue</option>
                                        <option value="uiux">AI</option>
                                        <option value="uiux">Family</option>
                                        <option value="uiux">Person</option>
                                        <option value="uiux">Weapons</option>
                                        <option value="uiux">Animal</option>
                                        <option value="uiux">Book</option>
                                        <option value="uiux">Food</option>
                                        <option value="uiux">Building</option>
                                        <option value="uiux"></option>
                                    </select>
                                </div>

                                <div class="form-group" style="position: relative;left: 15vw;top: -6vh;">
                                    <textarea rows="8" name="description" class="form-control rounded-0" placeholder="Description" required></textarea>
                                </div>

                                <div class="form-group" style="position: relative;left: 15vw;top: -4vh;">
                                    <input type="text" name="path" class="form-control rounded-0"
                                        placeholder="Path (Optional)" />
                                </div>

                                <div class="form-group tm-text-right"
                                    style="position: relative;left: 15vh;top: -2vw;">
                                    <button type="submit" class="btn btn-primary">Create Image</button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid, tm-container-content -->

    <footer class="tm-bg-gray pt-5 pb-3 tm-text-gray tm-footer">
        <div class="container-fluid tm-container-small">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12 px-5 mb-5">
                    <h3 class="tm-text-primary mb-4 tm-footer-title">About Catalog-Z</h3>
                    <p>Catalog-Z is free Bootstrap 5 Alpha 2 HTML Template for video and photo websites. You can freely
                        use this TemplateMo layout for a front-end integration with any kind of CMS website.</p>
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
</body>

<!-- Mirrored from templatemo.com/templates/templatemo_556_catalog_z/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Apr 2024 15:54:02 GMT -->

</html>
