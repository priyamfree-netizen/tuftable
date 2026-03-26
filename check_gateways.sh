#!/bin/bash
sudo -u postgres psql -d laravel -c "SELECT stripe_status, razorpay_status, paypal_status, flutterwave_status, paystack_status, mollie_status, payfast_status, paddle_status, offline_status FROM superadmin_payment_gateways LIMIT 1;"
echo "---packages---"
sudo -u postgres psql -d laravel -c "SELECT id, package_name, package_type, monthly_status, annual_status, half_yearly_status, stripe_monthly_plan_id, stripe_annual_plan_id FROM packages;"
