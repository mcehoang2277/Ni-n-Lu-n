@extends('layouts.admin')

@section('client')
<main id="main" class="main">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <img src="{{asset('assets/img/card.jpg')}}" class="card-img-top" alt="...">
                    <a href="" class="card-body mb-0 bg-success text-light">
                        <h5 class="card-title text-center text-light">BÀN {{$id}}</h5>

                    </a>
                </div>
            </div>
            <div class="col-6">
                <div class="card mb-3">
                    <ol class="list-group ">
                    @foreach($list_order as $row)
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div><img class="img-fluid" src="{{asset(App\Models\Dish::find($row->dish)->img)}}" alt="" style="max-width: 100px; height: 100PX;">
                            </div>
                            <div class="ms-2 me-auto">
                            <div class="fw-bold "><span class="me-2 " >x {{$row->qty}}</span>{{App\Models\Dish::find($row->dish)->name}}</div>
                            <span>{{ number_format(App\Models\Dish::find($row->dish)->price, 0, '.', '.') }} ₫</span> 
                                
                            </div>
                            <div>{{$row->created_at->format('H:i')}}
                            </div>

                        </li>
                        @endforeach
                        
                    </ol>
                    <!-- Button trigger modal -->
                    <a href="{{route('table.confirm',$id)}}" class="btn btn-success mt-2"> Xác nhận đơn hàng</a>
                    <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Thanh Toán Hóa Đơn
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Xác nhận thanh toán</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Bạn có muốn thanh toán hóa đơn
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Hủy</button>
                                    <a href="{{route('table.bill',$id)}}" type="button" class="btn btn-primary">Đồng ý Thanh Toán</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="pagetitle">
      <div class="col-12">
        <div>
        <div class="form-floating mb-3 search-container">
            <form action="{{ route('table.detail',$id) }}" method="GET">
            @csrf
                <div class="input-group">
                    <input type="text" class="form-control" name="q" placeholder="Nhập tên món ăn cần tìm!" aria-label="Nhập tên món ăn cần tìm!" aria-describedby="search-addon">
                    <button type="submit" class="btn btn-primary" id="search-addon">Tìm kiếm</button>
                </div>
            </form>
        </div>

              
        </div>
    </div>
    </div><!-- End Page Title -->

    <section class="section dashboard">
    @if(isset($searchResults))
        @foreach($searchResults as $categoryName => $dishes)
            @if($dishes->isNotEmpty())
                <div class="row">
                    <h6 class="bg-title mb-3">{{ $categoryName }}</h6>
                    @foreach($dishes as $dish)
                    <div class="col-6">
        <div class="card mb-3">
            <div class="row g-0 mb-2">
                <div class="col-md-4">
                    <img src="{{ asset($dish->img) }}" class="img-fluid rounded-start" alt="..." style="width: 100%; height: 165px;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h6 class="card-title">{{ $dish->name }}</h6> <!-- Hiển thị tên món ăn -->
                        <div class="d-flex justify-content-between">
                            <span>{{ number_format($dish->price, 0, '.', '.') }} ₫</span> <!-- Hiển thị giá -->
                            
                            @if($dish->status == 1)
                            <a href="{{route('table.AddDish',[$dish->id,$id])}}"> <i class="bi bi-plus-circle-fill"></i></a>
                            @endif
                            @if($dish->status == 3)
                            <a class="text-danger"> Hết hàng</i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                    @endforeach
                </div>
            @endif
        @endforeach
    @else
    @foreach($category as $item)
    @php
    $dishes = App\Models\Dish::whereIn('status', [1, 3])->where('category', $item->id)->get();
    @endphp
    @if($dishes->isNotEmpty()) <!-- Kiểm tra xem có món ăn thuộc danh mục này không -->
    <div class="row">
        <h6 class="bg-title mb-3">{{ $item->name }}</h6> 
        @foreach($dishes as $dish)
        <div class="col-6">
            <div class="card mb-3">
                <div class="row g-0 mb-2">
                    <div class="col-md-4">
                        <img src="{{ asset($dish->img) }}" class="img-fluid rounded-start" alt="..." style="width: 100%; height: 165px;">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h6 class="card-title">{{ $dish->name }}</h6> <!-- Hiển thị tên món ăn -->
                            <div class="d-flex justify-content-between">
                                <span>{{ number_format($dish->price, 0, '.', '.') }} ₫</span> <!-- Hiển thị giá -->
                                @if($dish->status == 1)
                            <a href="{{route('table.AddDish',[$dish->id,$id])}}"> <i class="bi bi-plus-circle-fill"></i></a>
                            @endif
                            @if($dish->status == 3)
                            <a class="text-danger"> Hết hàng</i></a>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
@endforeach
    @endif
   


    </section>
            </div>
        </div>



    </main>
@endsection
