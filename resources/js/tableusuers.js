document.addEventListener("DOMContentLoaded", function () {
    var usuarios = [
        { nombre: "ProjectSync", apellido: "SM53", estado: "Activo", correo: "Rafael@gmail.com", telefono: "559866559", rol: "Administrador" },
        { nombre: "Green Garden", apellido: "Dinamita", estado: "En proceso", correo : "Mayra@gmail.com", telefono: "515411459", rol: "Estudiante" },
        { nombre: "Blue Sky", apellido: "Alpha", estado: "Activo", correo: "Juan@gmail.com", telefono: "154158415894", rol: "Administrador" },
        { nombre: "Tech Innovations", apellido: "Beta", estado: "En proceso", correo: "Laura@gmail.com", telefono: "868656421", rol: "Estudiante" },
        
    ];

    function usersTabla() {
        var tablaHTML = '<thead><tr><th>Nombre</th><th>Apellido</th><th>Estado</th><th>Correo Electronico</th><th>Telefono</th><th>Rol</th></tr></thead><tbody>';

        usuarios.forEach(function (usuario) {
            tablaHTML += '<tr>';
            tablaHTML += '<td>' + usuario.nombre + '</td>';
            tablaHTML += '<td>' + usuario.apellido + '</td>';
            tablaHTML += '<td class="estado">' + usuario.estado + '</td>'; 
            tablaHTML += '<td>' + usuario.correo + '</td>';
            tablaHTML += '<td>' + usuario.telefono + '</td>';
            tablaHTML += '<td>' + usuario.rol + '</td>';
            tablaHTML += '</tr>';
        });

        tablaHTML += '</tbody>';

        document.getElementById('tabla-usuarios').innerHTML = tablaHTML;
    }

    window.onload = function () {
        usersTabla();
    };

      
});