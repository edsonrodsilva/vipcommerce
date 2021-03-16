
# VIPCOMMERCE
**Backend**

Criar uma API que contenha as seguintes Resources e
suas rotas
*API RESTful*


Existem inúmeras formas de deixar seu aplicativo com uma estrutura pronta para evolução, com funcionalidade comum de acesso a dados, fornecendo melhor capacidade de manutenção e desacoplando a infraestrutura ou tecnologia usada para acessar bancos de dados da camada de modelo de domínio.


## Features
Backend
Criar uma API que contenha as seguintes Resources e
suas rotas
API RESTful

    1. RESOURCE Clients

    2. RESOURCE Products

    3. RESOURCE Orders
        - Enviar pedido por email
        - Gerar pedido em pdf
        - Download do pdf


## Modeling databases
![Screenshot](/public/images/modelo_database_1_0_4.png)


## Cronagrama de desenvolvimento
![Screenshot](/public/images/cronagrama_de_desenvolvimento_v3.png)


## Rotas | Controllers | Metodos
![Screenshot](/public/images/routes_v3.png)
<!--ts-->
    | GET|HEAD | api/clients
    | POST     | api/clients
    | GET|HEAD | api/clients/{id}
    | PUT      | api/clients/{id}
    | DELETE   | api/clients/{id}
    | GET|HEAD | api/orders
    | POST     | api/orders
    | GET|HEAD | api/orders/{id}
    | PUT      | api/orders/{id}
    | DELETE   | api/orders/{id}
    | POST     | api/orders/{id}/report
    | POST     | api/orders/{id}/sendmail   
    | GET|HEAD | api/products   
    | POST     | api/products   
    | GET|HEAD | api/products/{id}
    | PUT      | api/products/{id}
    | DELETE   | api/products/{id}
<!--te-->

## Instruções para rodar a API local
<!--ts-->
    1- clone o projeto
    2 - Instale as dependencias usando o comando.
    composer install
    3- Crie um banco de dados no mysql sugiro o nome vipcommerce.
    4- Configure o arquivo .env com as credenciais do banco de dados de da sua conta do https://mailtrap.io.
    5- rode as migrations para criar as tabelas. php artisan migrate
    6- rode as seeder para popular as tabelas com dados faker. 
    php artisan db:seed
    7 - levante o servidor usando o comando.
    php artisan serve    
    8- Test a API usando Insomnia ou Postman para acessar os recursos listados abaixo.
    9 - Rode os testes para testar a API
    php artisan test
<!--te-->


## Baixe aqui a collections do postman
[< link da API >](https://github.com/edsonrodsilva/vipcommerce/blob/master/public/API-VIPCOMMENCE.postman_collection.json)


## Tecnologias e ferramentas
<!--ts-->    
    * PHP 7.4
    * PHP-POO
    * Laravel Framework 8.*
    * API RESTful
    * Modelagem de dados
    * MySQL
    * Git
    * Tailwindcss
    * Composer
    * JavaScript
<!--te-->

## O que tentei demostrar ##
<!--ts-->
    * Organização;
    * Simplicidade;
    * Objetividade;
    * Reúso de código;
    * TDD *;
    * Testes unitários *;
    * Testes de integração *;
    * Padronização de código;
    * Padrões de projeto;
    * Alguns dos princípios de SOLID;
<!--te-->

## Conclusão ##
Com mais de 10 anos de experiência me fez ver o quanto é importante tornar seu código mais estruturado. Nunca escrever nenhuma lógica no controlador, está tudo bem se você precisar em um MPV.

Criei a API usando o Repository Pattern. 
Uma Trait para tratar a resposta da API que este mecanismo para reutilização de código em herança única para enviar resposta JSON ao cliente.

Com o objetivo de tornar o código mais estruturado, consistente, isso tornará seu código mais fácil de entender e manter.
Torne seu código mais reutilizável no futuro é muito importante.
