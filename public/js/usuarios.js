$(document).ready(function () {
    $.ajaxPrefilter(function (a, e, t) {
        var n = $('meta[name="csrf-token"]').attr("content");
        if (n)
            return t.setRequestHeader("X-CSRF-TOKEN", n);
    }),
            $("#usuarios").addClass("active"), $(function () {
        $("#users-table").DataTable({retrieve: !0, processing: !0,
            serverSide: !0,
            ajax: {url: "usuarios",
                type: "POST"},
            columns: [{data: "id", name: "id"}, {
                    data: "name", name: "name"}, {
                    data: "last_name", name: "last_name"}, {
                    data: "telefono", name: "telefono",
                    className: "col-xs-1"}, {
                    data: "email", name: "email", className: "col-xs-1"}, {
                    data: "fecha_nac", name: "fecha_nac", className: "col-xs-1"}, {
                    data: "id", className: "col-xs-2",
                    render: function () {
                        return"<button class='vermas btn btn-sm btn-info ' >Ver Mas</button><span> </span>"
                    }}],
            language: {url: "/spanish"}, oAria: {sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                sSortDescending: ": Activar para ordenar la columna de manera descendente"}})
    }),
            $("#users-table").on("click", ".borrarbtn", function (a) {
        var e =
                $("#users-table").DataTable();
        a.preventDefault();
        var t = $(this).parents("tr")[0], n = e.row(t).data(), r = n.id;
        $.ajax({type: "post", url: "eliminarusuario/" + r, data: {id: r},
            error: function (a, e) {
                alert(a, e);
            },
            success: function (a) {
                e.draw();
                var t = {icon: "gymzone", title: "Administración", cls: "eliminado", speed: 200, timeout: 3e3};
                $.Growl.show(a, t);
            }, complete: {}});
    }), $("#users-table").on("click", ".vermas",
            function (a) {
                var e = $("#users-table").DataTable();
                a.preventDefault();
                var t = $(this).parents("tr")[0], n = e.row(t).data(), r = n.id;
                $.ajax({type: "post", url: "get_usuario/" + r, data: {id: r},
                    error: function (a, e) {
                        alert("Se ha producido el siguiente error: " + e);
                    },
                    success: function (a) {
                        $("#modalusuarios").html(a);
                    },
                    complete: function () {
                        $("#modalusuarios").modal("show");
                    }});
            })
});
//# sourceMappingURL=usuarios.js.map
