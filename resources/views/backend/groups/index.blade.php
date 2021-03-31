@extends('backend.layouts.app')
@section('content')
<script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>

<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>All Groups</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Groups</li>
                    </ol>
                </nav>
            </div>
            @if ($message = Session::get('message'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
        </div>
        <div class="row" id="table-hover-row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Info</h4>
                  <input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
                  <p class="card-text">This is Sortable Table, Cilck on the Column Name to Sort</p>
                </div>
                <div class="card-content">
                  <!-- table hover -->
                  <div class="table-responsive">
                    <table class="table table-hover mb-0 sortable" id="myTable">
                      <thead>
                        <tr>
                          <th>NAME</th>
                          <th>STUDENTS</th>
                          <th>SHOULD BE</th>
                          <th>GROUP AVARAGE</th>
                          <th>AVG THE HIGHEST STD</th>
                          <th colspan="2">ACTION</th>
                        </tr>
                      </thead>
                      <tbody>
                          @forelse ($groups as $group)
                          <tr class="item">
                            <td class="text-bold-500">
                                <a href="{{ route('admin.group.show', $group->id) }}">{{ $group->name }}</a>
                            </td>
                            <td>
                                <span class="badge {{ ($group->users->count() < $group->qty)? 'bg-danger' : 'bg-success' }}
                                    text-white">{{ $group->users->count() }}</span>
                            </td>
                            <td>{{ $group->qty }}</td>
                            <td>
                                <?php
                                $g_avg = 0;
                                foreach($group->users as $user)
                                    $g_avg += $user->global_avg;

                                if($g_avg != 0){
                                    $g_avg /= $group->users->count();
                                    echo bcdiv($g_avg, 1, 2);
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                $h_avg = 0;
                                foreach($group->users as $user){
                                    if($h_avg < $user->global_avg)
                                        $h_avg = $user->global_avg;
                                }
                                echo bcdiv($h_avg, 1, 2);
                                ?>
                            </td>
                            <td>
                              <a href="{{ route('admin.group.edit', $group->id) }}" class="btn icon icon-left btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> Edit</a>
                            </td>
                              <td>
                                  <a href="#" class="btn icon icon-left btn-danger" onclick="document.getElementById('delete-user-{{ $group->id }}').submit();"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg> Delete</a>

                                  <form action="{{ route('admin.group.destroy', $group->id) }}" method="POST" id="delete-user-{{ $group->id }}">
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
                        @if ($groups->isEmpty())
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


<script>
    function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

    </script>
