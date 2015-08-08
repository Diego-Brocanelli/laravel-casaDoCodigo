# laravel-casaDoCodigo
Projeto desenvolvido tendo como base o livro - [PHP e Laravel: Crie aplicações web como um verdadeiro artesão](www.casadocodigo.com.br/products/livro-laravel-php) da editora Casa do Código.
# Instalar o framework
```sh
composer install
```
# Iniciar o projeto
```sh
php artisan serve
```
# @DONE
* Introdução
* Novo Projeto com Laravel
* MVC e conexão com banco de dados
* Trabalhando com a view
* Parâmetros da request e URL
* Views mais flexíveis e poderosas
# @TODO
* Request e métodos HTTP
* Eloquent ORM
* Validando os dados de entrada
* Autenticação e segurança
* Mais produtividade com Artisan

# Opcional
#### Configuração do nginx
```sh
server {
    listen 80;
    server_name estoque.dev;
    root /var/www/vhosts/estoque.dev/public;

    index index.html index.htm index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    access_log off;
    error_log  /var/log/nginx/estoque.dev-error.log error;

    error_page 404 /index.php;

    sendfile off;

    location ~ \.php$ {
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        fastcgi_pass unix:/var/run/php5-fpm.sock;
        fastcgi_index index.php;
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_intercept_errors on;
        fastcgi_buffer_size 16k;
        fastcgi_buffers 4 16k;
    }

    location ~ /\.ht {
        deny all;
    }
}
```