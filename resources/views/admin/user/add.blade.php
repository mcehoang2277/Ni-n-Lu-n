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
      <h1>THÊM NHÂN VIÊN</h1>
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
              <form class="row g-3" action="{{route('user.add')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label" >Tên</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control"  value="{{ old('name') }}">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label" >Email</label>
                  <div class="col-sm-10">
                    <input type="email" name="email" class="form-control"  value="{{ old('email') }}">
                  </div>
                </div> 
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label" >Phone</label>
                  <div class="col-sm-10">
                    <input type="number" name="phone" class="form-control"  value="{{ old('phone') }}">
                  </div>
                </div> 
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label" >Ngày sinh</label>
                  <div class="col-sm-10">
                    <input type="date" name="date" class="form-control"  value="{{ old('date') }}">
                  </div>
                </div>
    
                <div class="row mb-3">
                  <label for="inputNumber"  class="col-sm-2 col-form-label">Ảnh</label>
                  <div class="col-sm-10">
                    <input type="file" name="file" class="form-control" required>
                  </div>
                </div>
                <div class="row mb-3">
                <label for="inputNumber"  class="col-sm-2 col-form-label">Quyền</label>
                <div class="col-sm-10">
                    <div class="select-as-input">
                        <select class="form-select form-select-sm" aria-label="Small select example" name="role">
                
                <option value="1">Admin</option>
                <option value="2">Nhân Viên</option>
                
            </select>
            
        </div>
    </div>
</div>
                <div class="row mb-3 ">
                  
                  <div class="col-sm-10 text-center">
                    <button type="submit" class="btn btn-primary">Thêm nhân viên</button>
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
                    <th scope="col">Ảnh</th>
                    <th scope="col">Tên nhân viên</th>
                    <th scope="col">Mã NV</th>
                    <th scope="col">Tuỳ chọn</th>
                  </tr>
                </thead>
                <tbody>
                @php
                $t=1;
                @endphp
                  @foreach($user as $item)
                  <tr>
                    <th scope="row">{{$t++}}</th>
                    <!-- <td><img src="{{asset($item->img)}}" alt="" style="max-width: 100px; height: 100PX;"></td> -->
                    <td><img src="{{asset($item->img)}}" alt="" style="max-width: 100px; height: 100PX;"></td>
                    

                    <td>{{ $item->name}}</td>
                    <td>{{ $item->code}}</td>
                    <td>
                    <a href="{{route('user.detail',$item->id)}}" class="badge text-bg-primary rounded-pill"><i class="bi bi-eye-fill text-light"></i></a>
                    <a href="{{route('user.edit',$item->id)}}" class="badge text-bg-primary rounded-pill"><i
                        class="bi bi-pencil-square text-light"></i></a>
                <a href="{{route('user.delete',$item->id)}}" class="badge text-bg-primary rounded-pill"><i
                        class="bi bi-trash  text-light"></i></a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{ $user->links('pagination::bootstrap-4') }}
            </div>
          </div>

        </div>
      </div>
    </section>
    
  </main>
  @endsection