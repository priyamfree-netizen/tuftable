#!/bin/bash
sudo -u postgres psql -d laravel -c "\d packages" | grep -E "half_yearly|razorpay"
