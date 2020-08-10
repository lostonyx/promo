<!doctype html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="">

        <title>Dashboard</title>

        <!-- Bootstrap core CSS -->
        <link href="//stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link href="/assets/index.css" rel="stylesheet">
    </head>

    <body>

    <div class="jumbotron">
        <div class="container text-center text-lg-left">
            <div class="row">
                <div class="col-lg-6">
                    <h1 class="display-4">Hey amigo, que tal ativar um PinCode e concorrer a prêmios?</h1>
                    <p class="lead">É rápido e fácil!</p>
                </div>
                <div class="col-lg-6 align-items-center">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Ativar PinCode</h5>
                            <form method="post" action="/dash">
                                <input type="pincode" name="pincode" class="form-control" placeholder="Insira o PinCode" required>
                                <button class="btn btn-primary mt-2" type="submit">Ativar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- Bootstrap core JavaScript -->
        <script src="//code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="//code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="//stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </body>
</html>
