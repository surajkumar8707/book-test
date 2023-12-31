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
                                    <a href="{{ route('admin.text.create') }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (session()->has('success'))
                                    <div class="alert alert-success text-white success-delay-fadeout">{{ session('success') }}</div>
                                @endif
                                <div class="" style="overflow: auto;">
                                    <table id="datatable" class="table table-bordered datatable">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Code</th>
                                                <th>Name</th>
                                                <th>Location</th>
                                                <th>Category</th>
                                                <th>Schedule</th>
                                                <th>Price</th>
                                                <th>Reported On</th>
                                                <th>Created Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($texts as $tKey => $text)
                                                <tr>
                                                    <td>{{ $text?->id }}</td>
                                                    <td>{{ $text?->code }}</td>
                                                    <td>{{ $text?->name }}</td>
                                                    <td>{{ $text?->location }}</td>
                                                    <td>{{ $text?->category }}</td>
                                                    <td>{{ $text?->schedule }}</td>
                                                    <td>{{ $text?->price }}</td>
                                                    <td>{{ $text?->reportedon }}</td>
                                                    <td>{{ date('d M Y h:i:s A', strtotime($text?->created_at)) }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.text.edit', base64_encode($text?->id)) }}" class="btn btn-sm btn-primary">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a href="{{ route('admin.text.delete', [base64_encode($text?->id)]) }}" class="delete-confirm btn btn-danger btn-sm ml-1">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </a>
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
            </div>
        </section>
    </div>
@endsection
