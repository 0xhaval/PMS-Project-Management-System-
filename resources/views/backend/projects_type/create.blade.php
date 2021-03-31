@extends('backend.layouts.app')
@section('content')
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Add Project Type</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Project Type</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
        <h4 class="card-title">Just write a name for Project type</h4>
        </div>
        <div class="card-content">
        <div class="card-body">
            <form class="form form-vertical" action="{{ route('admin.projectType.store') }}" method="POST">
                @csrf
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Error!</strong> <br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            <div class="form-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group has-icon-left">
                            <h5 for="first-name-icon">Name</h5>
                            <div class="position-relative">
                                <input name="name" type="text" class="form-control" placeholder="ex. Web Project" id="first-name-icon">
                                <div class="form-control-icon">
                                    <i data-feather="users"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary mr-1 mb-1">Create</button>
                </div>
                </div>
            </div>
            </form>
        </div>
        </div>
    </div>
</div>
@endsection
