@extends('backend.layouts.app')
@section('content')
<script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Final Result</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Final Result</li>
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
                  <a href="" class="btn btn-secondary float-right" onclick="window.print()">Print</a>
                </div>
                <div class="card-content print-container">
                  <!-- table hover -->
                  <div class="table-responsive">
                    <table class="table table-hover mb-0 sortable">
                      <thead>
                        <tr>
                          <th>GROUP NAME</th>
                          <th>CHOICE</th>
                        </tr>
                      </thead>
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
                      <tbody>
                          @forelse ($finalResults as $result)
                            <a href="#" onclick="document.getElementById('delete-user-{{ $result->id }}').submit();" class="btn ml-3 btn-danger">Delete All</a>
                            <form action="{{ route('admin.project.final.destroy', $result->id) }}" method="POST" id="delete-user-{{ $result->id }}">
                                @csrf
                                @method('delete')
                            </form>
                            @foreach ($result->choice as $item)
                                <tr class="item">
                                    <td class="text-bold-500">{{ $item['key'] }}</td>
                                    <td>{{  $item['value'] }}</td>
                                </tr>
                            @endforeach
                          @empty

                          @endforelse
{{-- codedak@mailinator.com	MzBRJkPV --}}
                      </tbody>
                    </table>
                    <div>
                        @if ($finalResults->isEmpty())
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
