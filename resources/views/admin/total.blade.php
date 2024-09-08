@extends('layouts.admin')
@section('client')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Doanh thu</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-4">
      <div class="row">

        <!-- Sales Card -->
        <div class="col-xxl-12 col-md-12">
        <div class="form-floating mb-3 search-container">
            <form action="#" method="GET">
            @csrf
                <div class="input-group">
                <select class="form-select" aria-label="Default select example" name="seach">
  
  <option value="4">Tháng 4</option>
  <option value="5">Tháng 5</option>
  
</select>
                    <button type="submit" class="btn btn-primary" id="search-addon">Tìm kiếm</button>
                </div>
            </form>
        </div>
          <div class="card info-card sales-card">
            <div class="card-body">
              <h5 class="card-title">Hoá đơn <span>| All</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-receipt"></i>
                </div>
                <div class="ps-3">
                  <h6>{{ number_format($totalRevenue, 0, '.', '.') }} ₫</h6>
                  <a href="{{route('table.list_bill')}}">Xem chi tiết</a>

                </div>
              </div>
            </div>

          </div>
        </div><!-- End Sales Card -->
       

        <!-- Recent Sales -->
       

        <!-- Top Selling -->
       

      </div>
    </div><!-- End Left side columns -->

    <!-- Right side columns -->
 

  </div>
</section>

</main><!-- End #main -->
  @endsection