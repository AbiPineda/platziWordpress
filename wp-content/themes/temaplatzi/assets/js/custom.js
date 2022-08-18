/* Para que identifique que todo sera jquery -> funtion($) */
(function ($) {
  console.log("Hola WordPress");
  $("select").change(function () {
    $.ajax({
      url: pg.ajaxurl,
      method: "POST",
      data: {
        action: "pgFiltroProductos",
        categoria: $(this).find(":selected").val(),
      },
      beforeSend: function () {
        $("#resultados-productos").html("Cargando...");
      },
      success: function (data) {
        let html = "";
        data.forEach((item) => {
          html += `
                        <div class="col-4 my-3">
                            <figure>${item.imagen}</figure>
                            <h4 class="text-center my-2">
                                <a href="${item.link}">${item.titulo}</a>
                            </h4>
                        </div>
                    `;
        });

        $("#resultados-productos").html(html);
      },
      error: function (error) {
        console.error(error);
      },
    });
  });
  $(document).ready(function(){
    $.ajax({
        url: pg.apiurl+"novedades/3",
        method: "GET",
        beforeSend: function(){
            $("#resultado-novedades").html("Cargando...");
        },
        success:function(data){
            let html = "";
            data.forEach(item => {
                html += `<div class="col-md-4 col-12 my-3">
                    <figure>${item.imagen}</figure>
                    <h4 class="my-2">
                        <a href="${item.link}">${item.titulo}</a>
                    </h4>
                </div>`;
            })
            $("#resultado-novedades").html(html);
        },
        error: function(error){
            console.log(error);
        }
    });
});
})(jQuery);
