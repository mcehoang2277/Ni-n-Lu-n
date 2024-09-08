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
      <h1>DANH SÁCH HÓA ĐƠN</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Elements</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <div class="form-floating mb-3 search-container">
            <form action="#" method="GET">
            @csrf
                <div class="input-group">
                    <input type="text" class="form-control" name="q" placeholder="Nhập tên món ăn cần tìm!" aria-label="Nhập tên khách hàng." aria-describedby="search-addon">
                    <button type="submit" class="btn btn-primary" id="search-addon">Tìm kiếm</button>
                </div>
            </form>
        </div>
    <section class="section">
      <div class="row ">
        <div class="col-lg-12 ">

        <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Tên khách hàng</th>
      <th scope="col">Số bàn</th>
      <th scope="col">Mã số</th>
      <th scope="col">Thời gian</th>
      <th scope="col">Tùy chỉnh</th>
    </tr>
  </thead>
  <tbody>
    @php
        $t=1;
    @endphp
  @foreach($bill as $item)
    <tr> 
      <th scope="row">{{$t++}}</th>
      <td>{{$item->name}}</td>
      <td>{{$item->table}}</td>
      <td>{{$item->number}}</td>
      <td>{{$item->created_at->format('d/m/Y')}}</td>
      
      <td><a href="{{route('table.detail_bill',$item->number)}}" class="badge text-bg-primary rounded-pill"><i
                        class="bi bi-pencil-square"></i></a>
                <a href="" class="badge text-bg-primary rounded-pill"><i
                        class="bi bi-trash"></i></a></td>
      
    </tr>
    @endforeach
  </tbody>
</table>
{{ $bill->links('pagination::bootstrap-4') }}
        </div>

        
      </div>
    </section>
    
  </main>
  @endsection