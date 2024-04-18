<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid black;
        padding: 4px; /* Reduce el padding para hacerlo más compacto */
        text-align: center; /* Centra el texto */
        font-size: 10px; /* Reduce el tamaño de la fuente */
        word-wrap: break-word; /* Asegura que el texto no salga de la celda */
    }
    th {
        background-color: #f2f2f2;
    }
</style>


<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Correo electrónico</th>
            <th>No. Teléfono</th>
            <th>Rol</th>
            <th>División</th>
            <th>Estado</th>

        </tr>
    </thead>
    @foreach ($users as $user)
    <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->phone_number}}</td>
        <td>
        @foreach ($user->roles as $role)
            <span>{{ $role->name }}</span>
        @endforeach</td>
        <td>{{$user->division_name}}</td>
        <td>{{$user->isActive == 1 ? 'Activo' : 'Inactivo'}}</td>
    </tr>
    @endforeach
    </tbody>
</table>
