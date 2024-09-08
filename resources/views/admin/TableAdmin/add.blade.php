@extends('layouts.admin')
@section('client')
<main id="main" class="main">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
@if(session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
  @endif
    <div class="pagetitle">
      <h1>THÊM BÀN ĂN</h1>
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
              <form class="row g-3" action="{{route('TableAdmin.add')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label" >Số bàn</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control"  >
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
                    <button type="submit" class="btn btn-primary">Thêm bàn</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>

        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Danh sách bàn ăn</h5>

              <!-- Advanced Form Elements -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên bàn</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Ngày tạo</th>
                    <!-- <th scope="col">Tuỳ chọn</th> -->
                  </tr>
                </thead>
                <tbody>
                @php
                $t=1;
                @endphp
                  @foreach($table as $item)
                  <tr>
                    <th scope="row">{{$t++}}</th>
                    
                    <td>Bàn {{$item->name}}</td>
                    <td> @if($item->status == 1)  
                        <span class="badge text-bg-success">Bàn trống</span>
                    @else
                        <span class="badge text-bg-primary">Có khách</span>
                    @endif</td>

                    <td>{{$item->created_at->format('d/m/Y')}}</td>
                    <!-- <td><a href="{{route('category.edit',$item->id)}}" class="badge text-bg-primary rounded-pill"><i
                        class="bi bi-pencil-square"></i></a>
                <a href="{{route('category.delete',$item->id)}}" class="badge text-bg-primary rounded-pill"><i
                        class="bi bi-trash"></i></a></td> -->
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{ $table->links('pagination::bootstrap-4') }}
            </div>
          </div>

        </div>
      </div>
    </section>
    
  </main>
  @endsection