$(document).ready(function () {
    $.ajaxPrefilter(function (a, e, r) {
        var t = $('meta[name="csrf-token"]').attr("content");
        if (t)
            return r.setRequestHeader("X-CSRF-TOKEN", t)
    }),
            $("#fecha").dateDropper({format: "Y-m-d", lang: "es"}),
            $("#profesores").addClass("active"), $(function () {
        $("#profesor-table").DataTable({
            retrieve: !0, processing: !0, serverSide: !0,
            ajax: {url: "profesores", type: "POST"}, columns: [{
                    data: "id", name: "id"}, {data: "dni", name: "dni"}, {data: "name",
                    name: "name", className: "col-xs-1"}, {data: "last_name",
                    name: "last_name", className: "col-xs-1"}, {data: "telefono",
                    name: "telefono", className: "col-xs-1"}, {data: "email",
                    name: "email", className: "col-xs-1"}, {data: "fecha_nac",
                    name: "fecha_nac", className: "col-xs-1"}, {data: "id",
                    className: "col-xs-2", render: function () {
                        return"<a href='editarprofesor/" + arguments[0] + "' class='editar btn btn-sm btn-warning ' >Editar</a><span> </span><button class='borrarbtn btn btn-xs btn-danger'>Borrar</button>"
                    }}],
            language: {url: "/spanish"}, oAria: {
                sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                sSortDescending: ": Activar para ordenar la columna de manera descendente"}})
    }),
            $("#profesor-table").on("click", ".borrarbtn",
            function (a) {
                var e = $("#profesor-table").DataTable();
                a.preventDefault();
                var r = $(this).parents("tr")[0], t = e.row(r).data(), n = t.id;
                $.ajax({type: "post", url: "eliminarprofesor/" + n, data: {id: n},
                    error: function (a, e) {
                        $.Growl.show(e)
                    },
                    success: function (a) {
                        e.draw();
                        var r = {icon: "gymzone", title: "Mensaje de administración:",
                            cls: "eliminado", speed: 200, timeout: 1e4};
                        $.Growl.show(a, r)
                    }, complete: {}})
            }),
            $("#profesor-table").on("click", ".vermas", function (a) {
        var e =
                $("#profesor-table").DataTable();
        a.preventDefault();
        var r = $(this).parents("tr")[0], t = e.row(r).data(), n = t.id;
        $.ajax({type: "post", url: "get_profesor/" + n, data: {id: n},
            error: function (a, e) {
                alert("Se ha producido el siguiente error: " + e)
            },
            success: function (a) {
                $("#modalprofesor").html(a)
            },
            complete: function () {
                $("#modalprofesor").modal("show")
            }})
    })
});