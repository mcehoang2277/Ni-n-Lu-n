@extends('layouts.admin')
@section('client')
<main id="main" class="main">
@if(session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
  @endif
    <div class="pagetitle">
      <h1>SỬA DANH MỤC MÓN ĂN</h1>
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
        <div class="col-lg-12 ">

          <div class="card py-3">
            <div class="card-body py-3">
              

              <!-- General Form Elements -->
              <form class="row g-3" action="{{route('dish.update',$dish->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label"  required>Tên</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" value="{{$dish->name}}" required >
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label"  required>Tên</label>
                  <div class="col-sm-10">
                    <input type="text" name="price" class="form-control" value="{{$dish->price}}" required >
                  </div>
                </div>    
                <div class="row mb-3">
                  <label for="inputNumber"  class="col-sm-2 col-form-label">Ảnh</label>
                  <div class="col-sm-10">
                    <input type="file" name="file" class="form-control" >
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Danh mục</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="category">
                        <option value="">Chọn danh mục</option>
                         @foreach($category as $item1)
                            <option value="{{$item1->id}}">{{$item1->name}}</option>
                         @endforeach
                    </select>
                  </div>
                </div>
                <div class="row mb-3 ">
                  
                  <div class="col-sm-10 text-center">
                    <button type="submit" class="btn btn-primary">Cập nhật danh mục</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>

        
      </div>
    </section>
    
  </main>
  @endsection