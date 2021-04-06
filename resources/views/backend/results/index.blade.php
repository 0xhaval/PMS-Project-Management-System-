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
            </div>
        </div>
        <div class="row">
            <div class="col-8">
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
                                  <th>GROUP NAME</th>
                                  <th>CHOICES</th>
                                  <th>GROUP AVG</th>
                                  <th>AVG THE HIGHEST STD</th>
                                </tr>
                              </thead>
                              <tbody>
                                  @forelse ($results as $key => $result)
                                  <tr style="font-size: 17px" class="item">
                                      <td>{{ $result->group->name }}</td>
                                      <td>
                                        @foreach ($result->choices as $item)
                                        <ul>
                                            <li>Project ID <span class=" bg-fuchsia text-danger p-2 font-weight-bold">{{ $item['value'] }}</span></li>
                                        </ul>
                                        @endforeach
                                      </td>
                                      <td>
                                        <?php
                                        $g_avg = 0;
                                        foreach($result->group->users as $user)
                                            $g_avg += $user->global_avg;

                                        if($g_avg != 0){
                                            $g_avg /= $result->group->users->count();
                                            echo bcdiv($g_avg, 1, 2);
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $h_avg = 0;
                                        foreach($result->group->users as $user){
                                            if($h_avg < $user->global_avg)
                                                $h_avg = $user->global_avg;
                                        }
                                        echo bcdiv($h_avg, 1, 2);
                                        ?>
                                    </td>
                                  </tr>
                                  @empty

                                  @endforelse

                              </tbody>
                            </table>
                            <div>
                                @if ($results->isEmpty())
                                <p class="">There is no such a result</p>
                                @endif
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
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
                @if ($message = Session::get('message'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <form action="{{ route('admin.project.final') }}" method="post">
                    @csrf
                    <legend>Enter group choice</legend>
                    @foreach ($results as $i => $result)
                        <div class="row">
                            <div class="col-7">
                                <div class="form-group">
                                    <input type="text" value="{{ $result->group->id }}" hidden>
                                    <input name="choice[{{ $i }}][key]" class="form-control"style="font-size: 20px" type="text" placeholder="" value="{{ $result->group->name }}" readonly>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="form-group">
                                    <input type="number" name="choice[{{ $i }}][value]" id="" class="form-control" style="font-size: 20px">
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="form-group">
                        <input type="submit" value="Send" class="btn btn-block btn-primary">
                    </div>
                </form>
            </div>
        </div>


    </div>
</div>
@endsection
