@extends('layouts.backend')
@section('content')

<div class="content-wrapper">
  <div class="row page-title-header">
    <div class="col-12">
      <div class="page-header">
        <h4 class="page-title">Welcome To My Dashboard</h4>
        
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-3 col-md-6">
              <div class="d-flex">
                <div class="wrapper">
                  <h3 class="mb-0 font-weight-semibold">{{App\User::all()->count()}}</h3>
                  <h5 class="mb-0 font-weight-medium text-primary">Customer</h5>
                  
                </div>
                <div class="wrapper my-auto ml-auto ml-lg-4">
                  <canvas height="50" width="100" id="stats-line-graph-1"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
              <div class="d-flex">
                <div class="wrapper">
                  <h3 class="mb-0 font-weight-semibold">{{App\Product::all()->count()}}</h3>
                  <h5 class="mb-0 font-weight-medium text-primary">Product</h5>
                  
                </div>
                <div class="wrapper my-auto ml-auto ml-lg-4">
                  <canvas height="50" width="100" id="stats-line-graph-2"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
              <div class="d-flex">
                <div class="wrapper">
                  <h3 class="mb-0 font-weight-semibold">{{App\Brand::all()->count()}}</h3>
                  <h5 class="mb-0 font-weight-medium text-primary">Brand</h5>
                  
                </div>
                <div class="wrapper my-auto ml-auto ml-lg-4">
                  <canvas height="50" width="100" id="stats-line-graph-3"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
              <div class="d-flex">
                <div class="wrapper">
                  <h3 class="mb-0 font-weight-semibold">{{App\Order::all()->count()}}</h3>
                  <h5 class="mb-0 font-weight-medium text-primary">Order</h5>
                  
                </div>
                <div class="wrapper my-auto ml-auto ml-lg-4">
                  <canvas height="50" width="100" id="stats-line-graph-4"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="text-center">
    <a href="{{Route('home')}}" class="btn btn-sm btn-primary" target="_blank">Visit The Main Site</a>
  </div>
</div>

@endsection