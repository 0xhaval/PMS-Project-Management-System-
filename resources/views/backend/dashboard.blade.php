@extends('backend.layouts.app')
@section('content')
<style>
.background-img{
    background-image: url(assets/images/graduation.jpg);
    height: 500px;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
}

.card.card-statistic {
    box-shadow: 1px 2px 5px rgb(30 69 138);
    background: linear-gradient(to bottom, #aa433f, #c84c42);
    border: none;
}
</style>
<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Dashboard</h3>
        <p class="text-subtitle text-muted">A good dashboard to display your statistics</p>
    </div>
    <div class="background-img">

    </div>
    <section class="section">
        <div class="row mb-2">
            <div class="col-12 col-md-3">
                <div class="card card-statistic">
                    <div class="card-body p-0">
                        <div class="d-flex flex-column">
                            <div class='px-3 py-3 d-flex justify-content-between'>
                                <h3 class='card-title'>Students</h3>
                                <div class="card-right d-flex align-items-center">
                                    <p>
                                        <?php
                                            $std = 0;
                                            foreach ($users as $key => $user) {
                                                if(!$user->isAdmin())
                                                    $std++;
                                            }
                                            echo $std;
                                        ?>
                                    </p>
                                </div>
                            </div>
                            <div class="chart-wrapper">
                                <canvas id="canvas1" style="height:100px !important"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="card card-statistic">
                    <div class="card-body p-0">
                        <div class="d-flex flex-column">
                            <div class='px-3 py-3 d-flex justify-content-between'>
                                <h3 class='card-title'>Projects</h3>
                                <div class="card-right d-flex align-items-center">
                                    <p>{{ $projects->count() }}</p>
                                </div>
                            </div>
                            <div class="chart-wrapper">
                                <canvas id="canvas3" style="height:100px !important"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="card card-statistic">
                    <div class="card-body p-0">
                        <div class="d-flex flex-column">
                            <div class='px-3 py-3 d-flex justify-content-between'>
                                <h3 class='card-title'>Admin</h3>
                                <div class="card-right d-flex align-items-center">
                                    <p>
                                        <?php
                                        $admin = 0;
                                        foreach ($users as $key => $user) {
                                            if($user->isAdmin())
                                                $admin++;
                                        }
                                        echo $admin;
                                    ?>
                                    </p>
                                </div>
                            </div>
                            <div class="chart-wrapper">
                                <canvas id="canvas4" style="height:100px !important"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-3">
                <div class="card card-statistic">
                    <div class="card-body p-0">
                        <div class="d-flex flex-column">
                            <div class='px-3 py-3 d-flex justify-content-between'>
                                <h3 class='card-title'>Groups</h3>
                                <div class="card-right d-flex align-items-center">
                                    <p>{{ $groups->count() }}</p>
                                </div>
                            </div>
                            <div class="chart-wrapper">
                                <canvas id="canvas1" style="height:100px !important"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
