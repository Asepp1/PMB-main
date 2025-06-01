$('.my_position').sortable({
    stop: function() {
        var selectedData = new Array();
        $('.my_position>tr').each(function() {
            selectedData.push($(this).attr('id'));
        });
        updateOrder(selectedData);
    }
});

function updateOrder(data) {
    $.ajax({
        url: 'ajax.php',
        type: 'post',
        data: {
            position: data
        },
        success: function() {
            alert('Perubahan Posisi Menu Berhasil')
            document.location='menu.php';
        }
    });
}