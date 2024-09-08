<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
   img{
    width: 50%;
   }
   .text-title{
    font-size: 18px;
   }
</style>
<form class="row g-3" action="{{route('add.info',$id)}}" method="POST" enctype="multipart/form-data">
  @csrf
<body>
    <div class="container">
        <div class="row text-center mt-4">
            <div class="col-12 mb-2">
                <h3 class="text-center mb-2">KÍNH CHÀO QUÝ KHÁCH</h3>
            </div>
            <div class="col-12">
                <div class="text-center">
                    <img src="{{asset('assets/img/db.png')}}" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-12 mt-3 mb-3">
                <h4>Mỳ Cay ABC Xin Chào Bạn</h4>
            </div>
            <div class="col-12">
                <p class="text-title">Mời bạn nhập tên của mình để chúng tôi có thể phục vụ bạn tốt hơn</p>
            </div>
            <div class="col-12">
                <div>
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="floatingInput" placeholder="Nhập tên của bạn !">
                        <label for="floatingInput">Nhập tên của bạn !</label>
                      </div>
                      <button type="submit" class="btn btn-warning w-100 text-light" >Bắt đầu</button>
                </div>
            </div>
            <div class="col-12"></div>

            <div class="col-12"></div>
            
        </div>
    </div>

</body>
</form>
</html>