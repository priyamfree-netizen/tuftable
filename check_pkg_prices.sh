#!/bin/bash
sudo -u postgres psql -d laravel -c "SELECT id, package_name, package_type, monthly_status, annual_status, half_yearly_status, monthly_price, annual_price, half_yearly_price FROM packages ORDER BY id;"
