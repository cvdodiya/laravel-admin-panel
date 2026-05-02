@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box text-bg-primary">
            <div class="inner">
                <h3>10</h3>
                <p>Total Users</p>
            </div>
            <div class="small-box-icon">
                <i class="fas fa-users"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box text-bg-success">
            <div class="inner">
                <h3>5</h3>
                <p>Active Modules</p>
            </div>
            <div class="small-box-icon">
                <i class="fas fa-layer-group"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box text-bg-warning">
            <div class="inner">
                <h3>3</h3>
                <p>Pending Tasks</p>
            </div>
            <div class="small-box-icon">
                <i class="fas fa-list-check"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box text-bg-danger">
            <div class="inner">
                <h3>1</h3>
                <p>Alerts</p>
            </div>
            <div class="small-box-icon">
                <i class="fas fa-bell"></i>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Welcome</h3>
    </div>
    <div class="card-body">
        <p class="mb-2">Welcome, {{ auth()->user()->name }}.</p>
        <p class="mb-0">Your admin panel is now ready. Next we can add dynamic modules like categories, products, pages, settings, or users management.</p>
    </div>
</div>
@endsection