@extends('layouts.admin')
@section('client')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Dashboard</h1>
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
    <div class="col-lg-12">
      <div class="row">

        <!-- Sales Card -->
        <div class="col-xxl-3 col-md-3">
          <div class="card info-card sales-card">

           

            <div class="card-body">
              <h5 class="card-title">Hoá đơn <span>| All</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-receipt"></i>
                </div>
                <div class="ps-3">
                  <h6>{{$bill1}}</h6>
                  <a href="{{route('table.list_bill')}}">Xem chi tiết</a>

                </div>
              </div>
            </div>

          </div>
        </div><!-- End Sales Card -->
        <div class="col-xxl-3 col-md-3">
          <div class="card info-card sales-card">

           

            <div class="card-body">
              <h5 class="card-title">Món ăn <span>| All</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-disc-fill"></i>
                </div>
                <div class="ps-3">
                  <h6>{{$dish1}}</h6>
                  <a href="{{route('dish.show')}}">Xem chi tiết</a>

                </div>
              </div>
            </div>

          </div>
        </div><!-- End Sales Card -->
        <div class="col-xxl-3 col-md-3">
          <div class="card info-card sales-card">

           

            <div class="card-body">
              <h5 class="card-title">Danh mục <span>| All</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-bookmarks-fill"></i>
                </div>
                <div class="ps-3">
                  <h6>{{$category}}</h6>
                  <a href="{{route('category.show')}}">Xem chi tiết</a>

                </div>
              </div>
            </div>

          </div>
        </div><!-- End Sales Card -->
        <div class="col-xxl-3 col-md-3">
          <div class="card info-card sales-card">

           

            <div class="card-body">
              <h5 class="card-title">Bàn ăn<span>| All</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-table"></i>
                </div>
                <div class="ps-3">
                  <h6>{{$table}}</h6>
                  <a href="{{route('TableAdmin.show')}}">Xem chi tiết</a>

                </div>
              </div>
            </div>

          </div>
        </div><!-- End Sales Card -->
        <div class="col-xxl-3 col-md-3">
          <div class="card info-card sales-card">

            <div class="card-body">
              <h5 class="card-title">Đang gọi món <span>| All</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-database-fill-add"></i>
                </div>
                <div class="ps-3">
                  <h6>{{$order}}</h6>
                  <a href="{{route('test.show')}}">Xem chi tiết</a>

                </div>
              </div>
            </div>

          </div>
        </div><!-- End Sales Card -->
        <div class="col-xxl-3 col-md-3">
          <div class="card info-card sales-card">

            <div class="card-body">
              <h5 class="card-title">Số nhân viên <span>| All</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-person-lines-fill"></i>
                </div>
                <div class="ps-3">
                  <h6>{{$user}}</h6>
                  <a href="{{route('user.show')}}">Xem chi tiết</a>

                </div>
              </div>
            </div>

          </div>
        </div><!-- End Sales Card -->
        <!-- Reports -->
        <div class="col-xxl-3 col-md-3">
          <div class="card info-card sales-card">

            <div class="card-body">
              <h5 class="card-title">Doanh thu  <span>| All</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-coin"></i>
                </div>
                <div class="ps-3">
                  <h6>{{ number_format($totalRevenue, 0, '.', '.') }} ₫</h6>
                  <a href="{{route('home.total')}}">Xem chi tiết</a>

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