@extends('backend.layouts.app')
@section('content')
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Group {{ $group->name }}</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.group.index') }}">Groups</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Group {{ $group->name }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-dark mb-0">
          <thead>
            <tr>
              <th>NAME</th>
              <th>DEPARTMENT</th>
              <th>GLOBAL AVG</th>
              <th>YEAR</th>
            </tr>
          </thead>
          <tbody>
              @forelse ($users as $user)
              @if ($group->id == $user->group_id)
                <tr>
                    <td class="text-bold-500">{{ $user->name }}</td>
                    <td>{{ $user->dept }}</td>
                    <td class="text-bold-500">{{ ($user->first_avg + $user->second_avg) / 2 }}</td>
                    <td>{{ $user->year }}</td>
                </tr>
              @endif
              @empty
              @endforelse
          </tbody>
        </table>
        <p class="mt-3">if it's empty group please invite student to Group <a href="{{ route('admin.user.index') }}">Click here</a></p>
    </div>
</div>
@endsection
