// public/js/custom.js
$(document).ready(function() {
    fetchAndDisplayData();

    function fetchAndDisplayData() {
        
        $.ajax({
            url: '',
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
        var dataList = $('#data-list');
        dataList.empty(); // Xóa dữ liệu cũ trước khi thêm dữ liệu mới

        $.each(data, function(index, item) {
            dataList.append('<li>' + item.mail + '</li>'); // Thêm dữ liệu mới vào danh sách
        });
    }

    setInterval(fetchAndDisplayData, 5000); // Thực hiện fetch dữ liệu mỗi 5 giây
});
