<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API_REST_HEX</title>
    <link rel="stylesheet" href="assets/estilo.css" type="text/css">
</head>
<body>

<div  class="container">
    <h1>API_REST_HEX</h1>
    <div class="divbody">
        <h3>Auth - login</h3>
        <code>
           POST  /auth
           <br>
           {
               <br>
               "usuario" :"",
               <br>
               "password": ""
               <br>
            }
        
        </code>
    </div>      
    <div class="divbody">   
        <h3>Pacientes</h3>
        <code>
           GET  /pacientes?page=$numeroPagina
           <br>
           GET  /pacientes?id=$idPaciente
        </code>

        <code>
           POST  /pacientes
           <br> 
           {
            <br> 
               "nombre" : "",
               <br> 
               "dni" : "",
               <br> 
               "correo":"",
               <br> 
               "codigoPostal" :"",             
               <br>  
               "genero" : "",        
               <br>        
               "telefono" : "",       
               <br>       
               "fechaNacimiento" : "",      
               <br>
           }

        </code>
        <code>
           PUT  /pacientes
           <br> 
           {
            <br> 
               "nombre" : "",               
               <br> 
               "dni" : "",                  
               <br> 
               "correo":"",                 
               <br> 
               "codigoPostal" :"",             
               <br>  
               "genero" : "",        
               <br>        
               "telefono" : "",       
               <br>       
               "fechaNacimiento" : "",
               <br>       
               "pacienteId" : ""
               <br>
           }

        </code>
        <code>
           DELETE  /pacientes
           <br> 
           {
               <br>       
               "pacienteId" : ""
               <br>
           }

        </code>
    </div>


</div>
    
</body>
</html>

