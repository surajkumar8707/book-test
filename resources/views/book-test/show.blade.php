@extends('layouts.app')

@section('content')
    <div class="content-wrapper" id="assembly-line-index">
        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card mt-5">

                            {{-- card header start --}}
                            <div class="card-header">
                                <span class="text-bold text-lg">Booked Test</span>
                                <div class="float-right">
                                    <a href="{{ route('admin.book-test.index') }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-arrow-left"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="card">
                                            <div class="card-header p-3">
                                                <h3>Test</h3>
                                            </div>
                                            <div class="card-body p-3">
                                                <table class="table table-striped">
                                                    <tbody><tr>
                                                        <td>Name</td>
                                                        <td>{{ $book_test?->text->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Code</td>
                                                        <td>{{ $book_test?->text->code }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Location</td>
                                                        <td>{{ $book_test?->text->location }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Category</td>
                                                        <td>{{ $book_test?->text->category }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Schedule</td>
                                                        <td>{{ $book_test?->text->schedule }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Price</td>
                                                        <td>{{ $book_test?->text->price }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Reportedon</td>
                                                        <td>{{ $book_test?->text->reportedon }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Guideline</td>
                                                        <td>{{ $book_test?->text->simple_guideline }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Created Date</td>
                                                        <td>{{ date('d M Y', strtotime($book_test?->text->created_at)) }}</td>
                                                    </tr>
                                                </tbody></table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="card">
                                            <div class="card-header p-3">
                                                <h3>User Detail</h3>
                                            </div>
                                            <div class="card-body p-3">
                                                <table class="table table-striped">
                                                    <tbody><tr>
                                                        <td>Name</td>
                                                        <td>{{ $book_test->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email</td>
                                                        <td>{{ $book_test->email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Phone</td>
                                                        <td>{{ $book_test->phone }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Address</td>
                                                        <td>{{ $book_test->address }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Bokking Date</td>
                                                        <td>{{ date('d M Y', strtotime($book_test->created_at)) }}</td>
                                                    </tr>
                                                </tbody></table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
