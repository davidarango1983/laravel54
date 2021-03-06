$(document).ready(function() {
    $.ajaxPrefilter(function(a, t, e) {
        var n = $('meta[name="csrf-token"]').attr("content");
        if (n)
            return e.setRequestHeader("X-CSRF-TOKEN", n)
    }),
    $("#noticias").addClass("active"),
    $(function() {
        $("#noticias-table").DataTable({
            retrieve: !0,
            processing: !0,
            serverSide: !0,
            ajax: {
                url: "noticias",
                type: "POST"
            },
            columns: [{
                data: "id",
                name: "id",
                className: "col-xs-1"
            }, {
                data: "title",
                name: "title",
                className: "col-xs-1"
            }, {
                data: "content",
                name: "content",
                className: "col-xs-3",
                render: function(a) {
                    return a.substring(0, 60) + "..."
                }
            }, {
                data: "publicado",
                name: "publicado",
                render: function() {
                    return "1" === arguments[0] ? "SI" : "NO"
                },
                className: "col-xs-1"
            }, {
                data: "urlimg",
                name: "urlimg",
                className: "col-xs-1"
            }, {
                data: "id",
                className: "col-xs-2",
                render: function() {
                    return "<a href='editarnoticia/" + arguments[0] + "' class='editar btn btn-sm btn-warning ' >Editar</a><span> \n\
                                    </span><button class='borrarbtn btn btn-xs btn-danger'>Borrar</button>"
                }
            }],
            language: {
                url: "/spanish"
            },
            oAria: {
                sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                sSortDescending: ": Activar para ordenar la columna de manera descendente"
            }
        })
    }),
    $("#noticias-table").on("click", ".borrarbtn", function(a) {
        var t = $("#noticias-table").DataTable();
        a.preventDefault();
        var e = $(this).parents("tr")[0]
          , n = t.row(e).data()
          , r = n.id;
        $.ajax({
            type: "post",
            url: "eliminarnoticia/" + r,
            data: {
                id: r
            },
            error: function(a, t) {
                alert(a, t)
            },
            success: function(a) {
                t.draw();
                var e = {
                    icon: "growlicon_heart",
                    title: "Administración",
                    cls: "eliminado",
                    speed: 200,
                    timeout: 3e3
                };
                $.Growl.show(a, e)
            },
            complete: {}
        })
    })
});
//# sourceMappingURL=noticias.js.map

//# sourceMappingURL=noticias.js.map
