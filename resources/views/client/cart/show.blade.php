@extends('layouts.admin')
@section('client')
<main id="main" class="main">
@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

  <div class="pagetitle container">
            <div class="row">
                <div class="col-12 d-flex align-items-center">
                    <h6 class="m-0">DANH SÁCH MÓN ĂN</h6>
                    <a href="{{route('cart.remove')}}" class="ms-auto btn btn-sm btn-danger">Xoá giỏ hàng</a>
                </div>
            </div>
        </div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">

        <div class="col-12">
            <div class="card mb-3">
                <ol class="list-group ">
                    @foreach(Cart::content() as $row)
                        @if ($row->options->get('session') == session()->get('table')) 
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div><img class="img-fluid" src="{{asset($row->options->img)}}" alt="" style="max-width: 100px; height: 100PX;"></div>
                        <div class="ms-2 me-auto">
                            <div class="fw-bold "><span class="me-2 " >x {{$row->qty}}</span>{{$row->name}}</div>
                            <span>{{ number_format($row->total, 0, '.', '.') }} ₫</span> 
                        </div>
                        <div><a href="{{route('cart.edit',$row->rowId)}}" class="badge text-bg-primary rounded-pill"><i
                                    class="bi bi-pencil-square"></i></a>
                            <a href="{{route('cart.delete',$row->rowId)}}" class="badge text-bg-primary rounded-pill"><i
                                    class="bi bi-trash"></i></a>
                        </div>

                    </li>
                    <!-- dd({{$row->options->session}}) -->
                        @endif
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
                    <div>{{Cart::total();}}Đ</div>

                </li>

            </ol>
        </div>

        <div class="col-12 mt-3">
            <a href="{{route('cart.addsql')}}" class="btn btn-warning w-100 text-light fw-bold">YÊU CẦU GỌI MÓN</a>
        </div>
        
    </div>

</section>

</main><!-- End #main -->
@endsection