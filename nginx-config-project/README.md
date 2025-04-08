# Nginx + Laravel + Docker Setup

Ce projet configure un serveur **Nginx** avec **Docker** pour servir une application **Laravel**. Ce projet inclut une configuration de base de Nginx, Docker, et Docker Compose, et peut être utilisé comme modèle pour personnaliser votre propre application Laravel.

## Structure du projet

- **`conf.d/default.conf`** : Contient la configuration de base du serveur Nginx.
- **`Dockerfile`** : Utilisé pour construire l'image Docker pour l'application Laravel avec PHP-FPM.
- **`docker-compose.yml`** : Décrit les services (MySQL, Laravel, Nginx, phpMyAdmin) et la manière dont ils interagissent.
- **`README.md`** : Documentation pour l'installation et l'utilisation.

## Instructions de mise en place

1. **Clonez le dépôt** :
   ```bash
   git clone <url-du-dépôt>
   LocationVoiture1
