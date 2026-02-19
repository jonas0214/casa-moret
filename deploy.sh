#!/bin/bash

# Variables
USER_HOST="-p 65002 u735482623@194.164.64.243"
PROJECT_PATH="public_html/injoepropuesta2"
GIT_REPO="https://github.com/jonas0214/casa-moret.git"

echo "🚀 Iniciando proceso de limpieza y despliegue en Hostinger..."

ssh $USER_HOST << EOF
    cd $PROJECT_PATH || { echo "❌ No se encontró la carpeta del proyecto"; exit 1; }

    echo "🧹 Borrando archivos actuales (excepto .env y storage)..."
    # Guardamos el .env si existe para no perder la config de BD
    if [ -f .env ]; then cp .env ../.env_backup; fi
    
    # Borrar todo el contenido
    find . -mindepth 1 -delete

    echo "📥 Clonando el repositorio desde Git..."
    git clone $GIT_REPO .

    echo "⚙️ Restaurando configuración y dependencias..."
    if [ -f ../.env_backup ]; then 
        mv ../.env_backup .env
        echo "✅ Archivo .env restaurado"
    else
        echo "⚠️ No se encontró .env previo, asegúrate de configurarlo"
    fi

    # Instalación de dependencias (asumiendo que composer y npm están disponibles)
    composer install --no-dev --optimize-autoloader
    
    # Compilar assets si es necesario
    # npm install && npm run build

    echo "🗄️ Ejecutando migraciones..."
    php artisan migrate --force

    echo "✨ Optimizando caché de Laravel..."
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache

    echo "✅ ¡Proyecto recargado exitosamente!"
EOF
