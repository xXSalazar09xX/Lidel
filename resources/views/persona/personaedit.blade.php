<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editor de Persona</title>
    
</head>
<body>
    <h1>Editor de Persona</h1>
    <form action="{{ url('autor', $autor->id) }}" method="post">
        @csrf
        @method('put')
        <div>
            <label for="name">Nombre de autor:</label>
            <input type="text" id="nombre" name="nombre" value="{{ $autor->nombre }}" required>
        </div>
        <div>
            <button type="submit">Actualizar</button>
        </div>
    </form>
</body>
</html>
