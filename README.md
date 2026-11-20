# Projeto Imobiliária (PHP + MySQL + PDO + MVC)

CRUD de usuários feito nos slides "PHP e MySQL" (partes 1 e 2).

## Estrutura
```
imobiliaria/
├── index.php               # página principal (Bootstrap + roteamento por ?action=)
├── Conexao.php             # conexão PDO com o MySQL
├── controller/
│   └── UsuarioController.php
├── model/
│   ├── Banco.php           # classe abstrata
│   └── Usuario.php
├── view/
│   ├── cadUsuario.php      # formulário (cadastrar e editar)
│   └── listUsuario.php     # listagem (editar e excluir)
└── sql/imobiliaria.sql     # script do banco de dados
```

## Como executar
1. Execute o script `sql/imobiliaria.sql` no MySQL (cria o banco, as tabelas e um usuário de exemplo).
2. Ajuste usuário e senha em `Conexao.php`.
3. Habilite a extensão `pdo_mysql` do PHP.
4. Coloque a pasta no `htdocs` (XAMPP) e acesse `http://localhost/imobiliaria/`
   **ou**, dentro da pasta do projeto, rode: `php -S localhost:8000` e acesse `http://localhost:8000`.

## URLs
- `index.php`                      → formulário de cadastro
- `index.php?action=listar`        → lista de usuários
- `index.php?action=editar&id=1`   → editar o usuário 1
- `index.php?action=excluir&id=1`  → excluir o usuário 1
