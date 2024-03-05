<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body{
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
            padding: 10px;
            background-color: aquamarine;
        }

        .container{
            max-width: 700px;
            width: 100%;
            padding: 25px 30px;
            background-color: aliceblue;
            border-radius: 5px;
        }
        .container .title{
            font-size: 25px;
            font-weight: 500;
        }
        .container form{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between ;
            margin: 10px 20px 0;
        }

        form .form-group{
            margin-bottom: 15px;
            width: calc(100%/2 - 20px);
        }

        form span{
            display: block;
            font-weight: 500;
            margin-bottom: 5px;
        }

        .form-group input{
            height: 40px;
            width: 100%;
            outline: none;
            border-radius: 5px;
            border: 1px solid #2773ff;
            padding-left: 15px;
            border-bottom-width:2px ;
            transition: all 0.3s ease;
        }

        .form-group input:focus,
        .form-group input:valid{
            border-color: skyblue;
        }

        form .button {
            width: 100%;
            height: 40px;
            margin: 40px 0;
        }

        form .button input {
            width: 100%;
            height: 100%;
            outline: none;
            background: #0a90fd;
            color: #ffffff;
            font-size: 16px;
            font-weight:500 ;
            border: none;
            border-radius: 5px;

        }

        form .button input:hover {
            background: linear-gradient(130deg, skyblue);
        }

        .container form .button input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }
        .container form .button input[type="submit"]:hover {
            background-color: #45a049;
        }


    </style>
</head>
<body>
    <div class="container">
        <div class="title">Registro</div>
        <form action="procesar_registro.php" method="post">

            <div class="form-group">
                <span>Nombre</span>
                <input type="text" placeholder="Ingrese su Nombre">            </div>
            <div class="form-group">
                <span>Apellidos</span>
                <input type="text" placeholder="Ingrese su Apellidos">   
            </div>
            <div class="form-group">
                <span>Direccion</span>
                <input type="text" placeholder="Ingrese su Direccion">   
            </div>
            <div class="form-group">
                <span>Correo Electronico</span>
                <input type="email" placeholder="Ingrese su Correo Electronico">   
            </div>
            <div class="form-group">
                <span>Telefono</span>
                <input type="number" placeholder="Ingrese su Telefono">   
            </div>
            <div class="form-group">
                <span>contraseña</span>
                <input type="password" placeholder="Ingrese su contraseña">   
            </div>
            <div class="form-group">
                <span>Confirmar contraseña</span>
                <input type="password" placeholder="Confirme su contraseña ">   
            </div>
            <div class="button">
                <input type="submit" value="Registrarse">
            </div>
        
        </form>
        
        

    </div>
    
</body>
</html>