<!-- persona.libro.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Librería</title>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th>Item</th>
                <th>Titulo</th>
                <th>Year</th>
                <th>Autor</th>
                <th>Acciones</th>
                <th>Actualizar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($libreria as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->titulo }}</td>
                <td>{{ $item->year }}</td>
                <td>{{ $item->nombre }}</td>
                <td>
                    <form action="{{ url('datos', $item->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="delete-button">Eliminar</button>
                    </form>
                </td>
                <td>
                    <form action="{{url('Actualizarlibro', $item->id)}}" method="post">
                        @csrf
                        @method('put')
                        <button type="submit" class="update-button">Actualizar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <form action="{{url('filtrar')}}" method="GET">
        @csrf
        <select name="datoFiltrado" id="">
            @foreach($autores as $item)
            <option value="{{$item->id}}">{{$item->nombre}}</option>
            @endforeach
        </select>
        <button type="submit">Filtrar</button>
    </form>
</body>
</html>
