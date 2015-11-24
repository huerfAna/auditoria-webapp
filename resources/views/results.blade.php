<!DOCTYPE html>
<html>
    <head>
        <title>Auditoria</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <h1>HOLaaaaa</h1>
        <ul>               
        @foreach($result as $res)
        {{-- */ $anx = $res->validations->anexo22; /*--}} 
        <p>Esto es un parrafo y extraño mis audifonos</p>
            <li>
            {{ $anx->a22_name }}
            {{ $anx->infractions->inf_description }}
            {{ $anx->infractions->sanctions->san_valmax }}
            </li>
        @endforeach
        </ul>
    </body>
</html>
