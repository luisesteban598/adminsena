<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <h1>Hola hijos</h1>

    <form action="{{route('computer.store')}}" method="POST" enctype="multipart/form-data">

    @csrf
    <label>
        numero:
        <br>
        <input type="int" name="number">
    </label>
    <br>
    <label>
        marca:
        <br>
        <input type="text" name="brad">
    </label>



    <button type="submit">Enviar Formulario:</button>
    </form> 
    
</body>
</html>