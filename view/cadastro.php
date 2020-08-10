<!doctype html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="">

        <title>Cadastro</title>

        <!-- Bootstrap core CSS -->
        <link href="//stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link href="/assets/style.css" rel="stylesheet">
    </head>

    <body class="text-center">
        <form class="form-signin" method="post">
            <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Cadastro</h1>
            <?php if($message_error) { ?>
            <div class="alert alert-danger">
                <?php echo $message_error; ?>
            </div>
            <?php } ?>
            <input type="name" name="name" class="form-control" placeholder="Insira seu nome" required autofocus>
            <input type="tel" name="phone" class="form-control" placeholder="Insira seu telefone" required>
            <input type="email" name="email" class="form-control" placeholder="Insira seu email" required>
            <input type="password" name="password" class="form-control" placeholder="Insira sua senha" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Cadastrar</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
        </form>
    </body>
</html>
