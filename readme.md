## Match Wise Hub
Aplicação desenvolvida como objeto de avaliação do processo seletivo da Keep IT

## Proposta
1° Desenhe uma solução técnica para fazer MATCH de candidatos x vagas da Wisehub. (https://wisehub.com.br/)
2° Apresente o diagrama de solução, indicando tecnologias, frameworks e a lógica de programação."

## Para Executar o Projeto

- Realize o clone do repositório

- Execute o comando para criar as tabelas e inserir alguns dados
    php artisan migrate --seed

- Execute o comando 
    php artisan serve

- Acessa aplicação em: http://localhost:8000

## Arquitetura

- MVC

## Banco de dados

- POSTGRES -> Podendo ser alterado para MySQL

## Diagrama de Solução

- Tecnlogias
    * PHP
    * Laravel 5.3
    * Materialize CSS
     
- Modelo Conceitual
<img src="/resources/assets/docs/ModeloConceitual.png" alt="alt text" height="400px">

- Modelo Lógico
<img src="/resources/assets/docs/modeloLogico.png" alt="alt text" height="400px">


- Screenshots
    * Tela de Perfil do Desenvolvedor
    <img src="/resources/assets/docs/fotoPerfilDev.png" alt="alt text" height="400px">

    * Tela de Perfil da Empresa
    <img src="/resources/assets/docs/printPerfilEmpresa.png" alt="alt text" height="400px">

    * Tela de Lista Canditados por Vaga
    <img src="/resources/assets/docs/devVagasEmpresa.png" alt="alt text" height="400px">

    * Tela de Cadastro de uma Vaga 
    <img src="/resources/assets/docs/criarVaga.png" alt="alt text" height="400px">

    * Tela de Cadastro de Usuário
    <img src="/resources/assets/docs/cadastro.png" alt="alt text" height="400px">

