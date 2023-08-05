# Billing_software
Billing Software is a web-based application developed in PHP and MySQL for managing sales, purchases, and stock of products.

# Features
Manage products, sellers, purchasers, and customers.
Create purchase bills with auto-calculated GST.
Create sale bills with auto-calculated GST and stock validation.
View stock report with opening, purchase, sale, and current stock quantities.
View transaction report with filters for date, product, and type.
# Requirements
PHP version X.X.X or higher
MySQL database
Web server (e.g., Apache, Nginx)
# Installation
Clone the repository or download the ZIP file.
Create a new MySQL database and import the billing.sql file to set up the required tables and data.
Configure the database connection in application/config/database.php.
Place the project folder in your web server's root directory or set up a virtual host.
Navigate to the application URL in your web browser to access the software.
# Usage
Create products, sellers, purchasers, and customers in their respective sections.
Create purchase bills by providing necessary details, including the product, seller, quantity, and rate.
Create sale bills by providing necessary details, including the product, purchaser, quantity, and rate. The system will validate the stock availability before creating the sale bill.
View the stock report to monitor product quantities based on filters like date and product.
View the transaction report to see detailed purchase and sale transactions based on filters like date, product, and type.
