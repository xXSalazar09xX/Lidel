<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<form action="{{ url('autor') }}" method="post">
        @csrf
        <h1>Gestión de Autores</h1>
        <div>
            <label for="name">Nombre de autor:</label>
            <input type="text" name="nombre" required>
        </div>
        <button type="submit">Registrar</button>
    <a href="{{url('l')}}">Ir a la página de libros</a>
    </form>

    <table border="1">
        <thead>
            <tr>
                <th>Item</th>
                <th>Autor</th>
                <th>Acciones</th>
                <th>Actualizar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($autores as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->nombre }}</td>
                <td>
                    <form action="{{ url('autor', $item->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="delete-button">Eliminar</button>
                    </form>
                </td>
                <td>
                    <form action="{{url('autor', $item->id)}}" method="get">
                        @csrf
                        <button type="submit" class="update-button">Actualizar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


</body> 
</html>