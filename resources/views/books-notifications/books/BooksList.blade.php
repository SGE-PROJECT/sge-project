<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Listado de Libros</title>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4">Listado de Libros</h1>
        <a href="{{ route('books.reports') }}" class="inline-block mb-4 px-6 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 no-underline">Reporte PDF</a>
        <div class="overflow-x-auto">
            <table class="w-full text-left rounded-lg overflow-hidden">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-3 px-4">ID</th>
                        <th class="py-3 px-4">Título</th>
                        <th class="py-3 px-4">Autor</th>
                        <th class="py-3 px-4">Descripción</th>
                        <th class="py-3 px-4">Año de Publicación</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($books as $book)
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="py-3 px-4">{{ $book->id }}</td>
                            <td class="py-3 px-4">{{ $book->title }}</td>
                            <td class="py-3 px-4">{{ $book->author }}</td>
                            <td class="py-3 px-4">{{ $book->description }}</td>
                            <td class="py-3 px-4">{{ $book->year_published }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-3 px-4 text-center">No hay libros disponibles.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
