FROM Ubuntu:22.04
WORKDIR /app
COPY ./LaravelOmgeving
RUN composer install
RUN npm install

