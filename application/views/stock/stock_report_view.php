    <div class="container mt-4">
        <h2 style="text-align:left;">Stock Report</h2>
        <form method="get" action="<?php echo site_url('stock_controller/view_stock_report'); ?>">
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
                 <div class="form-group col-md-1">
                 <label for="product">&nbsp;</label>
                <button style="padding: 7px !important;" type="submit" class="btn btn-primary">Get Report</button>
                </div>
            </div>
           
        </form>

        <!-- Table to display the stock report -->
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Sr.</th>
                    <th>Qty</th>
                    <th>Product</th>
                    <th>Opening</th>
                    <th>Purchase</th>
                    <th>Sale</th>
                    <th>Stock</th>
                </tr>
            </thead>
            <tbody>
               <tbody>
                <?php foreach ($stock_data as $index => $item): ?>
                    <tr>
                        <td><?php echo $index + 1; ?></td>
                        <td><?php echo $item['purchase_qty']; ?></td>
                        <td><?php echo $item['product_name']; ?></td>
                        <td><?php echo ($item['opening']); ?></td>
                        <td><?php echo $item['purchase_qty']; ?></td>
                        <td><?php echo $item['sale_qty']; ?></td>
                        <td><?php echo ($item['purchase_qty'] - $item['sale_qty']+$item['opening']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

            </tbody>
        </table>
    </div>
</body>
</html>
