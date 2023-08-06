 <div class="container mt-4">
        <h2  style="text-align:left;">Create <?php echo $purchase_lable;?> Bill</h2>
        <form method="post" action="<?php echo site_url($action_url); ?>">
           <div class="col-md-12">
            <div class="row">
                <div class="col-md-2 form-group">
                <label for="name">Date</label>
                </div>
                <div class="col-md-3 form-group">
                <input type="date" name="date" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 form-group">
                <label for="product">Product</label>
                 </div>
                <div class="col-md-3 form-group">
                <select name="product" id="product" class="form-control" required>
                    <option value="">Select Product</option>
                    <?php foreach ($products as $product): ?>
                        <option value="<?php echo $product->id; ?>"><?php echo $product->product_name; ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="hidden" id="gst_rate">
                </div>
                </div>
             <div class="row">
                <div class="col-md-2 form-group">
                <label for="seller"><?php echo $seller_lable;?></label>
                 </div>
                <div class="col-md-3 form-group">
                <select name="seller" class="form-control" required>
                    <option value="">Select Seller</option>
                <?php foreach ($sellers as $seller): ?>
                    <option value="<?php echo $seller->id; ?>"><?php echo $seller->name; ?></option>
                <?php endforeach; ?>
            </select>
            </div>
            </div>
              <div class="row">
                <div class="col-md-2 form-group">
                <label for="purchaser">Purchaser</label>
                </div>
                 <div class="col-md-3 form-group">
                <select name="purchaser" class="form-control" required>
                    <option value="">Select Purchaser</option>
                    <?php foreach ($purchasers as $purchaser): ?>
                        <option value="<?php echo $purchaser->id; ?>"><?php echo $purchaser->name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            </div>
           <div class="row">
                <div class="col-md-2 form-group">
            <label for="rate">Rate</label>
            </div>
             <div class="col-md-3 form-group">
            <input type="number"  id="rate"  name="rate" oninput="calculateGST()" class="form-control" required>
            </div>
            </div>
            <div class="row">
                <div class="col-md-2 form-group">
                <label for="qty">Qty</label>
                </div>
                <div class="col-md-3 form-group">
                <input type="number" id="qty" name="qty" oninput="calculateGST()" class="form-control" required>
            </div>
            </div>
           <div class="row">
                <div class="col-md-2 form-group">
                <label for="gst">GST</label>
                </div>
                <div class="col-md-3 form-group">
                <input type="number" id="gst" name="gst" class="form-control" required>
            </div>
            </div>
            <div class="row">
                <div class="col-md-2 form-group">
            <label for="rate">Total</label>
            </div>
             <div class="col-md-3 form-group">
            <input type="number" name="total" id="total" class="form-control" required>
            </div>
            </div>
             <div class="row">
                <div class="col-md-2 form-group">
                <label for="qty">&nbsp;</label>
                </div>
                <div class="col-md-3 form-group">
                <button type="submit" class="btn btn-primary">Create <?php echo $purchase_lable;?> Bill</button>
                </div>
                </div>
            <div>
        </form>
    </div>
</body>
</html>
<script>
    function calculateGST() {
        // Get the rate and quantity values entered by the user
        var rate = parseFloat(document.getElementById('rate').value);
        var qty = parseFloat(document.getElementById('qty').value);

        // Calculate the GST value
        var gstRate = document.getElementById('gst_rate').value; 
        var gstValue = (rate * qty * gstRate) / 100;
        var tot =rate * qty;
        var total_gst =gstValue+tot;
        // Update the GST field with the calculated value
        document.getElementById('gst').value = gstValue.toFixed(2);
        document.getElementById('total').value = total_gst.toFixed(2);
    }
    function getProductGSTRate() {
        var productDropdown = document.getElementById('product');
        var productID = productDropdown.value;

        // Make an AJAX request to the server to fetch the GST rate
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var gstRate = parseFloat(xhr.responseText);
                document.getElementById('gst_rate').value = gstRate.toFixed(2);

            }
        };
        xhr.open('POST', '<?php echo site_url('Purchase_controller/get_gst_rate_ajax'); ?>', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('product_id=' + productID);
    }

    // Attach getProductGSTRate() function to the product dropdown change event
    document.getElementById('product').addEventListener('change', getProductGSTRate);
</script>
