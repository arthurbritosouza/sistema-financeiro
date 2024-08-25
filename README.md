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
- **Livewire**: Para construção de componentes dinâmicos e interativos no Laravel.

### Banco de Dados
- **MySQL**: Banco de dados relacional para armazenar dados de usuários e registros financeiros.

### DevOps e Deploy
- **Docker**: Containerização para garantir um ambiente de desenvolvimento e deployment consistente.

## 🚀 Como Começar

### Pré-requisitos
- Docker instalado na sua máquina.
- Composer para gerenciar dependências PHP.
- Node.js para gerenciar dependências do frontend.

### Instalação

1. Clone o repositório:
    ```bash
    git clone https://github.com/seu-usuario/seu-repositorio.git
    cd seu-repositorio
    ```

2. Configure o ambiente:
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

3. Instale as dependências:
    ```bash
    composer install
    npm install
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


