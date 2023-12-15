@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" id="dashboard">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="{{ route('admin.text.index') }}">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fa fa-users"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text text-dark">Total Text</span>
                                    <span class="info-box-number text-dark">{{ $text }}</span>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
