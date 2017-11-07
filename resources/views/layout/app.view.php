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
        <!-- CSS -->
        <link rel="stylesheet" href="css/master.css">
        <link rel="stylesheet" href="css/app.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!-- CSS personalizado -->
        <?php 
        foreach ($_SESSION['css'] as $style) {
            echo "<link rel='stylesheet' href='css/{$style}.css'>";
        }
        ?>
    </head>
    <body>
    <div class="dash">
        <div class="nav">
            <?php 
            view('pieces/menu/' . $_SESSION['views']['menu']);
            ?>
        </div>
        <div class="header">
            <?php 
            view('pieces/headers/' . $_SESSION['views']['header']);
            ?>
        </div>
        <div class="dados">
            <?php 
            view('pieces/dados/' . $_SESSION['views']['dados']);
            ?>
        </div>
    </div>
    </body>
    </html>