<?php

    session_start();

      require 'BDlogin.php';

      if(!empty($_POST['email'] ) && !empty($_POST['password'])){
        $records = $conn->prepare('SELECT id, email, password FROM usuarios WHERE email = :email ');
        $records->bindParam(':email', $_POST['email']);
        $records->execute();
        $results = $records ->fetch(PDO::FETCH_ASSOC);

        $message ='';
        if(count($results) > 0 && password_verify($_POST['password'], $results['password'])){
            $_SESSION['user_id'] = $results['id'];
            header('Location: index2.html');
        }else{
            $message='Contraseña erronea vuelve a intentarlo';
        }


        
      }
      

?>


<DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="shortcut icon" href="#">
    <!-- ↓↓↓↓ link para agregar el estilo de bootstrap ↓↓↓↓ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
 
    <div class="container mt-2">
        <div class="raw">
        <div class="col-6">

        <?php if(!empty($message)): ?>
            <p> <?= $message ?></p>
        <?php endif; ?>


            <form action="index.php" method="POST">
          <div class="card">
            <div class="card-header bg-danger text-light">
              <h1 class="text-hide">LOGIN</h1>
            </div>
            <div class="card-body bg-info">
              <div class="form-group row">
                <label for="mail" class="col-sm-2 col-form-label"><p class="text-primary">Usuario</p></label>
                <div class="col-sm-10">
                  <input type="text"name="email" placeholder="email@example.com" class="form-control" >
                </div>
              </div>
              <div class="form-group row"<span class="border border-primary"></span>
                <label for="password" class="col-sm-2 col-form-label"> <p class="text-primary">Contraseña</p></label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
               <input type="submit" value="Submit">
              </div>
              </div>
            </form>
           
            </div>
          </div>
        
       
        
          
            
      </div>

    

</body>
</body>