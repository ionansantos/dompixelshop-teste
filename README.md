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
cd dompizelshop

cp .env .env_copy

docker compose up -d --build  " se for o caso use sudo "

... 
 
```

## Casos de Uso

Explique com mais detalhes como a sua aplicação poderia ser utilizada. O uso de **gifs** aqui seria bem interessante. 

Exemplo: Caso a sua aplicação tenha alguma funcionalidade de login apresente neste tópico os dados necessários para acessá-la.

## JSON :floppy_disk:

## os dados da aplicação são salvos em duas tabelas

### Product: 

|id|name|description|price|quantity|
| -------- |-------- |-------- |-------- |-------- |

### Amount:

|id|product_id|amount|
| -------- |-------- |
... 

## Iniciando/Configurando banco de dados

Se for necessário configurar algo antes de iniciar o banco de dados insira os comandos a serem executados 
)

## Resolvendo Problemas :exclamation:

Em [issues]() foram abertos alguns problemas gerados durante o desenvolvimento desse projeto e como foram resolvidos. 


Liste o time responsável pelo desenvolvimento do projeto

| [<img src="https://avatars2.githubusercontent.com/u/46378210?s=400&u=071f7791bb03f8e102d835bdb9c2f0d3d24e8a34&v=4" width=115><br><sub>Diana Regina</sub>](https://github.com/Diana-ops) |  [<img src="https://avatars2.githubusercontent.com/u/46378210?s=400&u=071f7791bb03f8e102d835bdb9c2f0d3d24e8a34&v=4" width=115><br><sub>Diana Regina</sub>](https://github.com/Diana-ops) |  [<img src="https://avatars2.githubusercontent.com/u/46378210?s=400&u=071f7791bb03f8e102d835bdb9c2f0d3d24e8a34&v=4" width=115><br><sub>Diana Regina</sub>](https://github.com/Diana-ops) |
| :---: | :---: | :---: 

## Licença 

The [MIT License]() (MIT)

Copyright :copyright: Ano - Titulo do Projeto
