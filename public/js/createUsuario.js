function inicializar() {
    $("#btnEnviar").click(doClickEnviar);
}

function doClickEnviar(e) {
    if ($("#txtPassword").val() == $("#txtConfirmPassword").val()){
        $("#frmCrearUsuario").submit();
    } else {
        //decirle algo al usuario
    }
}

$(function() {
    inicializar();
});