function verificar() {
    
    var logina = $("#usuario").val();
    var clavea = $("#contrasenia").val();
    jQuery.ajax({
        url: "../ajax/usuario.php?op=5",
        type: "POST",
        dataType: "json",
        data: { "logina": logina, "clavea": clavea }
    }).done(function (data) {
        if (data != 0) {
            $(location).attr("href", "escritorio.php");
        } else {
            Swal.fire({
                title: 'Usuario o Contraseña incorrectos',
                icon: 'warning'
            });
        }
    }).fail(function (jqXHR, textStatus, errorThrown) {
        console.error("error:", textStatus, errorThrown);
        console.error("Respuesta del servidor:", jqXHR.responseText);
    });
}
