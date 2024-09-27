# 💰 Sistema Financeiro

Bem-vindo ao Sistema Financeiro! Este aplicativo foi desenvolvido para ajudar no gerenciamento das suas finanças de forma eficiente, oferecendo uma interface intuitiva e fácil de usar.

## 📋 Funcionalidades

- **Gestão de Contas**: Acompanhe contas, datas de vencimento e status de pagamento.
- **Controle de Pagamentos**: Gerencie e atualize pagamentos de forma prática.
- **Visão Geral de Despesas**: Obtenha uma visão detalhada das suas atividades financeiras.
- **Busca e Filtros**: Opções avançadas de busca e filtragem dos registros financeiros.
- **Interface Amigável**: Design limpo e responsivo para uma experiência fluida.

## 🛠️ Tecnologias Utilizadas

### Frontend
- **HTML5**: Estrutura e layout das páginas web.
- **CSS3**: Estilização personalizada e design responsivo.
- **JavaScript**: Interatividade e comportamento dinâmico.
- **Font Awesome**: Ícones para melhor representação visual.

### Backend
- **PHP (Laravel)**: Framework para lidar com a lógica de negócio, rotas e processos backend.
=
### Banco de Dados
- **MySQL**: Banco de dados relacional para armazenar dados de usuários e registros financeiros.

## 🚀 Como Começar

### Pré-requisitos
- Composer para gerenciar dependências PHP.
- Php 8.3.10
- Laravel 10.46.0
### Instalação
    
1. Clone o repositório:
    ```bash
	git clone https://github.com/arthurbritosouza/sistema-financeiro.git
	cd sistema-financeiro
    ```

2. Arquivo .env:
    ```bash
	APP_NAME=Laravel
	APP_ENV=local
	APP_KEY=base64:V5QPj5T7pIpn/eL9B9+kvMD8UziPRqIpVV+CClUg+GY=
	APP_DEBUG=true
	APP_URL=http://localhost

	LOG_CHANNEL=stack
	LOG_DEPRECATIONS_CHANNEL=null
	LOG_LEVEL=debug

	DB_CONNECTION=mysql
	DB_HOST=127.0.0.1
	DB_PORT=3306
	DB_DATABASE=
	DB_USERNAME=root
	DB_PASSWORD=

	BROADCAST_DRIVER=log
	CACHE_DRIVER=file
	FILESYSTEM_DRIVER=local
	QUEUE_CONNECTION=sync
	SESSION_DRIVER=file
	SESSION_LIFETIME=120

	MEMCACHED_HOST=127.0.0.1

	REDIS_HOST=127.0.0.1
	REDIS_PASSWORD=null
	REDIS_PORT=6379

	MAIL_MAILER=smtp
	MAIL_HOST=mailhog
	MAIL_PORT=1025
	MAIL_USERNAME=null
	MAIL_PASSWORD=null
	MAIL_ENCRYPTION=null
	MAIL_FROM_ADDRESS=null
	MAIL_FROM_NAME="${APP_NAME}"

	AWS_ACCESS_KEY_ID=
	AWS_SECRET_ACCESS_KEY=
	AWS_DEFAULT_REGION=us-east-1
	AWS_BUCKET=
	AWS_USE_PATH_STYLE_ENDPOINT=false

	PUSHER_APP_ID=
	PUSHER_APP_KEY=
	PUSHER_APP_SECRET=
	PUSHER_APP_CLUSTER=mt1

	MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
	MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
   ```

3. Instale as dependências:
    ```bash
	composer install
	npm install
    ```
    
3. Configure o ambiente:
    ```bash
	cp .env.example .env
	php artisan key:generate
    ```

4. Rode as migrações do banco de dados:
    ```bash
	php artisan migrate
    ```

5. Suba o servidor web:
    ```bash
	php artisan serve
    ```
### Uso

Acesse [http://localhost:8000](http://localhost:8000) no seu navegador. Registre-se ou faça login para começar a gerenciar suas finanças.


