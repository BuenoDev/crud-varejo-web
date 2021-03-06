
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
        <link rel="stylesheet" href="<?= url('/css/master.css') ?>">
        <link rel="stylesheet" href="<?= url('/css/app.css') ?>">
        <link rel="stylesheet" href="<?= url('/css/font-awesome.min.css') ?>">
        <!-- Carregamento de CSS personalizado -->
        <?php 
        foreach ($data['css'] as $style) {
            echo "<link rel='stylesheet' href='" . url("/css/{$style}.css") . "'>";
        }
        ?>
    </head>
    <body>
    <div class="dash">
        <div class="nav">
        <!-- carregamento da view menu personalizado -->
            <?php 
            view('pieces/menu/' . $data['views']['menu']);
            ?>
        </div>
        <div class="header">
        <!-- carregamento da view header personalizado -->
            <?php 
            view('pieces/headers/' . $data['views']['header']);
            ?>
        </div>
        <div class="dados">
        <!-- carregamento da view dados personalizado -->
            <?php 
            view('pieces/dados/' . $data['views']['dados'], $data);
            ?>
        </div>
    </div>
    <script src="<?= url('/javascript/jquery-1.12.1.min.js') ?>"></script>
    <script src="<?= url('/javascript/script.js') ?>"></script>
    </body>
    </html>