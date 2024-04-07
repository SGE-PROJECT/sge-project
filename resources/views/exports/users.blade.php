<table>
    <thead>
        <tr>
            <th>Identificador</th>
            <th>Nombre</th>
            <th>Correo Electronico</th>
            <th>Numero De Identificacion</th>
            <th>Roles</th>
            <th>Division</th>
            <th>Numero De Telefono</th>
            <th>Activo</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->identifier_number }}</td>
                <td>{{ implode(', ', $user->roles->pluck('name')->toArray()) }}</td>
                <td>{{ $user->division_name  ?? 'Sin división' }}</td>
                <td>{{ $user->phone_number }}</td>
                <td>{{ $user->isActive ? 'Yes' : 'No' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
