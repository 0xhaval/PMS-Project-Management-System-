@extends('backend.layouts.app')
@section('content')
<script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>All Users (Student and Admin)</h3>
                <p class="text-subtitle text-muted">
                    <form action="{{ route('admin.user.index') }}" method="GET">
                    <div class="input-group">
                        <input type="search" name="search" class="form-control bg-black border-3" placeholder="Search for..."
                            aria-label="Search" aria-describedby="basic-addon2" value="{{ request('search') }}">
                    </div>
                </form>
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Users</li>
                    </ol>
                </nav>
                @if ($message = Session::get('message'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
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
                          <th>DEPARTMENT</th>
                          <th>GLOBAL AVG</th>
                          <th>YEAR</th>
                          <th>STATUS</th>
                          <th colspan="2">ACTION</th>
                        </tr>
                      </thead>
                      <tbody>
                          @forelse ($users as $user)
                          <tr class="item">
                            <td class="text-bold-500">
                                <a href="#">{{ $user->name }}</a>
                            </td>
                            <td>{{ $user->dept }}</td>
                            <td class="text-bold-500">{{ bcdiv($user->global_avg, 1, 2) }}</td>
                            <td>{{ $user->year }}</td>
                            <td>
                                <span class="badge {{ $user->is_admin? 'bg-success' : 'bg-danger' }} text-white">{{ $user->is_admin? 'Admin' : 'User' }}</span>
                            </td>
                            <td>
                              <a href="{{ route('admin.user.edit', $user->id) }}" class="btn icon icon-left btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> Edit</a>
                            </td>
                              <td>
                                  @if (Auth::user()->id != $user->id)
                                    <a href="#" onclick="document.getElementById('delete-user-{{ $user->id }}').submit();" class="btn icon icon-left btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg> Delete</a>
                                  @endif

                                  <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" id="delete-user-{{ $user->id }}">
                                    @csrf
                                    @method('delete')
                                </form>
                              </td>
                          </tr>
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
              <div>
                {{ $users->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
