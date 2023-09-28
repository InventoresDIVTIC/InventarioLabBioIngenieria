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
    var model = null;
    var sublocation = null;
    $('tr').click(function(e) {
        if ($(this).hasClass('row-selected1')) {
            cleanTr()
            $('#select-active-prov').attr("disabled", true);
            $('#select-active-prov').addClass('disabled');
        } else if ($(this).hasClass('title-table-active-prov')) {
            cleanTr()
        } else {
            cleanTr()
            $(this).addClass('row-selected1')
            active_id = $(this).find("td:eq(0)").text();
            active_name = $(this).find("td:eq(1)").text();
            model = $(this).find("td:eq(2)").text();
            sublocation = $(this).find("td:eq(3)").text();
            $('#select-active-prov').attr("disabled", false);
            $('#select-active-prov').removeClass('disabled');
        }
    })

    $('#select-active-prov').click(function(e) {
            $('#active_id').val(active_id);
            $('#type').val(active_name);
            $('#model').val(model);
            $('#sublocation').val(sublocation);
            $('#select-proveedor').addClass('disabled');
    }) 

    function cleanTr() {
        $('.row-selected1').each(function(index, element) {
            $(element).removeClass('row-selected1')
        })
    }
    /// Nuevo Código ///

}