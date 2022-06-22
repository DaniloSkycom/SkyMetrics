$(document).ready(function() {
    $('.select2').select2();
    $(".calendar").flatpickr();
});

function loader_ajax(button, loader, type) {
    if (type == 'send') {
        $(button).prop('disabled', true);
        $(loader).addClass('spinner-border spinner-border-sm');
    } else {
        $(button).prop('disabled', false);
        $(loader).removeClass('spinner-border spinner-border-sm');
    }
}

function toast(message, type, position) {
    var Toast = Swal.mixin({
        toast: true,
        position: position,
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        onOpen: function(toast) {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast.fire({
        icon: type,
        title: message
    });
}

function editSubCategoria(categoria_id, id, nombre) {
    $("#idsub").empty();
    $("#nombresub").empty();
    $("#idsub").val(id);
    $("#categoria").val(categoria_id).trigger('change');
    $("#nombresub").val(nombre);
}

function editCategoria(nombre, id) {
    $("#id").empty();
    $("#nombre").empty();
    $("#id").val(id);
    $("#nombre").val(nombre);
}

function saveCategoria() {
    if ($("#form_categoria").valid()) {
        $.ajax({
                type: "POST",
                url: "/admin/guardar_categoria",
                beforeSend: function() {
                    $("#loadercate").addClass('fa fa-refresh fa-spin');
                },
                data: $("#form_categoria").serialize()
            })
            .done(function(response) {
                $("#loadercate").removeClass('fa fa-refresh fa-spin');
                Swal.fire({
                    icon: response.icon,
                    title: response.resultado,
                    text: response.msj,
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    window.location.href = "/admin/categorias-y-subcategorias";
                });
            })
    }
}

function saveSubCategoria() {
    if ($("#form_subcategoria").valid()) {
        $.ajax({
                type: "POST",
                url: "/admin/guardar_subcategoria",
                beforeSend: function() {
                    $("#loadersub").addClass('fa fa-refresh fa-spin');
                },
                data: $("#form_subcategoria").serialize()
            })
            .done(function(response) {
                $("#loadersub").removeClass('fa fa-refresh fa-spin');
                Swal.fire({
                    icon: response.icon,
                    title: response.resultado,
                    text: response.msj,
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    window.location.href = "/admin/categorias-y-subcategorias";
                });
            })
    }
}

function subcategoria(tipo, selecciono) {
    $("#showSubCategoria").empty();
    var id = $("#categoria_id").val();
    var datos;
    if (tipo == 'edit' && selecciono != '') {
        datos = {
            'id': id,
            'selecciono': selecciono
        };
    } else {
        datos = { 'id': id };
    }
    $.ajax({
        url: "/admin/subcategorias",
        type: 'GET',
        data: datos,
        beforeSend: function() {
            $("#loaderSubCategoria").show();
        },
        success: function(data) {
            $("#showSubCategoria").html(data);
            $("#loaderSubCategoria").hide();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            $("#loaderSubCategoria").hide();
            alert(textStatus);
        }
    });
}

function SaveGlobal(loader, button, form, ruta, metodo) {
    if ($(form).valid()) {
        $.ajax({
            url: ruta,
            type: metodo,
            data: $(form).serialize(),
            beforeSend: function() {
                loader_ajax(button, loader, 'send');
            },
            success: function(data) {
                loader_ajax(button, loader, 'return');
                toast(data.mensaje, data.tipo, 'top-right');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                loader_ajax(button, loader, 'return');
                alert(textStatus.mensaje);
            }
        });
    }
}

function ModalPerfil(valor) {
    if (valor == 'S') {
        $("#btnS").show();
        $("#btnU").hide();
        $(".modal-title").html('Nuevo Perfil');
        $('#formMattoPerfil')[0].reset();
        $('.ql-editor').html("");
        $("#aseguradora_id").val("").trigger('change');
    } else {
        $("#btnU").show();
        $("#btnS").hide();
        $(".modal-title").html('Editar Perfil');
    }
    $("#ModalPerfil").modal('show');
}


function saveChangePassword() {
    if ($("#formEditarClave").valid()) {
        $.ajax({
                type: "POST",
                url: "/admin/cambiar_clave",
                beforeSend: function() {
                    $("#loaderPass").addClass('fa fa-refresh fa-spin');
                },
                data: $("#formEditarClave").serialize()
            })
            .done(function(response) {
                $("#loaderPass").removeClass('fa fa-refresh fa-spin');
                Swal.fire({
                    icon: response.tipo,
                    text: response.mensaje,
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    if (response.tipo == 'success') {
                        $('#formEditarClave')[0].reset();
                    }
                });
            })
    }
}

function municipio(valor, tipo = '', municipio = '') {
    $("#showMinicipio").empty();
    var token = $('meta[name="csrf-token"]').attr('content');
    if (tipo == 'pre') {
        var id = valor;
        $('#municipio_id').val(municipio);
    } else {
        var id = valor.value;
    }
    $.ajax({
        url: "/admin/getMunicipio",
        type: 'POST',
        data: { id: id, '_token': token },
        beforeSend: function() {
            $("#loaderMunicipio").show();
            $("#loaderMunicipio").html("Buscando ..");
        },
        success: function(data) {
            $("#showMinicipio").html(data);
            $("#loaderMunicipio").hide();
            if (tipo == 'pre') {
                $('#municipio_id').val(municipio);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            $("#loader-avisame").hide();
            alert(textStatus);
        }
    });
}