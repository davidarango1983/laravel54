$(document).ready(function () {
    
    
    $('#limitClase').on('input', function () {
        $('#infoLimit').html(this.value);
    });
    $('#limitClase').on('change', function () {
        $('#infoLimit').html(this.value);
    });

    
    
    $.ajaxPrefilter(function (a, e, n) {
        var s = $('meta[name="csrf-token"]').attr("content");
        if (s)
            return n.setRequestHeader("X-CSRF-TOKEN", s)
    }),
            $("#clases").addClass("active"), $(function () {
        $("#clase-table").DataTable({retrieve: !0, processing: !0, serverSide: !0,
            ajax: {url: "listaclases", type: "POST"},
            columns: [{data: "id", name: "id"}, {
                    data: "hora_ini", name: "hora_ini",
                    className: "col-xs-1"}, {data: "hora_fin",
                    name: "hora_fin", className: "col-xs-1"}, {
                    data: "dia", name: "dia"}, {data: "limit",
                    name: "limit", className: "col-xs-1"}, {
                    data: "publicado", name: "publicado",
                    render: function () {
                        return"1" === arguments[0] ? "SI" : "NO"
                    },
                    className: "col-xs-1"}, {data: "profesor.name", name: "profesor.name",
                    render: function () {
                        return arguments[0] + " " + arguments[2].profesor.last_name
                    }}, {
                    data: "tipo.name", name: "tipo.name", className: "col-xs-1"}, {
                    data: "id", className: "col-xs-2",
                    render: function () {
                        return"<a href='editarclase/" + arguments[0] + "' class='editar btn btn-sm btn-warning ' >Editar</a><span> </span><button class='borrarbtn btn btn-xs btn-danger'>Borrar</button>"
                    }}],
            language: {url: "/spanish"},
            oAria: {sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                sSortDescending: ": Activar para ordenar la columna de manera descendente"}})
    }),
            $("#clase-table").on("click", ".borrarbtn",
            function (a) {
                var e = $("#clase-table").DataTable();
                a.preventDefault();
                var n = $(this).parents("tr")[0], s = e.row(n).data(), t = s.id;
                $.ajax({type: "post", url: "eliminarclase/" + t, data: {id: t},
                    error: function (a, e) {
                        alert(a, e)
                    },
                    success: function (a) {
                        e.draw();
                        var n = {icon: "gymzone",
                            title: "Administración",
                            cls: "eliminado",
                            speed: 200,
                            timeout: 8e3};
                        $.Growl.show(a, n)
                    },
                    complete: {}})
            }), $(
            function () {
                $("#tipoclase-table").DataTable({
                    retrieve: !0, processing: !0,
                    serverSide: !0, ajax: {url: "listatipoclases",
                        type: "POST"}, columns: [{data: "id", name: "id",
                            className: "col-xs-1"}, {data: "name", name: "name",
                            className: "col-xs-2"}, {data: "description",
                            name: "description", className: "col-xs-7",
                            render: function (a) {
                                return a.substring(0, 80) + "..."
                            }}, {
                            data: "id", className: "col-xs-2",
                            render: function () {
                                return"<a href='editartipoclase/" + arguments[0] + "' class='editar btn btn-sm btn-warning ' >Editar</a><span> </span><button class='borrarbtn btn btn-xs btn-danger'>Borrar</button>"
                            }}],
                    language: {url: "/spanish"},
                    oAria: {sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                        sSortDescending: ": Activar para ordenar la columna de manera descendente"}})
            }),
            $("#tipoclase-table").on("click", ".borrarbtn",
            function (a) {
                var e = $("#tipoclase-table").DataTable();
                a.preventDefault();
                var n =
                        $(this).parents("tr")[0], s = e.row(n).data(), t = s.id;
                $.ajax({type: "post",
                    url: "eliminartipoclase/" + t, data: {id: t},
                    error: function (a, e) {
                        alert(a, e)
                    },
                    success: function (a) {
                        e.draw();
                        var n = {icon: "gymzone", title: "Administración",
                            cls: "eliminado", speed: 200, timeout: 5e3};
                        $.Growl.show(a, n)
                    }, complete: {}})
            }),
            $(function () {
                $("#reservasusuarios-table").DataTable({
                    lengthMenu: [[50, -1], [50, "Todos"]],
                    retrieve: !0, processing: !0,
                    serverSide: !0,
                    ajax: {url: "reservasusuarios", type: "POST"},
                    dom: "Bfrtip", buttons: [{text: "Imprimir", extend: "print",
                            className: "btn btn-info",
                            customize: function (a) {
                                $(a.document.body).css("font-size", "10pt"),
                                        $(a.document.body).find("table").addClass("compact").css("font-size", "inherit")
                            },
                            orientation: "landscape"}], columns: [{data: "clase_id", name: "clase_id",
                            className: "col-xs-1"}, {data: "clase.dia", name: "clase.dia",
                            className: "col-xs-1"}, {data: "clase.hora_ini",
                            name: "clase.hora_ini", className: "col-xs-1"}, {
                            data: "clase.hora_fin", name: "clase.hora_fin",
                            className: "col-xs-1"}, {data: "user_id",
                            name: "user_id", className: "col-xs-1"}, {
                            data: "user.name", name: "user.name",
                            className: "col-xs-1"}, {data: "user.last_name",
                            name: "user.last_name", className: "col-xs-1"}, {
                            data: "user.telefono", name: "user.telefono",
                            className: "col-xs-1"}], columnDefs: [{
                            searchable: !1, targets: [1, 2, 3, 4, 5, 6, 7]}],
                    language: {url: "/spanish"}, oAria: {
                        sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                        sSortDescending: ": Activar para ordenar la columna de manera descendente"}})
            })
});