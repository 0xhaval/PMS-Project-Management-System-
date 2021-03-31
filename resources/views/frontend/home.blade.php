@extends('layouts.app')
@section('content')
<div class="container">
    @auth
        <h1>
            Welcome {{ Auth::user()->name }}
            @if (!Auth::user()->isAdmin())
                From {{ Auth::user()->group->name }} Group
            @endif
        </h1>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Project ID</th>
                    <th scope="col">Prject Name</th>
                    <th scope="col">Prject Type</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                <tr>
                    <th>{{ $project->project_number }}</th>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->projectType->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <hr>
        <h1>Enter Your in following Inputs</h1>
        @if ($message = Session::get('message'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        {{--  valo@mailinator.com luHDTLMw--}}
        <form action="{{ route('store', Auth::user()->id ) }}" method="POST" class="classesName">
            @csrf
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" hidden>
            @if (!Auth::user()->isAdmin())
                <input type="text" name="group_id" id="" value="{{ Auth::user()->group->id }}" hidden>
            @endif
            @foreach ($projects as $key => $project)
            <h5>Choice {{ $key }}</h5>
            <div class="form-group">
                <input type="number" placeholder="Enter Project ID" name="choices[{{ $key }}][value]" id="" class="form-control">
            </div>
            @endforeach
            <div class="form-group float-right">
                <small class=" text-grey">Note: Before send you must be insure for Choices</small>
                <input type="submit" value="Send" class="btn btn-primary btn-block">
            </div>
        </form>

    @endauth
</div>
@endsection
<script>
var frm = document.querySelector('form.classesName');
var inputs = frm.querySelectorAll('input[type=number]');

frm.addEventListener('submit', function(e) {
    e.preventDefault();
    var classArr = [];

    for(var i = 0; i < inputs.length; i++) {
        if(classArr.indexOf(inputs[i].value) != -1) {
            inputs[i].style.backgroundColor = "red";
            return false;
        }
        else
            classArr.push(inputs[i].value);
    }
    frm.submit();
});

for(var j = 0; j < inputs.length; j++) {
    inputs[j].addEventListener('focus', function() {
        this.style.backgroundColor = "white";
    });
}
</script>
