<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Libros</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <img src="{{ public_path('images/utcbis-logo.jpg')}}" alt="Logo" height="75px">
    <h1>Listado de Libros</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Descripción</th>
                <th>Año de Publicación</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->description }}</td>
                    <td>{{ $book->year_published }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No hay libros disponibles.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
