# Deployer

### Passos para implementação

Copiar a chave publica para dentro de deploy. (Essa chave tem que estar configurada no cpanel do seu servidor, para permitir o acesso)

### htaccess

1. Colocar dentro do {{deploy_path}}

```
Options +FollowSymLinks
RewriteEngine on

RewriteRule ^(.*)$ current/$1 [L]
```

2. Colocar dentro da pasta do projeto (que irá subir para o servidor)

```
Options +FollowSymLinks
RewriteEngine on

RewriteBase /
```

### Para deployar

`$ dep deploy develop`
