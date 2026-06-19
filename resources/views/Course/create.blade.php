<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>formulario producto</h1>

<form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">

@csrf

<label>
    Nombre:
    <br>
    <input type="text" name="course_number">
</label>
<br>
<label>
    Descripcion:
    <br>
    <input type="date" name="day">
</label>
<br>
<br>


 <label for="area_id">Área</label>

    <select name="area_id" id="area_id" class="form-control">
        <option value="">Seleccione un área</option>

        @foreach($area as $areas)
            <option value="{{ $areas->id }}">
                {{ $areas->name }}
            </option>
        @endforeach
    </select>

<br>
<br><br>
<button type="submit">Ingresar Curso:</button>
</form>
    
</body>
</html>