FROM nginx:1.15-alpine
COPY ./conf/default.conf /etc/nginx/conf.d/default.conf
WORKDIR /var/www/app