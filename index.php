<?php session_start();?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <link rel="stylesheet" type="text/css" href="./styles/style.css" media="screen" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  </head>

  <body class="text-center">
  <main class="form-signin">
    <form action="login.php" method="POST">

        <img src="./images/xarc.png" alt="logo_xarc" width="200" >  

        <h1 class="h3 mb-3 fw-normal">Por favor, preencha seus dados</h1>
      
        <div class="form-floating">
            <input type="text" class="form-control" name="txtNome" placeholder="name" id="floatingInput"/>
            <label for="txtNome">Nome</label>
        </div>

        <div class="form-floating">
            <input type="password" class="form-control" name="txtSenha" placeholder="password" id="floatingPassword"/>
            <label for="txtSenha">Senha</label>
        </div>

        <div class="checkbox mb-3">
            <label>
            <input type="checkbox" value="remember-me"> Lembrar
            </label>
        </div>

        <input class="btn btn-primary btn-lg" type="submit" value="Entrar">

    </form>
  </main>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
  </body>
</html>