$(document).ready(function () {
    $.ajaxPrefilter(function (a, t, e) {
        var n = $('meta[name="csrf-token"]').attr("content");
        if (n)
            return e.setRequestHeader("X-CSRF-TOKEN", n)
    }),
            $("#tipos").addClass("active"), $(function () {
        $("#tipos-table").DataTable({retrieve: !0, processing: !0, serverSide: !0,
            ajax: {url: "listatipos", type: "POST"}, columns: [{data: "id", name: "id",
                    className: "col-xs-1"}, {data: "name", name: "name", className: "col-xs-1"}, {
                    data: "precio", name: "precio", className: "col-xs-1"}, {data: "duration",
                    name: "duration", className: "col-xs-1"}, {data: "id", className: "col-xs-2",
                    render: function () {
                        return"<a href='editartipo/" + arguments[0] + "' class='editar btn btn-sm btn-warning ' >Editar</a><span>\n\
                     </span><button class='borrarbtn btn btn-xs btn-danger'>Borrar</button>"
                    }}], language: {url: "/spanish"}})
    }),
            $("#tipos-table").on("click", ".borrarbtn", function (a) {
        var t = $("#tipos-table").DataTable();
        a.preventDefault();
        var e = $(this).parents("tr")[0], n = t.row(e).data(), r = n.id;
        $.ajax({type: "post", url: "eliminartipo/" + r, data: {id: r}, error: function (a, t) {
                $.Growl.show(t)
            }, success: function (a) {
                t.draw();
                var e = {icon: "gymzone", title: "Mensaje de administración:", cls: "eliminado", speed: 200, timeout: 1e4};
                $.Growl.show(a, e)
            }, complete: {}})
    })
});
//# sourceMappingURL=tipos.js.map
