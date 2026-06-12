<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <h1>centros de formacion</h1>

    <form action="{{route('area.store')}}" method="POST" enctype="multipart/form-data">
    @csrf


    <label>
        Nombre:
        <br>
        <input type="text" name="name">
    </label>
    <br>
    <label>
        location:
        <br>
        <input type="text" name="location">
    </label>



    <button type="submit">Enviar Formulario:</button>
    </form>
    
</body>
</html>