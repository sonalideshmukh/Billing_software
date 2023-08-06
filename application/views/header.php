<!DOCTYPE html>
<html>
<head>
    <title>Billing Software</title>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/normalize.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
  <!--   <link rel="stylesheet" href="styles.css"> -->
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 2000px;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    font-weight: bold;
}

.form-control {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.btn-primary {
    display: block;
    width: 100%;
    padding: 10px;
    text-align: center;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.btn-primary:hover {
    background-color: #0056b3;
}

</style>

<header>
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <a class="navbar-brand">Billing Software</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('product/create_product'); ?>">Add Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('Add_details_controller/add_seller'); ?>">Add Seller</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('Add_details_controller/add_purchaser'); ?>">Add Purchase</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('Add_details_controller/add_customer'); ?>">Add Customer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('purchase_controller/create_sales_bill'); ?>">Create Sale Bill</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('purchase_controller/create_purchase_bill'); ?>">Create Purchase Bill</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('stock_controller/view_stock_report'); ?>">Stock Report</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('transaction_controller/view_transaction_report'); ?>">Transaction Report</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
<body>