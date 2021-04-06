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
                  <a href="#" class="btn btn-secondary float-right" onclick="window.print()">Print</a>
                </div>
                <style>
                    @media print {
                        body *{
                            visibility: hidden;
                        }
                        .print-container, .print-container * {
                            visibility :visible;
                        }

                        .print-container{
                            position: absolute;
                            left: 0;
                            top: 0;
                        }

                        .table td, .dataTable-table td, .table thead th, .dataTable-table thead th{
                            font-size: 14pt;
                            color: black;
                            margin: 0;

                        }
                        #main .main-content{
                            padding: 0 !important;
                        }
                    }
                </style>
                <div class="card-content print-container">
                  <!-- table hover -->
                  <div class="table-responsive">
                    <table class="table table-hover mb-0 sortable">
                      <thead>
                        <tr>
                            <th>NAME</th>
                          <th>EMAIL</th>
                          <th>PASSWORD</th>
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
