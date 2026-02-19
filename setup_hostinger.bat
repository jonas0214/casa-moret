@echo off
set USER_HOST=-p 65002 u735482623@194.164.64.243
set PROJECT_PATH=public_html/injoepropuesta2
set GIT_REPO=https://github.com/jonas0214/casa-moret.git

echo 🚀 Creando directorio y configurando entorno en Hostinger...

ssh %USER_HOST% "mkdir -p %PROJECT_PATH% && cd %PROJECT_PATH% && (if [ ! -d .git ]; then echo '📥 Clonando el repositorio...'; git clone %GIT_REPO% .; else echo '🔄 El repositorio ya existe, actualizando...'; git pull origin main; fi) && echo '⚙️ Instalando dependencias de PHP...' && composer install --no-dev --optimize-autoloader && echo '⚠️ RECUERDA: Debes configurar el archivo .env manualmente en Hostinger.'"
