# 📘 CELLAR SYSTEM

## 📖 Descrição

Este projeto foi desenvolvido como parte da disciplina de **Desenvolvimento Web**.  
O sistema tem como objetivo permitir o gerenciamento de uma adega de bebidas, permitindo operações completas de CRUD (Create, Read, Update e Delete).

## 🎯 Funcionalidades

### Usuário

* Criar, logar e gerenciar conta
* Cadastro, edição, listagem e remoção de bebidas
* Transição das bebidas entre as listas *Adega* e *Lista de Desejo*
* Visualização de um Dashboard com métricas sobre sua adega
* Gerar relatório PDF do Dashboard

### Admin

* Todas as funcionalidades listadas em Usuário
* Criar, editar, listar e deletar tipos
* Listagem e banimento de contas  


## 🧱 Arquitetura do Projeto

O projeto utiliza a arquitetura **MVC *(Model/View/Controller)***.

## 🛠️ Tecnologias Utilizadas

* PHP 8.4
* Laravel 12.0
* Barryvdh DomPDF 3.1
* SQLite *- Compatível com outros Bancos de Dados*

## ⚙️ Como Executar

### Pré-requisitos

* PHP 8.3 ou 8.4 *(recomendado)*
* Composer 
* Node.js 

### Passo a passo

#### 1 | Clone o repositório

```bash id="8g2x9k"
# Clonar o repositório
git clone https://github.com/w4rqu3s/cellar-system.git

# Acessar a pasta
cd cellar-system
```

#### 2 | Instale as dependências

```bash id="8g2x9k"
composer install

npm install
```

#### 3 | Configurar a aplicação

```bash id="8g2x9k"
# Cria o arquivo de env
cp .env.example .env     # LINUX
copy .env.example .env    # WINDOWS

# Gera a chave da aplicação
php artisan key:generate
```

#### 4 | Criar o link de storage

```bash id="8g2x9k"
php artisan storage:link
```

#### 5 | Inicializar o banco de dados

```bash id="8g2x9k"
# Cria as tabelas e popula com as seeders
php artisan migrate --seed --no-interaction --force
```

#### 6 | Build do frontend (Vite)

```bash id="8g2x9k"
npm run build
```

#### 7 | Iniciar a aplicação

```bash id="8g2x9k"
php artisan serve
```

### Login de ADM

* *Email:* admin@gmail.com
* *Senha:* @1234@5678

## 📌 Observações

* Projeto desenvolvido para fins acadêmicos
* Não possui foco em produção
* Algumas funcionalidades podem estar simplificadas

## 👨‍🎓 Autores

- ***Victor Pecine Marques***
- ***Hanae Rosa Terato Ramos***

**Curso:** Técnico em Informática  
**Instituição:** Instituo Federal do Paraná - Campus  Paranaguá