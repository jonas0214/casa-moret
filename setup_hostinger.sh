#!/bin/bash

# Variables
USER_HOST="-p 65002 u735482623@194.164.64.243"
PROJECT_PATH="public_html/injoepropuesta2"
GIT_REPO="https://github.com/jonas0214/casa-moret.git"

echo "🚀 Creando directorio y configurando entorno en Hostinger..."

ssh $USER_HOST << EOF
    mkdir -p $PROJECT_PATH
    cd $PROJECT_PATH || { echo "❌ No se pudo acceder a la carpeta"; exit 1; }

    if [ ! -d .git ]; then
        echo "📥 Clonando el repositorio..."
        git clone $GIT_REPO .
    else
        echo "🔄 El repositorio ya existe, actualizando..."
        git pull origin main
    fi

    echo "⚙️ Instalando dependencias de PHP..."
    composer install --no-dev --optimize-autoloader

    echo "⚠️  RECUERDA: Debes configurar el archivo .env manualmente en Hostinger o vía FTP"
    echo "   con los datos de la base de datos de Hostinger."
EOF
