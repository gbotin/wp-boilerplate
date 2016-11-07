FROM nginx

RUN rm /etc/nginx/conf.d/default.conf
COPY config/wordpress.conf /etc/nginx/conf.d/wordpress.conf

RUN usermod -u 1000 www-data
