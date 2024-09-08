@extends('layouts.admin')
@section('client')
<main id="main" class="main">
@if(session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
  @endif
    <div class="pagetitle">
      <h1>THÊM MÓN ĂN</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Elements</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row ">
        <div class="col-lg-6 ">

          <div class="card py-3">
            <div class="card-body py-3">
              

              <!-- General Form Elements -->
              <form class="row g-3" action="{{route('dish.add')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label" required>Tên</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" required >
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label" required>Giá</label>
                  <div class="col-sm-10">
                    <input type="number" name="price" class="form-control" required >
                  </div>
                </div> 
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Danh mục</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="category">
                         @foreach($category as $item1)
                            <option value="{{$item1->id}}">{{$item1->name}}</option>
                         @endforeach
                    </select>
                  </div>
                </div>
    
                <div class="row mb-3">
                  <label for="inputNumber"  class="col-sm-2 col-form-label">Ảnh</label>
                  <div class="col-sm-10">
                    <input type="file" name="file" class="form-control" required>
                  </div>
                </div>
                <div class="row mb-3 ">
                  
                  <div class="col-sm-10 text-center">
                    <button type="submit" class="btn btn-primary">Thêm món ăn</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>

        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Danh sách món ăn</h5>
              <div class="pagetitle">
      <div class="col-12">
        <div>
        <div class="form-floating mb-3 search-container">
            <form action="#" method="GET">
            @csrf
                <div class="input-group">
                    <input type="text" class="form-control" name="q" placeholder="Nhập tên món ăn cần tìm!" aria-label="Nhập tên món ăn cần tìm!" aria-describedby="search-addon">
                    <button type="submit" class="btn btn-primary" id="search-addon">Tìm kiếm</button>
                </div>
            </form>
        </div>

              
        </div>
    </div>
              <!-- Advanced Form Elements -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Tên món</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Tuỳ chọn</th>
                  </tr>
                </thead>
                <tbody>
                @php
                $t=1;
                @endphp
                  @foreach($dish as $item)
                  <tr>
                    <th scope="row">{{$t++}}</th>
                    <td><img src="{{asset($item->img)}}" alt="" style="max-width: 100px; height: 100PX;"></td>
                    <td>{{$item->name}}</td>
                    

                    <td>{{ number_format($item->price, 0, '.', '.') }} ₫</td>
                    <td><a href="{{route('dish.edit',$item->id)}}" class="badge text-bg-primary rounded-pill"><i
                        class="bi bi-pencil-square"></i></a>
                     <a href="{{route('dish.delete',$item->id)}}" class="badge text-bg-primary rounded-pill"><i
                        class="bi bi-trash"></i></a>
                        <a href="{{route('dish.status',$item->id)}}" class="badge text-bg-primary rounded-pill"><i class="bi bi-arrow-down-up"></i></a>
                      </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{ $dish->links('pagination::bootstrap-4') }}
            </div>
          </div>

        </div>
      </div>
    </section>
    
  </main>
  @endsection