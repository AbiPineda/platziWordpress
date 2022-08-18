/* Para que identifique que todo sera jquery -> funtion($) */
(function($) {
    console.log('Hola WordPress')
    $("select").change(function() {
        $.ajax({
            url: pg.ajaxurl,
            method: "POST",
            data: {
                "action": "pgFiltroProductos",
                "categoria": $(this).find(':selected').val()
            },
            beforeSend: function() {
                $("#resultados-productos").html("Cargando...")
            },
            success: function(data) {
                let html = ''
                data.forEach(item => {
                    html += `
                        <div class="col-4 my-3">
                            <figure>${item.imagen}</figure>
                            <h4 class="text-center my-2">
                                <a href="${item.link}">${item.titulo}</a>
                            </h4>
                        </div>
                    `
                })

                $("#resultados-productos").html(html)
            },
            error: function(error) {
                console.error(error)
            }
        })
    })
})(jQuery)