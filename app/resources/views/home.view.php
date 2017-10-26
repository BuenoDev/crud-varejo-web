<!DOCTYPE html>
<html lang="en">
        <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <!-- Bootstrap -->
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
                <!-- CSS Personalizado -->
                <link rel="stylesheet" href="CSS/master.css">
                <title>Varejo Login</title>
            </head>
<body>
    <header>
            <nav class="navbar navbar-default">
                    <div class="container-fluid">
                      <div class="navbar-header">
                        <a class="navbar-brand" href="#">Varejo Web</a>
                      </div>
                      <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Login</a></li>
                        <li><a href="#">Cadastro de Produtos</a></li>
                        <li><a href="#">Consulta</a></li>
                        <li><a href="">Venda</a></li>
                        <li><a href="">Check-in</a></li>
                      </ul>
                    </div>
                  </nav>
    </header>
    <form class="form-horizontal">
            <div class="form-group">
              <label class="control-label col-sm-2" for="email">Email:</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="email" placeholder="Enter email">
              </div>
            </div>
            <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Nome Completo:</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="email" placeholder="Enter Name">
                    </div>
                </div>
            <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Nome de Usuário:</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="email" placeholder="Enter Username">
                    </div>
                  </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="pwd">Password:</label>
              <div class="col-sm-10"> 
                <input type="password" class="form-control" id="pwd" placeholder="Enter password">
              </div>
            </div>
            <div class="form-group"> 
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Enviar</button>
              </div>
            </div>
          </form>
</body>
</html>