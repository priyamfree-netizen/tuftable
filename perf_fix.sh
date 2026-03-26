#!/bin/bash
set -e

# 1. Enable OPcache
cat > /tmp/opcache.ini << 'EOF'
opcache.enable=1
opcache.enable_cli=0
opcache.memory_consumption=128
opcache.interned_strings_buffer=16
opcache.max_accelerated_files=10000
opcache.revalidate_freq=60
opcache.validate_timestamps=1
opcache.fast_shutdown=1
opcache.jit=1255
opcache.jit_buffer_size=64m
EOF
sudo cp /tmp/opcache.ini /etc/php/8.3/fpm/conf.d/10-opcache-custom.ini
sudo cp /tmp/opcache.ini /etc/php/8.3/cli/conf.d/10-opcache-custom.ini

# 2. Enable Nginx gzip properly
sudo sed -i 's/# gzip_vary on;/gzip_vary on;/' /etc/nginx/nginx.conf
sudo sed -i 's/# gzip_proxied any;/gzip_proxied any;/' /etc/nginx/nginx.conf
sudo sed -i 's/# gzip_comp_level 6;/gzip_comp_level 5;/' /etc/nginx/nginx.conf
sudo sed -i 's/# gzip_buffers 16 8k;/gzip_buffers 16 8k;/' /etc/nginx/nginx.conf

# Add gzip types if not present
if ! grep -q "gzip_types" /etc/nginx/nginx.conf; then
    sudo sed -i '/gzip_buffers/a\        gzip_types text/plain text/css application/json application/javascript text/xml application/xml application/xml+rss text/javascript;' /etc/nginx/nginx.conf
fi

# 3. Laravel: use file cache instead of database, and cache config/routes
cd /var/www/tuftable
sudo -u www-data php artisan config:cache
sudo -u www-data php artisan route:cache
sudo -u www-data php artisan view:cache

# 4. Reload services
sudo nginx -t && sudo systemctl reload nginx
sudo systemctl restart php8.3-fpm

echo "=== Done ==="
echo "OPcache status:"
php -r "var_dump(opcache_get_status(false)['opcache_enabled'] ?? false);"
