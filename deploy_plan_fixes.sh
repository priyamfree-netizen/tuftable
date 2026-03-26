#!/bin/bash
set -e

# Deploy PlanList.php (from /tmp where it was already scp'd previously)
# First check if /tmp/PlanList.php exists, if not we'll copy from the new scp
if [ -f /tmp/PlanList.php ]; then
    sudo cp /tmp/PlanList.php /var/www/tuftable/app/Livewire/Plan/PlanList.php
    echo "PlanList.php deployed from /tmp"
fi

# Deploy plan-list.blade.php
sudo cp /tmp/plan-list.blade.php /var/www/tuftable/resources/views/livewire/plan/plan-list.blade.php
echo "plan-list.blade.php deployed"

# Clear caches
sudo -u www-data php /var/www/tuftable/artisan view:clear
sudo -u www-data php /var/www/tuftable/artisan cache:clear
sudo systemctl reload php8.3-fpm
echo "Caches cleared and PHP-FPM reloaded"
echo "DONE"
