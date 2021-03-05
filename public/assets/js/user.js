var user = function () {

    var formCRUD    = $('#formCRUD');
    var urlsave     = "user/save";
    var urlupdate   = "user/update";
    var type        = "POST";
    var table_id    = $('#dtTableuser');
    var mCRUD       = $('#mCRUDUSER');

    var setJQueryValidate = function(){
        formCRUD.validate({
            doNotHideMessage: true,
            errorElement: 'span',
            errorClass: 'help-block help-block-error',
            focusInvalid: true,
            ignoreTitle: true,
            messages : {
                required: "Este campo es requerido.",
                number : "Por favor ingrese solo números."
            },
            rules : {

            },
            invalidHandler : function (event, validator) {
            },
            errorPlacement: function (error, element) {
                var cont = $(element).parent('.input-group');

                error.appendTo(element.closest(".form-group"));
            },
            highlight: function (element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            success: function (element) {
                element.closest('.form-group').removeClass('has-error');
            },
            submitHandler: function (form) {

            },
            color: {
                required: true,
                minlength: 7,
            }
        });

        //formCRUD.validate();
    }

    var initDataTable = function(){

        var table = $('#dtTableuser');

        var oTable = table.dataTable({
            //destroy:true,
            "language": languageDataTablet,
            "loadingMessage": 'Cargando...',
             "ajax": {
               url:  "user/data",// ajax source
                "dataSrc": "list",
                beforeSend:function(){
                    $.LoadingOverlay("show");
                },complete:function(){
                    $.LoadingOverlay("hide");
                },
            }, 
            "createdRow": function ( row, data, index ) {
            },
            "columns": [
            { "data": "id", "title": "id", "visible": false, "orderable": true},
            { "data": "first_name", "title": "Nombre", "visible": true, "orderable": true },
            { "data": "last_name", "title": "Apellido", "visible": true, "orderable": true },
            { "data": "email", "title": "Email", "visible": true, "orderable": true },    
            { "data": "telephone", "title": "Teléfono", "visible": true, "orderable": true },
            { "data": "rol_name", "title": "Rol", "visible": true, "orderable": true }, 

        {
            "targets": -1,
            "data": null,
            "title": "Acción",
            "className" : "center",
            "width": "110px",
            "defaultContent": '<div class="text-center bt_dt">' +
            '<button " type="button" class="btn btn-success btn-xs edit" id="btEditar" title="Modificar">' +
            '<i class="fa fa-edit"></i>' +
            '</button>' +
            '<button " type="button" class="btn btn-danger btn-xs" id="btEliminar" title="Baja">' +
            '<i class="fa fa-trash"></i>' +
            '</button>' +
            '</div>',
           
        }
        ],
        columnDefs: [ {
        }],
        select: "single",
        buttons: [
            {
                extend: 'pdf',
                className: 'btn green btn-outline'
            },
            {
                extend: 'excel',
                className: 'btn yellow btn-outline '
            },
            {
                extend: 'csv',
                className: 'btn purple btn-outline '
            },
      
            {
                text: 'Recargar',
                className: 'btn default',
                action: function ( e, dt, node, config ) {
                    dt.clearPipeline().draw();
                }
            },
        ],
        responsive: false,
        "order": [
        ],
        "lengthMenu": [
        [5, 10, 15, 20, -1],
                [5, 10, 15, 20, 60] // change per page values here
                ],
                "pageLength": 10,
            });

       
        $('#table_tools > li > a.tool-action').on('click', function() {
            var action = $(this).attr('data-action');
            oTable.DataTable().button(action).trigger();
        });

        $('#dtTableuser tbody').on('click', '#btEditar, #btEliminar', function() {
            var data = oTable.DataTable().row($(this).parents('tr')).data();
         
            if(this.id == "btEditar"){
                $('#btGuardar').addClass('hide');
                $('#btUpdate').removeClass('hide');
                editar(data);

            }
            if(this.id == "btEliminar"){
                bootbox.dialog({
                    message: "Está seguro de eliminar el registro seleccionado?",
                    title: "Confirmación",
                    buttons: {
                        yes: {
                            label: "Si",
                            className: "btn-success",
                            callback: function() {
                                $.get("user/destroy?id="+data.id, function(response) {
                                    var table = $('table.dataTable').DataTable().clearPipeline().draw();
                                    table.ajax.reload();
                                });
                            }
                        },
                        no: {
                            label: "No",
                            className: "btn-danger",
                            callback: function() {
                              
                            }
                        }
                    }
                });
            }
        });

    }

    $('#btGuardar').on('click', function (e) {
        saveORupdate(formCRUD,urlsave,type,table_id,mCRUD);
    });

    $('#btUpdate').on('click', function (e) {
        saveORupdate(formCRUD,urlupdate,type,table_id,mCRUD);
    });

    var editar = function(data){
     var id = data.id;
        $.get("user/data?id=" + id, function(response) {
            PopulateForm("#formCRUD", response.list[0]);
           
            $('#id_hotel').val(response.list[0]['hotel_id']).trigger('change');
            
            $(mCRUD).modal('toggle');
        });
    }
//Este codigo servira para no guardarle el campo hotel_id al usuario huesped
   $('#role_id').on('change',function(){
        var slug =  $('select[name="role_id"] option:selected').attr("data-slug");
       $('#rol_name').val(slug);
    });


    return {

        init: function () {
            initDataTable();
            setJQueryValidate(formCRUD);

        }
    };
}();

jQuery(document).ready(function() {
    user.init();

    $('#btnAgregar').on('click', function (e) {
        $('#btGuardar').removeClass('hide');
        $('#btUpdate').addClass('hide');
        formReset($('#formCRUD'));
      
    });

    $('#btCancelar').on('click', function (e) {
        formReset($('#formCRUD'));
        $('#mCRUDROL').modal('toggle');
    });

});