{{-- resources/views/exports/user_template.blade.php --}}
<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Correo Electronico</th>
            <th>Numero De Identificacion</th>
            <th>Numero De Telefono</th>
            <th>Contraseña</th> <!-- Asegúrate de comunicar que deben cambiarla después -->
            <th>Activo</th>
        </tr>
    </thead>
    <tbody>
        <!-- No se agregan usuarios aquí, ya que es una plantilla -->
        <!-- Puedes agregar una fila de ejemplo si lo consideras necesario -->
        <tr>
            <td>Ejemplo Nombre</td>
            <td>ejemplo@correo.com</td>
            <td>123456789</td>
            <td>1234567890</td>
            <td>{{ 'ContraseñaPredeterminada' }}</td>
            <td>si</td>
        </tr>
    </tbody>
</table>
