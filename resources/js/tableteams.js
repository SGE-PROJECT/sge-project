document.addEventListener("DOMContentLoaded", function () {
    var equipos = [
        { integrantes: "ProjectSync", proyecto: "SM53", academico: "Activo", empresarial: "Rafael@gmail.com", division: "559866559", rol: "Administrador" },
        { integrantes: "Green Garden", proyecto: "Dinamita", academico: "En proceso", empresarial : "Mayra@gmail.com", division: "515411459", rol: "Estudiante" },
        { integrantes: "Blue Sky", proyecto: "Alpha", academico: "Activo", empresarial: "Juan@gmail.com", telefono: "154158415894", rol: "Administrador" },
        { integrantes: "Tech Innovations", proyecto: "Beta", academico: "En proceso", empresarial: "Laura@gmail.com", telefono: "868656421", rol: "Estudiante" },
        
    ];

    function teamsTabla() {
        var tablaHTML = '<thead><tr><th>integrantes</th><th>proyecto</th><th>academico</th><th>empresarial Electronico</th><th>Telefono</th><th>Rol</th></tr></thead><tbody>';

        equipos.forEach(function (equipo) {
            tablaHTML += '<tr>';
            tablaHTML += '<td>' + equipo.integrantes + '</td>';
            tablaHTML += '<td>' + equipo.proyecto + '</td>';
            tablaHTML += '<td class="academico">' + equipo.academico + '</td>'; 
            tablaHTML += '<td>' + equipo.empresarial + '</td>';
            tablaHTML += '<td>' + equipo.telefono + '</td>';
            tablaHTML += '<td>' + equipo.rol + '</td>';
            tablaHTML += '</tr>';
        });

        tablaHTML += '</tbody>';

        document.getElementById('tabla-equipos').innerHTML = tablaHTML;
    }

    window.onload = function () {
        teamsTabla();
    };

      
});