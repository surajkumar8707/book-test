@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card mt-5">
                            <div class="card-header">
                                <span class="text-bold text-lg">Create Text</span>
                                <div class="float-right">
                                    <a href="{{ route('admin.text.index') }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-arrow-left"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger danger-delay-fadeout">{{ $error }}</div>
                                    @endforeach
                                @endif
                                <form action="{{ route('admin.text.store') }}" method="post" enctype="multipart/form-data"
                                    class="px-md-5">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="" class="form-label mb-0">Code</label>
                                        <input type="text" class="form-control" name="code"
                                            placeholder="Enter text code">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label mb-0">Name</label>
                                        <input type="text" class="form-control" name="name"
                                            placeholder="Enter text name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label mb-0">Location</label>
                                        <input type="text" class="form-control" name="location"
                                            placeholder="Enter text location">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label mb-0">Category</label>
                                        <input type="text" class="form-control" name="category"
                                            placeholder="Enter text category">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label mb-0">Schedule</label>
                                        <input type="text" class="form-control" name="schedule"
                                            placeholder="Enter text schedule">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label mb-0">Price</label>
                                        <input type="text" class="form-control" name="price"
                                            placeholder="Enter text price">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label mb-0">Reportedon</label>
                                        <input type="text" class="form-control" name="reportedon"
                                            placeholder="Enter text reportedon">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label mb-0">Simple Description</label>
                                        <input type="text" class="form-control" name="simple_guideline"
                                            placeholder="Enter text simple guideline">
                                    </div>
                                    <input type="submit" class="btn btn-primary" value="Submit">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
