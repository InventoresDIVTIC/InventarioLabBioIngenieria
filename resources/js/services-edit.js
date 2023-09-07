window.onload = function() {
    var supplier_id = null;
    var supplier_name = null;
    $('tr').click(function(e) {
        if ($(this).hasClass('row-selected')) {
            cleanTr()
            $('#select-proveedor').attr("disabled", true);
            $('#select-proveedor').addClass('disabled');
        } else if ($(this).hasClass('title-table-prov')) {
            cleanTr()
        } else {
            cleanTr()
            $(this).addClass('row-selected')
            supplier_id = $(this).find("td:eq(0)").text();
            supplier_name = $(this).find("td:eq(1)").text();
            $('#select-proveedor').attr("disabled", false);
            $('#select-proveedor').removeClass('disabled');
        }
    })

    $('#select-proveedor').click(function(e) {
            $('#supplier_id').val(supplier_id);
            $('#supplier_name').val(supplier_name);
            //if('#select-active-prov').
            $('#select-active-prov').addClass('disabled');
    }) 

    function cleanTr() {
        $('.row-selected').each(function(index, element) {
            $(element).removeClass('row-selected')
        })
    }

////////////////// ACTIVOS //////////////////////

    var active_id = null;
    var active_name = null;

    $('tr').click(function(e) {
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