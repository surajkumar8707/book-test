<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> --}}
    <title>Your Landing Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #a333c6;
            color: #ffffff;
            padding: 32px 0;
            text-align: center;
        }

        .navbar-toggler-icon-dark {
            background-color: #343a40;
        }

        .navbar-toggler-dark {
            border-color: #343a40;
        }

        .features {
            padding: 50px 0;
            text-align: center;
        }

        .feature-item {
            margin-bottom: 30px;
        }

        .cta {
            background-color: #007bff;
            color: #ffffff;
            padding: 70px 0;
            text-align: center;
        }

        /* Add your custom styles here */
        .swiper-container {
            width: 100%;
            margin: auto;
        }

        .swiper-slide {
            text-align: center;
            box-sizing: border-box;
        }

        .healthCard {
            border: 1px solid #ccc;
            border-radius: 10px;
            overflow: hidden;
            /* margin: 10px; */
        }

        .card-content {
            padding: 20px;
            height: 250px;
        }

        .offerHeight {
            display: flex;
            justify-content: flex-end;
        }

        .offLabel {
            background-color: #007bff;
            color: #fff;
            padding: 5px;
            border-radius: 5px;
        }

        .card-title {
            margin-top: 10px;
        }

        .card-subtitle {
            color: #007bff;
        }

        .search-list-height {
            margin-top: 10px;
        }

        .compareSecWrap {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 10px;
        }

        .compareSec {
            background-color: #28a745;
            color: #fff;
            padding: 5px;
            border-radius: 5px;
            cursor: pointer;
        }

        .cardBtnWrap {
            margin-top: 10px;
        }

        .swiper-button-next,
        .swiper-button-prev {
            background-color: #007bff;
            color: #fff;
            border-radius: 50%;
            width: 40px;
            height: 40px;
        }

        .swiper-button-next {
            right: 10px;
        }

        .swiper-button-prev {
            left: 10px;
        }
        .swiper-slide {
            overflow: hidden;
        }

        .card-content {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease-in-out;
        }

        .card-content:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        /* start new navbar style */
        .navbar {
            background-color: #fff;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .navbar .logo {
            float: left;
        }

        .navbar .logo img {
            height: 50px; /* Adjust the height as needed */
            padding: 10px;
        }

        .navbar .nav-links {
            float: right;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .navbar .nav-links li {
            display: inline-block;
            margin-right: 20px;
        }

        .navbar .nav-links a {
            color: #000;
            text-decoration: none;
            font-size: 16px;
            /* padding: 15px; */
            display: inline-block;
        }

        .navbar .nav-links a.active {
            color: #ffd700; /* Set the color for the active link */
        }

        .footer {
            background-color: #e4eeee;
            color: #333;
            text-align: center;
            padding: 10px;
            /* position: sticky; */
            bottom: 0;
            width: 100%;
        }
        .footer {
            background-color: #e4eeee;
            color: #000;
            text-align: center;
            padding: 40px 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: flex-start;
        }

        .footer-quick-links,
        .footer-contact {
            flex: 1;
            min-width: 200px;
            margin-bottom: 20px;
        }

        .footer-quick-links h4,
        .footer-contact h4 {
            color: #ffd700;
        }

        .footer-quick-links ul {
            list-style: none;
            padding: 0;
        }

        .footer-quick-links ul li {
            margin-bottom: 10px;
        }

        .footer-links a,
        .footer-quick-links a,
        .footer-contact p {
            color: #000;
            text-decoration: none;
        }

        .footer-links a:hover,
        .footer-quick-links a:hover {
            color: #ffd700; /* Change the color on hover */
        }

        .copyright {
            background-color: #e4eeee;
            color: #000;
            text-align: center;
            padding: 10px 0;
            order: 3;
        }

        @media screen and (max-width: 600px) {
            .navbar .logo {
                text-align: center;
                width: 100%;
                float: none;
            }

            .navbar .nav-links {
                float: flex !important;
                text-align: center;
                width: 100%;
                padding-top: 5px;
            }

            .navbar .nav-links li {
                display: block;
                margin: 0;
                margin-bottom: 10px;
            }

            .footer {
                flex-direction: column;
                align-items: center;
            }

            .footer-quick-links,
            .footer-contact {
                width: 100%;
                text-align: center;
            }

            .footer-quick-links,
            .footer-contact {
                margin-bottom: 20px;
            }
        }

        /* Add more styles as needed */
    </style>
</head>

<body>

    <!-- Header Section -->
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="text-center">
                        <div class="text-light">24X7 HELPLINE: +918979317417|rayal1981@gmail.com</div>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>

    {{-- <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('') }}">
                <img src="https://diagnostics.mannosarthi.com/wp-content/uploads/2023/12/cropped-logo12-4.jpeg"
                    alt="Logo" class="img-fluid" style="width: 30%;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ url('') }}">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('admin.login') }}">Login</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav> --}}

    <nav class="navbar">
        <div class="logo">
            <img src="https://diagnostics.mannosarthi.com/wp-content/uploads/2023/12/cropped-logo12-4.jpeg" alt="Logo">
        </div>
        <ul class="nav-links active">
            <li><a class="active" href="{{ url('') }}">Home</a></li>
            <li><a href="{{ route('admin.login') }}">Login</a></li>
        </ul>
    </nav>


    <!-- Swiper -->
    <div class="swiper-container" style="overflow: hidden;">
        <div class="swiper-wrapper">
            <!-- Card 1 -->
            @foreach ($texts as $text)
                {{-- @dd($text->toArray()) --}}
                <div class="swiper-slide healthCard-item">
                    <div class="healthCard">
                        <div class="card-content">
                            {{-- <div class="offerHeight"><small class="offLabel">3% OFF</small></div> --}}
                            <div class="card-title h5">{{ $text?->name }}</div>
                            <div class="card-title">{{ $text?->simple_guideline }}</div>
                            <div class="mb-2 card-subtitle h6">₹{{ $text?->price }} <span
                                    class="text-muted">₹{{ $text?->price }}</span></div>
                            {{-- <div class="search-list-height text-center">
                <div class="compareSecWrap">
                  <div class="compareSec">Add to compare</div>
                </div>
              </div> --}}
                            <p class="card-text"></p>
                            <div class="cardBtnWrap">
                                <a href="{{ route('book-test.create', [base64_encode($text?->id)]) }}"
                                    class="rounded-pill mr-2 btn btn-outline-info">Book Test</a>
                                {{-- <button type="button" class="rounded-pill mr-2 btn btn-danger">Add To Cart</button> --}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach



            <!-- Add more cards as needed -->
        </div>
        <!-- Add Pagination -->
        {{-- <div class="swiper-pagination"></div> --}}
        <!-- Add Navigation -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

    <!-- Swiper JS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Your custom script to initialize Swiper -->
    <script>
        var swiper = new Swiper('.swiper-container', {
    // slidesPerView: 3, // Set the default number of slides you want to display
    spaceBetween: 20,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    breakpoints: {
        // When window width is >= 768px
        768: {
            slidesPerView: 2,
            spaceBetween: 15,
        },
        // When window width is >= 992px
        992: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        // When window width is >= 1200px
        1200: {
            slidesPerView: 3,
            spaceBetween: 30,
        },
    },
});
    </script>
    <script>
        // Set the options that I want
        toastr.options = {
            "closeButton": true,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>
    @if (Session::has('success'))
        <script>
            toastr.success('{{ session('success') }}', 'Success Message')
        </script>
    @endif

    @if (Session::has('error'))
        <script>
            toastr.error('{{ session('error') }}', 'Error Message')
        </script>
    @endif

    <!-- Footer Section -->
    <footer class="footer mt-5">
        <div class="footer-quick-links">
            <h4>Quick Links</h4>
            <ul>
                <li><a href="{{ url('') }}">Home</a></li>
                <li><a href="{{ route('admin.login') }}">Login</a></li>
            </ul>
        </div>

        <div class="footer-contact">
            <h4>Get in Touch</h4>
            <p>Email: krishnadianostics@gmail.com</p>
            <p>Phone: 1234567890</p>
            <p>Address: 11/1 Lane No. 1, IInd Floor, Ananda Hospital Campus, Shastri Nagar, Dehradun Uttarakhand, India - 248001</p>
        </div>

        <div class="copyright" style="width: 100%; margin:0px;padding:0px">
        <p>&copy; 2021 Krishna | Design & Developed by gaurav tiwari.</p>
    </div>
    </footer>

</body>

</html>
