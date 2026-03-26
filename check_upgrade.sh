#!/bin/bash
# Check recent Laravel errors related to package update
sudo tail -100 /var/www/tuftable/storage/logs/laravel.log | grep -A 10 "UpdatePackage\|update.*package\|packageUpdated\|somethingWentWrong" | tail -80
