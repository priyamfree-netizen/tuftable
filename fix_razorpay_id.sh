#!/bin/bash
# Clear the invalid razorpay plan IDs from packages (item_xxx are not valid plan IDs)
sudo -u postgres psql -d laravel -c "
UPDATE packages 
SET razorpay_half_yearly_plan_id = NULL,
    razorpay_monthly_plan_id = NULL,
    razorpay_annual_plan_id = NULL
WHERE razorpay_half_yearly_plan_id LIKE 'item_%'
   OR razorpay_monthly_plan_id LIKE 'item_%'
   OR razorpay_annual_plan_id LIKE 'item_%';
"
sudo -u postgres psql -d laravel -c "SELECT id, package_name, razorpay_monthly_plan_id, razorpay_annual_plan_id, razorpay_half_yearly_plan_id FROM packages;"
