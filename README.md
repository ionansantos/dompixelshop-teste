<h1>DomPixelShop</h1>

<img src="http://img.shields.io/static/v1?label=STATUS&message=CONCLUIDO&color=GREEN&style=for-the-badge"/>

![](pxn.gif)

## Descrição do projeto

<p align="justify">
  Este projeto é uma aplicação web desenvolvida com o framework Laravel e a biblioteca Vue.js usando o Inertia.js, seguindo o padrão de arquitetura (MVC). O sistema tem 
   como objetivo permitir o cadastro, listagem, edição e exclusão de produtos, além de fornecer uma interface de usuário simples e 
   responsiva para desktop e dispositivos móveis.
</p>

## Funcionalidades

:heavy_check_mark: Cadastro de Produtos:
O usuário pode adicionar novos produtos com os seguintes campos:
Nome do produto (campo obrigatório)
Descrição do produto
Preço do produto (campo obrigatório)
Quantidade em estoque (campo obrigatório)

:heavy_check_mark: Listagem de Produtos:
Todos os produtos cadastrados são exibidos na página "Catálogo de Produtos".
Os detalhes mostrados incluem nome, preço e quantidade em estoque.

:heavy_check_mark: Edição de Produtos:
O usuário pode editar os dados de um produto existente.
É possível atualizar os campos: nome, descrição, preço e quantidade em estoque.

:heavy_check_mark: Exclusão de Produtos:
Os produtos existentes podem ser removidos do banco de dados.

:heavy_check_mark: Layout Responsivo:
O front-end da aplicação é desenvolvido dentro do framework Laravel, com um layout simples e responsivo que se adapta a diferentes dispositivos, proporcionando uma experiência de usuário consistente em desktops e dispositivos móveis.

## Pré-requisitos

:warning: [Docker](https://www.docker.com/)

...

## Como rodar a aplicação :arrow_forward:

No terminal, clone o projeto:

```
git clone https://github.com/ionansantos/dompixelshop-teste.git
```

```
cd dompixelshop-teste
```

```
cp .env.example .env
```

```
docker compose up -d --build 
```

```
docker compose exec app composer install  
```

```
docker compose exec app chmod 777 -R ./storage ./bootstrap/cache
...

docker exec app php artisan key:generate
```


## Iniciando banco de dados

```
 docker exec app php artisan migrate
```

## os dados da aplicação são salvos em duas tabelas

### Product:

| id  | name | description | price | quantity |
| --- | ---- | ----------- | ----- | -------- |

### Amount:

| id  | product_id | amount |
| --- | ---------- | ------ |

...

### para instalar as depedencias do npm

```
npm install
npm run build
```

acesse em : http://localhost

## Resolvendo Problemas :exclamation:

```
[x] -  ajustes na loǵica de edição e cadastro de produto 
[x] -  ajustes de responsividade
[x] -  ajustes de validacao formRequest
[x] -  ajustes de conexao do docker   
....

Copyright :copyright: 2023 - dompixelshop
