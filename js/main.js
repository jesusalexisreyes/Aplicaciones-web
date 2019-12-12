
$(buscar_datos());
function buscar_datos(consulta) {
  $.ajax({
    url: 'app/buscar.php',
    type: 'POST',
    dataType: 'html',
    data: { consulta },
  })

    .done(function (respuesta) {
      $("#datos").html(respuesta);
    })
    .fail(function () {
      console.log("error");
    });


}





