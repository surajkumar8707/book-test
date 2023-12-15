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
      margin: 10px;
    }

    .card-content {
      padding: 20px;
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

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="https://diagnostics.mannosarthi.com">
            <img src="https://diagnostics.mannosarthi.com/wp-content/uploads/2023/12/cropped-logo12-4.jpeg" alt="Logo" class="img-fluid" style="width: 30%;">
          </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link text-dark" href="https://diagnostics.mannosarthi.com/home">Home</a>
            </li>

            <li class="nav-item">
              <a class="nav-link text-dark" href="{{ route('admin.login') }}">Login</a>
            </li>

          </ul>
      </div>
    </div>
  </nav>


  <!-- Swiper -->
  <div class="swiper-container">
    <div class="swiper-wrapper">
      <!-- Card 1 -->
      <div class="swiper-slide">
        <div class="healthCard">
          <div class="card-content">
            <div class="offerHeight"><small class="offLabel">3% OFF</small></div>
            <div class="card-title h5">COMPLETE CARE KIDNEY</div>
            <div class="mb-2 card-subtitle h6">₹2349 <span class="text-muted">₹2410</span></div>
            <div class="search-list-height text-center">
              <div class="compareSecWrap">
                <div class="compareSec">Add to compare</div>
              </div>
            </div>
            <p class="card-text"></p>
            <div class="cardBtnWrap">
              <button type="button" class="rounded-pill mr-2 btn btn-outline-info">Know More</button>
              <button type="button" class="rounded-pill mr-2 btn btn-danger">Add To Cart</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="swiper-slide">
        <div class="healthCard">
          <div class="card-content">
            <div class="offerHeight"><small class="offLabel">33% OFF</small></div>
            <div class="card-title h5">COMPLETE CARE DIABETES</div>
            <div class="mb-2 card-subtitle h6">₹999 <span class="text-muted">₹1490</span></div>
            <div class="search-list-height text-center">
              <div class="compareSecWrap">
                <div class="compareSec">Add to compare</div>
              </div>
            </div>
            <p class="card-text"></p>
            <div class="cardBtnWrap">
              <button type="button" class="rounded-pill mr-2 btn btn-outline-info">Know More</button>
              <button type="button" class="rounded-pill mr-2 btn btn-danger">Add To Cart</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Add more cards as needed -->
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
    <!-- Add Navigation -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>

  <!-- Swiper JS -->
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

  <!-- Your custom script to initialize Swiper -->
  <script>
    var swiper = new Swiper('.swiper-container', {
      slidesPerView: 1,
      spaceBetween: 10,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
    });
  </script>

</body>
</html>
