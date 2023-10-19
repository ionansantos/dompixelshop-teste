<h1>DomPIxelShop</h1> 



> Status do Projeto: :heavy_check_mark: :warning: (desenvolvimento)


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

Liste todas as dependencias e libs que o usuário deve ter instalado na máquina antes de rodar a aplicação 

## Como rodar a aplicação :arrow_forward:

No terminal, clone o projeto: 

```
git clone https://github.com/ionansantos/dompixelshop-teste.git
```
```
cd dompizelshop
```

```
cp .env .env_copy
```
```
docker compose exec app composer install
```
```
docker compose up -d --build  " se for o caso use sudo "
```
```
docker compose exec app chmod 777 -R ./storage ./bootstrap/cache
... 

## Iniciando banco de dados

```
```
 php artisan migrate
```


... 
 
```

## JSON :floppy_disk:

## os dados da aplicação são salvos em duas tabelas

### Product: 

|id|name|description|price|quantity|
| -------- |-------- |-------- |-------- |-------- |

### Amount:

|id|product_id|amount|
| -------- |-------- |


## Resolvendo Problemas :exclamation:
....


Copyright :copyright: 2023 - dompixelshop
