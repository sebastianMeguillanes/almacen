
function verificar()
{
    var logina=$("#usuario").val();
    var clavea=$("#contrasenia").val();
    
    $.post("../ajax/usuario.php?op=5",
        {"logina":logina,"clavea":clavea},
        function(data)
            {
                console.log(data);
                if (data!=0)
                {
                    $(location).attr("href","escritorio.php");           
                }
                else
                {
                    Swal.fire({
                        title: 'Usuario o Contraseña incorrectos',
                        icon: 'warning',});
                }
            });
}
