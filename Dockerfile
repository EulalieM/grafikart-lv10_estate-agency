# Utilisation de l'image de base PHP 8.2 en mode CLI
FROM php:8.2-cli

# Mise à jour des paquets et installation des dépendances nécessaires pour installer les extensions zip, GD et Exif
RUN apt-get update && \
    apt-get install -y zlib1g-dev libzip-dev libjpeg-dev libpng-dev && \
    docker-php-ext-configure gd --with-jpeg && \
    docker-php-ext-install zip gd exif

# Téléchargement de Composer et installation dans le dossier /usr/local/bin
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer

# Installation de Node.js et npm
RUN apt-get install -y nodejs npm

# Copie de l'ensemble des fichiers de l'application Laravel dans le conteneur
COPY . /usr/src/app

# Définition du répertoire de travail à /usr/src/app
WORKDIR /usr/src/app

# Installation globale de MailDev
RUN npm install -g maildev

# Exécution du serveur MailDev en arrière-plan avec des options de configuration
CMD maildev --web 80 --smtp 1025 --incoming-user mail@dev.fr --incoming-pass maildevpass & \
    php artisan serve --host=0.0.0.0 --port=8000
