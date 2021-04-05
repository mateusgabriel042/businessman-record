# TESTE DA PONTEON - CADASTRO DE EMPRESÁRIOS

Projeto de um pequeno sistema de controle de estacionamento.

## 1. Tecnologias utilizada

	- PHP 7.3 | 8.0
	- Laravel 8
	- v-mask 2.2.4
    - Vue 2.6.12
    - vue-axios 3.2.4
    - vue-moment 4.1.0
    - vue-resource 1.5.2
    - vue-router 3.5.1

## 2. Instalação

### 2.1. Executar Migrations (para criação das tabelas)

Utilize o comando no Artisan:

	- php artisan migrate

### 2.2. Executar os Seeders (para registrar alguns dados para teste)

Utilize os comandos no Artisan:

	- php artisan db:seed

## 3. Observações

### 3.1 alteração de arquivos

No arquivo resource/js/app.js altere o valor da base das rotas para o seu host

    const router = new VueRouter({
        mode: 'history',
        base: '<HOST>',
        routes: routes
    });

Nos arquivos de views no diretorio resource/js/views/businessmans altere a rota dos links da API de acordo com o seu host
    
        await this.axios.post('<host>/api/businessman',this.businessman).then(response=>{ ...
