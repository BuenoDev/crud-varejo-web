# crud-varejo-web

Desenvolvimento de um pequeno controlador de varejo

## Teconologias
HTML, CSS, JavaScript, PHP

## Conceitos de padrões usados

O sistema é desenvolvido em padrões e conceitos mais recentes no qual abre um grande "leque" para upgrade desse sistema. Tais padrões e conceitos são:

* SingleTon
* MVC
* Active Record
* PSR-4

## Como instalar
    git clone https://github.com/BuenoDev/crud-varejo-web

    cd crud-varejo-web

    composer update

Voce pode utilizar wamp, xamp, ou qualquer servidor local para executar.
Pode também acionar um servidor local via console usando php na pasta do sistema.


    cd public
    php -S localhost:8000

Agora é só abrir o navegador e digitar -  'http://localhost:8000'

Para utilizar o banco de dados, é necessario criar um arquivo de banco 
MySql local com o nome 'varejo_web' ou então modificar o arquivo config.exemple.php
trocando o valor do campo 'dbsa' para o nome do banco de dados criado.

#
