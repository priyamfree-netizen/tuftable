#!/bin/bash
# Fix APP_NAME in .env
sed -i 's/^APP_NAME=.*/APP_NAME="TufTable"/' /var/www/tuftable/.env

# Deploy email template
sudo cp /tmp/email.blade.php /var/www/tuftable/resources/views/vendor/notifications/email.blade.php

# Clear caches
sudo -u www-data php /var/www/tuftable/artisan view:clear
sudo -u www-data php /var/www/tuftable/artisan config:clear
sudo -u www-data php /var/www/tuftable/artisan cache:clear
sudo systemctl reload php8.3-fpm
echo "DONE"
