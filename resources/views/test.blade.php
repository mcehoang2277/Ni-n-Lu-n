@extends('layouts.admin')

@section('client')
<main id="main" class="main">
    <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3" id="list-table">
        
    </div>
</main><!-- End #main -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<!-- ======= Footer ======= -->
<script>
    $(document).ready(function() {
        fetchAndDisplayData();

        function fetchAndDisplayData() {
            $.ajax({
                url: '/order/test/cap-nhat-mon-an/ajax',
                type: 'GET',
                success: function(response) {
                    displayData(response);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        }

        function displayData(data) {
            var dataList = $('#list-table');
            dataList.empty();

            $.each(data, function(index, item) {
                var bgColorClass;
                    if (item.status === 1) {
                         bgColorClass = 'bg-success';
                    } else if (item.status === 2) {
                        bgColorClass = 'bg-warning';
                    } else if (item.status === 3) {
                        bgColorClass = 'bg-info';
                    } else {
                        bgColorClass = ''; // Mặc định không có màu nền
                    }
                 dataList.append('<div class="col">' +
                '<div class="card">' +
                '<img src="{{asset("/assets/img/card.jpg")}}" class="card-img-top" alt="...">' +
                '<a href="/order/quan-ly/ban-an/' + item.id + '" class="card-body mb-0 ' + bgColorClass + ' text-light">' +
                '<h5 class="card-title text-center text-light">' + item.name + '</h5>' +
                '</a>' +
                '</div>' +
                '</div>');
            });
        }

        setInterval(fetchAndDisplayData, 3000);
    });
</script>
@endsection
