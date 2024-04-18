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
        .title-report-books{
            text-transform: uppercase   ;
        }
        .header-report-books{
            display: flex;
            justify-content: center;
            text-align: center;
            font-size: 10px
        }
    </style>
</head>
<body>
    <img src="{{ public_path('images/utcbis-logo.jpg')}}" alt="Logo" height="75px">
    <div class=" header-report-books">
        <h1 class="title-report-books">RELACIÓN DE DONACIÓN DE LIBRO</h1>
        <h1 class=" title-report-books">DIVISIÓN DE {{$nameDivision}}</h1>
    </div>

    <table>
        <thead>
            <tr>
                <th>No. Estudiante</th>
                <th>No. Libro</th>
                <th>Nombre del estudiante</th>
                <th>Matrícula</th>
                <th>Fecha de la donación</th>
                <th>Precio del libro</th>
                <th>Titulo</th>
                <th>Autor</th>
                <th>Pertenece a la División Académica</th>
                <th>Carrera</th>

            </tr>
        </thead>
        <tbody>
            @forelse ($booksOfStudents as $book)
                <tr>
                    <td>{{ $book->student_id }}</td>
                    <td>{{ $book->book_id }}</td>
                    <td>{{ $book->user_name }}</td>
                    <td>{{ $book->tuition }}</td>
                    <td>{{ $book->book_created }}</td>
                    <td>{{ $book->book_price }}</td>
                    <td>{{ $book->book_title }}</td>
                    <td>{{ $book->book_author}}</td>
                    <td>DIT</td>
                    <td>{{ $book->program_name}}</td>
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
