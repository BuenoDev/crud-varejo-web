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
        
        @set(nav)
        </header>

@session('section')
        <footer>
          
        </footer>
    </body>
    </html>