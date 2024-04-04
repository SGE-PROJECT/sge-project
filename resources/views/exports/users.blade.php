<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Identifier Number</th>
            <th>Roles</th>
            <th>Division ID</th>
            <th>Phone Number</th>
            <th>Avatar</th>
            <th>Is Active</th>
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
                <td>{{ $user->division->name ?? 'Sin división' }}</td>
                <td>{{ $user->phone_number }}</td>
                <td>{{ $user->avatar }}</td>
                <td>{{ $user->isActive ? 'Yes' : 'No' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
