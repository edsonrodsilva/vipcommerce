
# VIPCOMMERCE
API RESTful

Existem inumeras formas de deixar seu aplicativo com uma estrutura pronta para evolução, com funcionalidade comum de acesso a dados, fornecendo melhor capacidade de manutenção e desacoplando a infraestrutura ou tecnologia usada para acessar bancos de dados da camada de modelo de domínio.


## Features
    1. RESOURCE Clients

    2. RESOURCE Products

    3. RESOURCE Orders
        - Enviar pedido por email
        - Gerar pedido em pdf        

## Modeling databases
![Screenshot](/public/images/modelo_database.png)

## Cronagrama de desenvolvimento
Infelizmente não deu tempo de concluir o teste por completo.
A entrega acabou coincidindo com as entregas de projetos que estou finalizando.
Se eu puder enviar em outra oportunidade gostaria muito. 
![Screenshot](/public/images/cronagrama_de_desenvolvimento.png)

## Tipos de Rotas
![Screenshot](/public/images/routes.png)

## Instruções para rodar a API local
<!--ts-->
    1- clone o projeto
    2- crie um banco de dados no mysql sugiro o nome vipcommerce.
    3- configure o arquivo .env com as credenciar do banco de dados.
    4- rode as migrations para criar as tabelas.
    5- php artisan migrate
    6- rode o db:seed para popular as tabelas com dados faker. 
    7- php artisan db:seed 
    8- Test a API usando Insomnia ou Postman para acessar os recursos listados abaixo.
<!--te-->


## Baixe aqui a collections do postman
[< link da API >](https://github.com/edsonrodsilva/vipcommerce/blob/master/public/API-VIPCOMMENCE.postman_collection.json)


## Tecnologias e ferramentas
<!--ts-->
    * Sobre
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
    * Testes unitários;
    * Testes de integração;
    * Padronização de código;
    * Padrões de projeto;
    * Alguns dos princípios de SOLID;
<!--te-->

## Conclusão ##
Com mais de 10 anos de experiência me fez ver o quanto é importante tornar seu código mais estruturado. Nunca escrever nenhuma lógica no controlador, está tudo bem se você precisar.
Criei a API usando o Repository Pattern. Com o objetivo de tornar o código mais estruturado, consistente, isso tornará seu código mais fácil de entender e manter.
Torne seu código mais reutilizável no futuro é muito importante.
