@extends('backend.layouts.app')
@section('content')
<script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>All Projects</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Projects</li>
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
                <div class="card-header" style="font-size: 20px; color:red">
                    <h4 class="card-title" style="font-size: 25px; color:red">Note</h4>
                    <p class="card-text">Put your note here</p>
                  <a href="#" class="btn btn-danger float-right" onclick="window.print()">Print</a>
                </div>
                <style>
                    @media print {

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
                        body *, .btn{
                            visibility: hidden;
                        }
                    }
                </style>
                <div class="card-content">
                  <!-- table hover -->
                  <div class="table-responsive">
                    <table class="table table-hover mb-0 sortable print-container">
                        <h1>Project Inforamtion</h1>
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>NAME</th>
                          <th>SUPERVISOR</th>
                          <th>DEPT</th>
                          <th>TYPE</th>
                          <th colspan="2">ACTION</th>
                        </tr>
                      </thead>
                      <tbody>
                          @forelse ($projects as $project)
                          <tr class="item">
                            <td class="text-bold-500">{{ $project->project_number }}</td>
                            <td class="text-bold-500">{{ $project->name }}</td>
                            <td class="text-bold-500">{{ $project->supervisor }}</td>
                            <td class="text-bold-500">{{ $project->dept }}</td>
                            <td><span class="badge bg-warning text-blue">{{ $project->projectType->name }}</span></td>

                            <td>
                              <a href="{{ route('admin.project.edit', $project->id) }}" class="btn icon icon-left btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> Edit</a>
                            </td>
                              <td>
                                  <a href="#" onclick="document.getElementById('delete-user-{{ $project->id }}').submit();" class="btn icon icon-left btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg> Delete</a>

                                  <form action="{{ route('admin.project.destroy', $project->id) }}" method="POST" id="delete-user-{{ $project->id }}">
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
                        @if ($projects ->isEmpty())
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
