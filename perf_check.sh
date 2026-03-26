#!/bin/bash
echo "=== RAM ==="
free -h
echo "=== CPU ==="
nproc
echo "=== OPcache ==="
php -r "var_dump(opcache_get_status(false)['opcache_enabled'] ?? false);"
echo "=== Laravel Cache ==="
sudo -u www-data php /var/www/tuftable/artisan config:show cache.default 2>/dev/null || echo "cache check done"
echo "=== Nginx gzip ==="
grep -r "gzip" /etc/nginx/nginx.conf | head -5
echo "=== PHP-FPM workers ==="
grep "pm.max_children\|pm.start_servers\|^pm " /etc/php/8.3/fpm/pool.d/www.conf | grep -v ";"
