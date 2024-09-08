@extends('layouts.admin')
@section('client')
<style>
  .search-container {
    position: relative;
}

.search-container .input-group {
    display: flex;
    flex-wrap: nowrap;
}

.search-container .form-control {
    border-radius: 0.25rem 0 0 0.25rem;
}

.search-container .btn {
    border-radius: 0 0.25rem 0.25rem 0;
}
</style>
<main id="main" class="main">
@if(session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
  @endif
    <div class="pagetitle">
      <div class="col-12">
        <div>
        <div class="form-floating mb-3 search-container">
            <form action="{{ route('search') }}" method="GET">
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
                            <a href="{{route('cart.add',$dish->id)}}"> <i class="bi bi-plus-circle-fill"></i></a>
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
                            <a href="{{route('cart.add',$dish->id)}}"> <i class="bi bi-plus-circle-fill"></i></a>
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

  </main><!-- End #main -->
  <div class="container1">
    <div class="card-cart orange-bg">
      <a href="{{route('cart.show')}}">Xem giỏ hàng (@php // Lấy thông tin giỏ hàng từ Session
          $cartItems = Cart::Content();
          $totalItemsInSession = 0;
          $desiredSession = session()->get('table'); // Lấy session mong muốn

          foreach ($cartItems as $item) {
            if ($item->options->get('session') == $desiredSession) {
                $totalItemsInSession += $item->qty; 
          }
        }

        echo $totalItemsInSession;
 @endphp)</a>
    </div>
    <div class="card-cart green-bg">
      <a href="{{route('cart.order')}}">Món đã gọi</a>
    </div>
  </div>
  

  @endsection