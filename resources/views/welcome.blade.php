<!DOCTYPE html>
<html>
    <head>
        <title>Auditoria</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <div class="container">            
            <div class="content">
                <div class="title">AudiNet</div>                                   
                {!! Form::open(array('url' => 'auditar')) !!}                    
                    <div class="onoffswitch">
                        <input type="checkbox" name="entrada" class="onoffswitch-checkbox" id="myonoffswitch" checked>
                        <label class="onoffswitch-label" for="myonoffswitch">
                            <span class="onoffswitch-inner"></span>
                            <span class="onoffswitch-switch"></span>
                        </label>
                    </div>
                    <br>
                    {!! Form::date('fechaini', \Carbon\Carbon::now()); !!}
                    {!! Form::date('fechafin', \Carbon\Carbon::now()); !!}
                    {!! Form::submit('Auditar') !!}
                {!! Form::close() !!}                
            </div>
            <br>
            {{ Session::get('error')}}            
        </div>        
    </body>
</html>
