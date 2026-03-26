#!/bin/bash
FILE="/var/www/tuftable/resources/views/livewire/shop/cart.blade.php"

# Replace all microtime() based wire:keys with stable ones
sudo sed -i "s/wire:key='menu-{{ 'all-' . microtime() }}'/wire:key='menu-all'/g" "$FILE"
sudo sed -i "s/wire:key='menu-{{ \$item->id . microtime() }}'/wire:key='menu-{{ \$item->id }}'/g" "$FILE"
sudo sed -i "s/wire:key='menu-item-{{ \$item->id . microtime() }}'/wire:key='menu-item-{{ \$item->id }}'/g" "$FILE"
sudo sed -i "s/wire:key='item-input-{{ \$item->id . microtime() }}'/wire:key='item-input-{{ \$item->id }}'/g" "$FILE"
sudo sed -i "s/wire:key='order-{{ microtime() }}'/wire:key='order-summary'/g" "$FILE"
sudo sed -i "s/wire:key='menu-item-list-{{ microtime() }}'/wire:key='menu-item-list'/g" "$FILE"
sudo sed -i "s/wire:key='menu-item-{{ \$item->id . microtime() }}'/wire:key='menu-item-{{ \$item->id }}'/g" "$FILE"

echo "Done. Remaining microtime calls:"
grep -c "microtime" "$FILE"
