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
                                <span class="text-bold text-lg">Text</span>
                                <div class="float-right">
                                    {{-- <a href="{{ route('admin.text.create') }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-plus"></i>
                                    </a> --}}
                                </div>
                            </div>
                            <div class="card-body">
                                @if (session()->has('success'))
                                    <div class="alert alert-success text-white success-delay-fadeout">{{ session('success') }}</div>
                                @endif
                                <table id="datatable" class="table table-bordered datatable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Test name</th>
                                            <th>Location</th>
                                            <th>Price</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($book_test as $tKey => $text)
                                            <tr>
                                                <td>{{ $text?->id }}</td>
                                                <td>{{ $text?->text->name }}</td>
                                                <td>{{ $text?->text->location }}</td>
                                                <td>{{ $text?->text->price }}</td>
                                                <td>{{ $text?->name }}</td>
                                                <td>{{ $text?->email }}</td>
                                                <td>{{ $text?->phone }}</td>
                                                <td>{{ $text?->address }}</td>
                                                <td>
                                                    <a href="{{ route('admin.book-test.show', base64_encode($text?->id)) }}" class="btn btn-sm btn-primary">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    {{-- <a href="{{ route('admin.text.delete', [base64_encode($text?->id)]) }}" class="delete-confirm btn btn-danger btn-sm ml-1">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </a> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
