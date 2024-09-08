@extends('layouts.admin')
@section('client')
<main id="main" class="main">
@if(session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
  @endif
  <div class="pagetitle container">
            <div class="row">
                <div class="col-12 d-flex align-items-center">
                    <h6 class="m-0">DANH SÁCH MÓN ĂN</h6>
                   
                </div>
            </div>
        </div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">

        <div class="col-12">
            <div class="card mb-3">
                <ol class="list-group ">
                    @php 
                        $total = 0; 
                    @endphp
                    @foreach($order as $row)
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div><img class="img-fluid" src="{{asset(App\Models\Dish::find($row->dish)->img)}}" alt="" style="max-width: 100px; height: 100PX;"></div>
                        <div class="ms-2 me-auto">
                            <div class="fw-bold "><span class="me-2 " >x {{$row->qty}}</span>{{App\Models\Dish::find($row->dish)->name}}</div>
                            <span>{{ number_format(App\Models\Dish::find($row->dish)->price, 0, '.', '.') }} ₫</span> 
                        </div>
                       <div>{{ number_format(App\Models\Dish::find($row->dish)->price*$row->qty, 0, '.', '.') }} ₫</div>

                    </li>
                    @php 
                        $total += App\Models\Dish::find($row->dish)->price*$row->qty;
                    @endphp
                    @endforeach
                </ol>
            </div>
        </div>
        <div class="col-12">
            <ol class="list-group ">
                <li class="list-group-item d-flex justify-content-between align-items-start">

                    <div class="ms-2 me-auto">
                        <DIV><b>TỔNG TIỀN</b></DIV>
                    </div>
                    <div>{{ number_format($total, 0, '.', '.') }} ₫</div>

                </li>

            </ol>
        </div>

        
        
    </div>

</section>

</main><!-- End #main -->
@endsection