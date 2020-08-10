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
        <link href="/assets/dashboard.css" rel="stylesheet">
    </head>

    <body>
        <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Promo</a>
            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                    <a class="nav-link" href="/logout">Sair</a>
                </li>
            </ul>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                    <div class="sidebar-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href="/dash">
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <div class="nav-item">
                                <?php if($_SESSION['admin']) { ?>
                                <a class="nav-link" href="/admin">
                                    <span>Admin</span>
                                </a>
                                <?php } ?>
                            </li>
                        </ul>
                    </div>
                </nav>

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Ativar PinCode</h5>
                                    <?php if($message_error) { ?>
                                    <div class="alert alert-danger">
                                        <?php echo $message_error; ?>
                                    </div>
                                    <?php } ?>
                                    <?php if($message_success) { ?>
                                    <div class="alert alert-success">
                                        <?php echo $message_success; ?>
                                    </div>
                                    <?php } ?>
                                    <form method="post">
                                        <input type="pincode" name="pincode" class="form-control" placeholder="Insira o PinCode" required>
                                        <button class="btn btn-primary mt-2" type="submit">Ativar</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <h2>Seus números</h2>
                            <div class="table-responsive">
                                <table class="table table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>Número</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($numbers as $row) { ?>
                                        <tr>
                                            <td><?php echo $row['number']; ?></td>
                                            <?php if($row['status'] == '0') { ?>
                                                <td><label class="btn btn-warning btn-sm">Não sorteado</label></td>
                                            <?php } elseif($row['status'] == '1') { ?>
                                                <td><label class="btn btn-danger btn-sm">Errou</label></td>
                                            <?php } elseif($row['status'] == '2') { ?>
                                                <td><label class="btn btn-success btn-sm">Acertou</label></td>
                                            <?php } else { ?>
                                                <td></td>
                                            <?php } ?>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>

        <!-- Bootstrap core JavaScript -->
        <script src="//code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="//code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="//stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <!-- Icons -->
        <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
        <script>
            feather.replace()
        </script>
    </body>
</html>
