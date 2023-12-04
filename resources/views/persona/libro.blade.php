<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestión de Libro</title>
</head>
<body>
    <form action="{{ url('libros') }}" method="post">
        @csrf
        <h1>Gestión de Libro</h1>
        <div>
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" required>
            <label for="year">Año:</label>
            <input type="text" name="year" required>
            <label for="autor_id">Autor:</label>
            <select id="autor_id" name="autor_id">
                @foreach($autores as $autor)
                    <option value="{{$autor->id}}">{{$autor->nombre}}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div>
            <button><a href="{{url('datos')}}">Libros</a></button>
            <button type="submit">Registrar</button>
        </div>
    </form>
</body>
</html>
