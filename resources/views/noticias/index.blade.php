<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AMLO-MAÑANERO</title>
</head>
<body>
 
    <h1>AMLO-MAÑANERO</h1>
    <h3>Noticias recientes</h3>
    
    <table>

        <thead>
            <th>Titulo de la noticia</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            @foreach($noticias as $noticia)
                <tr>
                    <!-- titulo viene del campo que viene de la base de datos -->
                    <td>{{$noticia->titulo}}</td> 
                    <td>
                        <a href="{{route('noticias.show', $noticia->id)}}">Leer más</a>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

</body>
</html>