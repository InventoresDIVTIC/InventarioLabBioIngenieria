window.onload = function() {

    var active_id = null;
    var active_name = null;

    $("#activos").on("click", "tr", function(e) {
        if ($(this).hasClass('row-selected')) {
            cleanTr()
            $('#select-active').attr("disabled", true);
            $('#select-active').addClass('disabled');
        } else if ($(this).hasClass('title-table')) {
            cleanTr()
        } else {
            cleanTr()
            $(this).addClass('row-selected')
            active_id = $(this).find("td:eq(0)").text();
            active_name = $(this).find("td:eq(1)").text();
            $('#select-active').attr("disabled", false);
            $('#select-active').removeClass('disabled');
        }
    })

    $('#select-active').click(function(e) {
            $('#active_id').val(active_id);
            $('#type').val(active_name);
    }) 

    function cleanTr() {
        $('.row-selected').each(function(index, element) {
            $(element).removeClass('row-selected')
        })
    }
}

