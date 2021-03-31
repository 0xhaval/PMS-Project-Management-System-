@extends('backend.layouts.app')
@section('content')
<script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>All Students</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Student Info</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row" id="table-hover-row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Info</h4>
                  <p class="card-text">This is Sortable Table, Cilck on the Column Name to Sort</p>
                </div>
                <div class="card-content">
                  <!-- table hover -->
                  <div class="table-responsive">
                    <table class="table table-hover mb-0 sortable">
                      <thead>
                        <tr>
                          <th>NAME</th>
                          <th>EMAIL</th>
                          <th>PASSWORD</th>
                          <th>DEPARTMENT</th>
                          <th>GROUP</th>
                        </tr>
                      </thead>
                      <tbody>
                          @forelse ($users as $user)
                          @if (!$user->isAdmin())
                            <tr class="item">
                                <td class="text-bold-500">{{ $user->name }}</td>
                                <td class="text-bold-500">{{ $user->email }}</td>
                                <td class="text-bold-500">{{ $user->password }}</td>
                                <td class="text-bold-500">{{ $user->dept}}</td>
                                <td class="text-bold-500">{{ $user->group->name}}</td>
                            </tr>
                          @endif
                          @empty

                          @endforelse

                      </tbody>
                    </table>
                    <div>
                        @if ($users->isEmpty())
                        <p class="">There is no such a result</p>
                        @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>

    </div>
</div>
@endsection
