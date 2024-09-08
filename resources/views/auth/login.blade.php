<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Borel&family=Bricolage+Grotesque:opsz,wght@12..96,200;12..96,400&family=Calligraffitti&family=Cantora+One&family=Denk+One&family=Edu+SA+Beginner:wght@500&family=Kenia&family=Lato:wght@700&family=Mulish:wght@300&family=Open+Sans:ital,wght@0,300;1,600&family=Oswald&family=Pacifico&family=Paprika&family=Roboto:ital,wght@0,100;1,100&family=Ruthie&family=Sevillana&family=Shantell+Sans:wght@300&family=Signika:wght@300&family=Tilt+Warp&display=swap" rel="stylesheet">
    <title>Đăng nhập</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #141e30, #243b55);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Mulish', sans-serif !important;
            background-image: url('public/assets/img/anhnen.png'); /* Đặt đường dẫn ảnh nền tại đây */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: #146286 !important;
        }
        

        .container {
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            max-width: 400px;
            width: 100%;
            text-align: center;
        }



        .input-group {
            margin: 15px 0;
        }

        .input-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;

        }

        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .input-group button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .input-group button:hover {
            background-color: #0056b3;
        }

        .message {
            color: red;
            font-weight: bold;
            margin-top: 10px;
        }

        @media (max-width: 768px) {
            .container {
                max-width: 90%;
            }
        }
    </style>
</head>

<body>
    <div class="container bg-warning">
        <h2>Quán ăn ABC</h2>
        <div><img src="{{asset('assets/img/db.png')}}" alt="" class="img-fluid" style="max-width: 100px; margin: 15px 0px;"></div>
        <form method="POST" action="{{ route('login') }}">
        @csrf
            <div class="mb-3">

                <input type="email" class="form-control @error('email') is-invalid @enderror" id="formGroupExampleInput" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="mb-3">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Password" required autocomplete="current-password" name="password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="input-group">
                <button type="submit">Đăng nhập </button>
            </div>
        </form>
        <div class="message">
            <!-- Hiển thị thông báo lỗi ở đây nếu có -->
        </div>
    </div>
</body>

</html>