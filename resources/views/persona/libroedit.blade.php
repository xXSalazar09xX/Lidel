<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Actualizar Libro</title>
<body>
    <form action="{{url('actualizar', $libro->id)}}" method="post">
        @csrf
        @method('PUT')
        <h3>Datos del libro</h3>
        <label for="titulo">Titulo:</label>
        <input type="text" id="titulo" name="titulo" value="{{$libro->titulo}}">
        <label for="year">Año de publicación:</label>
        <input type="number" id="year" name="year" value="{{$libro->year}}">
        <label for="id_autor">Autor:</label>
        <select name="id_autor" id="id_autor">
            @foreach($autor as $item)
            <option value="{{$item->id}}">{{$item->nombre}}</option>
            @endforeach
        </select>
        <button type="submit">Actualizar Libro</button>
    </form>
</body>

</html>
