#!/bin/bash
sudo -u postgres psql -d laravel -c "SELECT stripe_status, razorpay_status, paypal_status, flutterwave_status, paystack_status, mollie_status, payfast_status, paddle_status FROM superadmin_payment_gateways LIMIT 1;"
