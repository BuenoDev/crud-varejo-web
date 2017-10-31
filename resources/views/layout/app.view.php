<!-- O arquivo base tem como objetivo conter os objetos de 
    Layout que serão comuns em todas as páginas, para 
    facilitar a criação de páginas novas copiando e colando
    todo o código abaixo para o novo arquivo -->
    <!DOCTYPE html>
    <html lang="pt_BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="CSS/master.css">
        
        <!-- CSS Personalizado -->
        <link rel="stylesheet" href="CSS/master.css">
        <title><?= $data['title']; ?> </title>
    </head>
    <body>

    
        <header>
                <nav class="navbar navbar-default">
                        <div class="container-fluid">
                          <div class="navbar-header">
                            <a class="navbar-brand" href="#">Varejo Web</a>
                          </div>
                          <ul class="nav navbar-nav">
                              <!-- Trocar class active para item ativo atual -->
                            <li class="active"><a href="#">Login</a></li>
                            <li><a href="#">Cadastro de Produtos</a></li>
                            <li><a href="#">Consulta</a></li>
                            <li><a href="">Venda</a></li>
                            <li><a href="">Check-in</a></li>
                          </ul>
                        </div>
                      </nav>
        </header>

    </body>
    </html>