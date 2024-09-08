<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thẻ nhân viên</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-4">

            </div>
            <div class="col-4">
            <div class="container mt-5">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center bg-warning">
        <img src="{{asset('assets/img/db.png')}}" alt="Logo công ty" width="80" height="60">
        <h1 class="card-title text-light">ABC</h1>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-4 text-center">
            <img src="{{asset('assets/img/111.png')}}" alt="Ảnh nhân viên" class="img-thumbnail rounded-circle mx-auto d-block">
          </div>
          <div class="col-md-8">
            <div class="details">
              <h5>{{$user->name}}</h5>
              @if($user->role == 1)
              <p>Admin</p>
              @endif
              @if($user->role == 2)
              <p>Nhân viên</p>
              @endif
              <p>Phone: 0{{$user->phone}}</p>
              <p>NS: {{$user->date}}</p>
              <p>Email: {{$user->email}}</p>
              <p>MNV: {{$user->code}}</p>
              <p>Ngày làm thẻ: {{$user->created_at->format('d/m/Y')}}</p>
            </div>
          </div>
        </div>
        <div class="text-center mt-3">
          <p> <b>Thành Phố Vinh, Nghệ An</b> </p>
          
        </div>
        <a href="{{route('user.edit',$user->id)}}" type="button" class="btn btn-primary w-100">Sửa thông tin</a>
      </div>
    </div>
  </div>

                </div>
                <div class="col-4">
                
                </div>
        </div>
    </div>
  
</body>
</html>
