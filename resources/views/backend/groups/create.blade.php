@extends('backend.layouts.app')
@section('content')
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Add Group</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Group</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
        <h4 class="card-title">Just write a name for group</h4>
        </div>
        <div class="card-content">
        <div class="card-body">
            <form class="form form-vertical" action="{{ route('admin.group.store') }}" method="POST">
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
                                <input name="name" type="text" class="form-control" placeholder="First group" id="first-name-icon">
                                <div class="form-control-icon">
                                    <i data-feather="users"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group has-icon-left">
                            <h5 for="first-name-icon">Quantity</h5>
                            <div class="position-relative">
                                <select name="qty" id="" class="form-control">
                                    <option value="" disabled selected>Choose one...</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                </select>
                                <div class="form-control-icon">
                                    <i data-feather="user"></i>
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
