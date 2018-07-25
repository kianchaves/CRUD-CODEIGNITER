<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://i0.wp.com/nexocs.com/wp-content/uploads/2016/08/ico-medicina-do-trabalho@2x.png?fit=630%2C540">

    <title> Login - medCad</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('assets/bootstrap.css') ?>" " rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/signin.css') ?>" rel="stylesheet">
  </head>

  <body>
    <form class="form-signin" role="form" method="post" action="<?= base_url('index.php/login/logar') ?>">
      <div class="text-center mb-4">
        <img class="mb-4" src="http://i0.wp.com/nexocs.com/wp-content/uploads/2016/08/ico-medicina-do-trabalho@2x.png?fit=630%2C540" alt="" width="82" height="72">
        <h1 class="h3 mb-3 font-weight-normal">medCad</h1>
        <p>Por favor, digite seu email e senha</p>
      </div>

      <div class="form-label-group">
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus name="usuario">
        <label for="inputEmail">Email</label>
      </div>

      <div class="form-label-group">
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="senha">
        <label for="inputPassword">Senha</label>
      </div>

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Lembrar
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
      <? if (isset($erro)): ?>
        <div class="alert alert-danger" role="alert" style="margin-top: 10px;"><?= $erro ?></div>
      <? endif; ?>
      <p class="mt-5 mb-3 text-muted text-center">&copy; Kian Chaves - 2018</p>
    </form>
  </body>
</html>