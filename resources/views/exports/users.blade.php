<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo Electrónico</th>
            <th>Número De Identificación</th>
            <th>Roles</th>
            <th>Division</th>
            <th>Número De Teléfono</th>
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
