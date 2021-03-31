@extends('backend.layouts.app')
@section('content')
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Update Group</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Update Group</li>
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
            <form class="form form-vertical" action="{{ route('admin.group.update', $group->id) }}" method="POST">
                @csrf
                @method('PUT')
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
                                <input value="{{ $group->name }}" name="name" type="text" class="form-control" placeholder="First group" id="first-name-icon">
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
                                    <option value="1" {{ $group->qty == '1' ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ $group->qty == '2' ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ $group->qty == '3' ? 'selected' : '' }}>3</option>
                                    <option value="4" {{ $group->qty == '4' ? 'selected' : '' }}>4</option>
                                    <option value="5" {{ $group->qty == '5' ? 'selected' : '' }}>5</option>
                                    <option value="6" {{ $group->qty == '6' ? 'selected' : '' }}>6</option>
                                </select>
                                <div class="form-control-icon">
                                    <i data-feather="user"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary mr-1 mb-1">Update</button>
                </div>
                </div>
            </div>
            </form>
        </div>
        </div>
    </div>
</div>
@endsection
