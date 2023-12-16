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
                        <a class="nav-link text-dark" href="https://diagnostics.mannosarthi.com/home">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('admin.login') }}">Login</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="container mb-5">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header p-3">
                        <h3>Schedule</h3>
                    </div>
                    <div class="card-body p-3">
                        <table class="table table-striped">
                            <tr>
                                <td>Name</td>
                                <td>{{$text?->name}}</td>
                            </tr>
                            <tr>
                                <td>Code</td>
                                <td>#{{$text?->code}}</td>
                            </tr>
                            <tr>
                                <td>Location</td>
                                <td>{{$text?->location}}</td>
                            </tr>
                            <tr>
                                <td>Category</td>
                                <td>{{$text?->category}}</td>
                            </tr>
                            <tr>
                                <td>Schedule</td>
                                <td>{{$text?->schedule}}</td>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td>{{$text?->price}}</td>
                            </tr>
                            <tr>
                                <td>Reportedon</td>
                                <td>{{$text?->reportedon}}</td>
                            </tr>
                            <tr>
                                <td>Guideline</td>
                                <td>{{$text?->simple_guideline}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header p-3">
                        <h3>Fill Form</h3>
                    </div>
                    <div class="card-body p-5">
                        <form action="{{ route('book-test.store') }}" method="post">
                            @csrf
                            <fieldset>
                                <input type="hidden" name="text_id" value="{{ $text?->id }}">
                                <div class="mb-3">
                                    <label for="disabledTextInput" class="form-label fw-bold mb-0">Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        class="form-control" placeholder="Enter name">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="disabledTextInput" class="form-label fw-bold mb-0">Email</label>
                                    <input type="text" name="email" value="{{ old('email') }}"
                                        class="form-control" placeholder="Enter email">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="disabledTextInput" class="form-label fw-bold mb-0">Phone</label>
                                    <input type="text" name="phone" value="{{ old('phone') }}"
                                        class="form-control" placeholder="Enter phone">
                                    @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="disabledTextInput" class="form-label fw-bold mb-0">Address</label>
                                    <textarea name="address" class="form-control" rows="4">{{ old('address') }}</textarea>
                                    @error('address')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
