@extends('layouts.admin')
@section('client')
<main id="main" class="main">
@if(session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
  @endif
    <div class="pagetitle">
      <h1>THÊM DANH MỤC MÓN ĂN</h1>
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
              <form class="row g-3" action="{{route('category.add')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label" required>Tên</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" required >
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
                    <button type="submit" class="btn btn-primary">Thêm danh mục</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>

        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Danh sách danh mục</h5>

              <!-- Advanced Form Elements -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên danh mục</th>
                    <th scope="col">Ghi chú</th>
                    <th scope="col">Ngày tạo</th>
                    <th scope="col">Tuỳ chọn</th>
                  </tr>
                </thead>
                <tbody>
                @php
                $t=1;
                @endphp
                  @foreach($category as $item)
                  <tr>
                    <th scope="row">{{$t++}}</th>
                    <td><img src="{{asset($item->img)}}" alt="" style="max-width: 100px; height: 100PX;"></td>
                    <td>{{$item->name}}</td>
                    

                    <td>{{$item->created_at->format('d/m/Y')}}</td>
                    <td><a href="{{route('category.edit',$item->id)}}" class="badge text-bg-primary rounded-pill"><i
                        class="bi bi-pencil-square"></i></a>
                <a href="{{route('category.delete',$item->id)}}" class="badge text-bg-primary rounded-pill"><i
                        class="bi bi-trash"></i></a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{ $category->links('pagination::bootstrap-4') }}
            </div>
          </div>

        </div>
      </div>
    </section>
    
  </main>
  @endsection