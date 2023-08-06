
<div class="container mt-4">
        <h2 style="text-align:left;">Transaction Report</h2>
        <form method="get" action="<?php echo site_url('Transaction_controller/view_transaction_report'); ?>">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="from_date">From Date</label>
                    <input type="date" id="from_date" name="from_date" class="form-control" value="<?php echo $from_date;?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="to_date">To Date</label>
                    <input type="date" id="to_date" name="to_date" value="<?php echo $to_date;?>" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label for="product">Product</label>
                    <select id="product" name="product" class="form-control">
                        <option value="">All Products</option>
                        <?php foreach ($products as $product): ?>
                            <?php  $selected = $_GET['product'] == $product->id ? 'Selected':'';?>
                        <option value="<?php echo $product->id; ?>" <?php echo  $selected;?>><?php echo $product->product_name; ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="product">Type</label>
                    <select id="type" name="type" class="form-control">
                        <option value="">All Type</option>
                        <?php foreach ($types as $key=>$types): ?>
                            <?php  $selected = $_GET['type'] == $key ? 'Selected':'';?>
                        <option value="<?php echo $key; ?>" <?php echo  $selected;?>><?php echo $types; ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                 <div class="form-group col-md-1">
                 <label for="product">&nbsp;</label>
                <button style="padding: 7px !important;" type="submit" class="btn btn-primary">Get Report</button>
                </div>
            </div>
           
        </form>

<!-- Transaction Report Table -->
<table class="table mt-4">
    <thead>
        <tr>
            <th>Sr.</th>
            <th>Date</th>
            <th>Seller Name</th>
            <th>Buyer Name</th>
            <th>Type</th>
            <th>Qty</th>
            <th>Amt.</th>
            <th>GST</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php if($transaction_data){
         foreach ($transaction_data as $index => $item): ?>
            <tr>
                <tr>
                <td><?php echo $index + 1; ?></td>
                <td><?php echo $item['date']; ?></td>
                <td><?php echo $item['seller_name']; ?></td>
                <td><?php echo $item['buyer_name']; ?></td>
                <td><?php echo $item['type']; ?></td>
                <td><?php echo $item['quantity']; ?></td>
                <td><?php echo $item['quantity']*$item['rate']; ?></td>
                <td><?php echo $item['gst']; ?></td>
                <td><?php echo $item['total']; ?></td>
            </tr>
            </tr>
        <?php endforeach; ?>
    <?php } ?>
    </tbody>
</table>
 </div>
</body>
</html>
