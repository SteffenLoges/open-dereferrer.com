# Open-Dereferrer.com

- dereferrer and url obfuscator
- supports base64-encoded URLs
- works without javascript
- option to skip the splash screen 

### example
[open-dereferrer.com](https://open-dereferrer.com "open-dereferrer.com")

### nginx config

```nginx
# redirect http to https
server {
  listen 80;
  server_name open-dereferrer.com *.open-dereferrer.com;
  return 301 https://$host$request_uri;
}

# api
server {
  listen 443 ssl;

  server_name api.open-dereferrer.com;

  ssl_certificate /etc/letsencrypt/live/open-dereferrer.com-0001/fullchain.pem;
  ssl_certificate_key /etc/letsencrypt/live/open-dereferrer.com-0001/privkey.pem;
  include /etc/letsencrypt/options-ssl-nginx.conf;
  ssl_dhparam /etc/letsencrypt/ssl-dhparams.pem;

  root "/var/www/open-dereferrer/api";

  autoindex off;

  location ~ /\.ht {
      deny all;
  }

  location ~ ^/v1/(min|plain)$ {
    expires 30d;
    try_files /v1/$1.js = 404;
  }

}

# main
server {

  listen 443 ssl;

  server_name open-dereferrer.com *.open-dereferrer.com;

  ssl_certificate /etc/letsencrypt/live/open-dereferrer.com-0001/fullchain.pem;
  ssl_certificate_key /etc/letsencrypt/live/open-dereferrer.com-0001/privkey.pem;
  include /etc/letsencrypt/options-ssl-nginx.conf;
  ssl_dhparam /etc/letsencrypt/ssl-dhparams.pem;

  root "/var/www/open-dereferrer";

  autoindex off;

  index index.php;

  location ~ /\.ht {
    deny all;
  }

  location / {
    try_files $uri $uri/ /index.php?$args;
  }

  location ~\.php$ {
    include snippets/fastcgi-php.conf;
    fastcgi_pass unix:/run/php/php8.0-fpm.sock;
    fastcgi_hide_header X-Powered-By;
  }

}
```
