@extends('backend.layouts.app')
@section('content')
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Add User (Student and Admin)</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add User</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
        <h4 class="card-title">If you create a Student account you must to Fill all of following</h4>
        </div>
        <div class="card-content">
        <div class="card-body">
            <form class="form form-vertical" action="{{ route('admin.user.store') }}" method="POST">
                @csrf
                <input type="hidden" name="global_avg">
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
                <div class="row">
                    <div class="col-6">
                        <div class="form-group has-icon-left">
                            <h5 for="first-name-icon">Name</h5>
                            <div class="position-relative">
                                <input dir="rtl"   name="name" type="text" class="form-control" placeholder="Ali Jasim" id="first-name-icon">
                                <div class="form-control-icon">
                                    <i data-feather="user"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group has-icon-left">
                            <h5 for="email-id-icon">Email</h5>
                            <div class="position-relative">
                                <input name="email" type="email" class="form-control" placeholder="Email" id="email-id-icon">
                                <div class="form-control-icon">
                                    <i data-feather="mail"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group has-icon-left">
                            <h5 for="first-name-icon">Department</h5>
                            <div class="position-relative">
                                <select name="dept" id="" class="form-control">
                                    <option value="" disabled selected>Choose one..</option>
                                    <option value="networking" >Networking</option>
                                    <option value="computers" >Computers</option>
                                    <option value="softwares" >Softwares</option>
                                </select>
                                <div class="form-control-icon">
                                    <i data-feather="grid"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group has-icon-left">
                            <h5 for="first-name-icon">Graduation Year</h5>
                            <div class="position-relative">
                                <select name="year" id="" class="form-control">
                                    <option value="" disabled selected>Choose one..</option>
                                    <option value="2022" >2022</option>
                                    <option value="2023" >2023</option>
                                    <option value="2024" >2024</option>
                                    <option value="2025" >2025</option>
                                    <option value="2026" >2026</option>
                                    <option value="2027" >2027</option>
                                    <option value="2027" >2028</option>
                                    <option value="2027" >2029</option>
                                    <option value="2027" >2030</option>
                                    <option value="2027" >2031</option>
                                </select>
                                <div class="form-control-icon">
                                    <i data-feather="plus"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group has-icon-left">
                            <h5 for="first-name-icon">First Course Avarage</h5>
                            <div class="position-relative">
                                <input step="0.01" name="first_avg" type="number" class="form-control" placeholder="90.5" id="first-name-icon">
                                <div class="form-control-icon">
                                    <i data-feather="percent"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group has-icon-left">
                            <h5 for="first-name-icon">Second Course Avarage</h5>
                            <div class="position-relative">
                                <input step="0.01" name="second_avg" type="number" class="form-control" placeholder="80.5" id="first-name-icon">
                                <div class="form-control-icon">
                                    <i data-feather="percent"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-6">
                        <div class="form-group has-icon-left">
                            <div class="position-relative">
                                <input type="password" class="form-control " hidden
                                id="password" placeholder="Password" name="password">
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group has-icon-left">
                            <div class="position-relative">
                                <input  type="password" class="form-control " hidden
                                id="password" placeholder="Password" name="password_confirmation">
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group has-icon-left">
                            <h5 for="email-id-icon">Role</h5>
                            <div class="position-relative">
                                <select class="form-control" id="role" name="is_admin">
                                    <option value="" disabled selected>Choose one...</option>
                                    <option value="0">Student</option>
                                    <option value="1">Admin</option>
                                </select>
                                <div class="form-control-icon">
                                    <i data-feather="meh"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group has-icon-left">
                            <h5 for="email-id-icon">Group</h5>
                            <div class="position-relative">
                                <select class="form-control" id="role" name="group_id">
                                    <option value="" disabled selected>Choose one...</option>
                                    @foreach ($groups as $group)
                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endforeach
                                </select>
                                <div class="form-control-icon">
                                    <i data-feather="users"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-end">
                    <input type="submit" class="btn btn-primary mr-1 mb-1" value="Create">
                </div>
                </div>
            </div>
            </form>
        </div>
        </div>
    </div>
</div>
@endsection

