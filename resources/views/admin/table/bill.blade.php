@php
use Carbon\Carbon;
@endphp
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hóa đơn</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container">
    <div class="row">
        <div class="col-3">

        </div>
        <div class="col-6 mt-3">
        <div class="row">
      <div class="col-12">
        <h1 class="text-center">QUÁN ĂN ABC</h1>
        <p class="text-center">ĐC: Số 8, Hồ Sỹ Dương, Hưng Bình, Thành Phố Vinh</p>
        <p class="text-center">ĐT: 0943184154</p>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <h2 class="text-center">HÓA ĐƠN BÁN HÀNG</h2>
      </div>
    </div>

    <div class="row">
      <div class="col-6">
        <p>Ngày: @php $currentDateTime = Carbon::now();
          echo  $onlyDate = $currentDateTime->format('d/m/Y');    @endphp</p>
        <p>Số: {{$number}}</p>
      </div>
      <div class="col-6">
        <p>Thu ngân: Administrator</p>
        <p>In lúc: {{$time_out}}</p>
      </div>
    </div>

    <div class="row">
      <div class="col-6">
        <p>Giờ vào: {{$infoname}}</p>
        <p>Giờ ra: {{$time_out}}</p>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Mặt hàng</th>
              <th>Số lượng</th>
              <th>Giá</th>
              <th>Tổng tiền</th>
            </tr>
          </thead>
          <tbody>
            @php 
                $total = 0; 
            @endphp
            @foreach($bill as $item)
            <tr>
              <td>{{App\Models\Dish::find($item->dish)->name}}</td>
              <td>{{$item->qty}}</td>
              <td>{{number_format(App\Models\Dish::find($item->dish)->price, 0, '.', '.') }} ₫</td>
              <td>{{ number_format(App\Models\Dish::find($item->dish)->price*$item->qty, 0, '.', '.') }} ₫</td>
            </tr>
            @php 
                $total += App\Models\Dish::find($item->dish)->price*$item->qty;
                @endphp
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th colspan="3">TỔNG CỘNG</th>
              <th>{{ number_format($total, 0, '.', '.') }} ₫</th>
            </tr>
            <tr>
              <th colspan="3">Khuyến mãi</th>
              <th>Không</th>
            </tr>
            <tr>
              <th colspan="3">Thành tiền</th>
              <th>{{ number_format($total, 0, '.', '.') }} ₫</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <p class="text-center">Cám ơn quý khách đã ủng hộ!</p>
      </div>
    </div>
    <button type="button" class="btn btn-primary mt-2 text-center w-100" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Xác nhận hóa đơn
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Xác nhận thanh toán</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Bạn có muốn thanh toán hóa đơn
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Hủy</button>
                                    <a href="{{route('table.savebill',[$id,$number])}}" type="button" class="btn btn-primary">Đồng ý Thanh Toán</a>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
        <div class="col-3">
            
        </div>
    </div>
   
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
