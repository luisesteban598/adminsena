<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Crear Área</h1>

    <form action="{{route('area.store')}}" method="POST" enctype="multipart/form-data">
    @csrf


    <label>
        Nombre:
        <br>
        <input type="text" name="name">
    </label>
    <br>



    <button type="submit">Crear Área</button>
    </form>
    
</body>
</html>