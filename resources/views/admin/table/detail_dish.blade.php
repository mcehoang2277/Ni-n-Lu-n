@extends('layouts.admin')

@section('client')
<main id="main" class="main">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <img src="{{asset('assets/img/card.jpg')}}" class="card-img-top" alt="...">
                    <a href="" class="card-body mb-0 bg-success text-light">
                        <h5 class="card-title text-center text-light">BÀN {{$soban}}</h5>

                    </a>
                </div>
            </div>
            <div class="col-6">
                <div class="card mb-3">
                <div class="pagetitle">
      <div class="col-12">
        <h6>CHI TIẾT MÓN ĂN</h6>
    </div>
    </div><!-- End Page Title -->
    <form class="row g-3" action="{{route('table.CreateDish', [$id,$soban])}}" method="POST" enctype="multipart/form-data">
    @csrf
    <section class="section dashboard">
      <div class="row">
        
        <div class="col-12">
          <div class="card mb-3">
            <div class="row g-0 mb-2">
              <div class="col-md-4">
                <img src="{{ asset($dish->img) }}" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h6 class="card-title ">{{$dish->name}}</h6>
                  <div class="d-flex justify-content-between">
                    <span>{{ number_format($dish->price, 0, '.', '.') }} ₫</span> 
                    
                  </div>
                  <div class="d-flex  mt-2">
                    <div class="row">
                        <div class="col-8">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">SL</span>
                                <input type="number" name="qty" class="form-control" placeholder="Số lượng" aria-label="Username" aria-describedby="basic-addon1" min="1" value="1">

                              </div>
                        </div>
                       <div class="col-4 btn-warning" ><button type="submit" class="btn-warning btn d-block">Thêm món</button></div>
                        
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
       

      </div>
      
    </section>
</form>
                    
                </div>
            </div>
        </div>



    </main>
@endsection
