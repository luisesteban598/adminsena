<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <h1>Crear Computadora</h1>

    <form action="{{route('computer.store')}}" method="POST" enctype="multipart/form-data">

    @csrf
    <label>
        numero:
        <br>
        <input type="number" name="number">
    </label>
    <br>
    <label>
        marca:
        <br>
        <input type="text" name="brand">
    </label>



    <button type="submit">Enviar Formulario:</button>
    </form> 
    
</body>
</html>