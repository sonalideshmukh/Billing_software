    <div class="container">
        <h2 class="mb-10"style="text-align:left;">Add Product</h2>
        <form method="post" id="create_product" action="<?php echo site_url('product/create_product'); ?>">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2 form-group">
                        <label for="product_name">Product Name:</label>
                    </div>
                    <div class="col-md-3 form-group">
                        <input type="text" class="form-control" name="product_name" required>
                    </div>
                </div>
                 <div class="row">
                    <div class=" col-md-2 form-group">
                        <label for="product_code">Product Code:</label>
                    </div>
                    <div class=" col-md-3 form-group">
                        <input type="text" class="form-control" name="product_code" required>
                    </div>
                </div>
                <div class="row">
                    <div class=" col-md-2 form-group">
                        <label for="gst_rate">Applicable GST Rate:</label>
                    </div>
                    <div class=" col-md-3 form-group">
                        <input type="number" class="form-control" name="gst_rate" required>
                    </div>
                </div>
                <div class="row">
                    <div class=" col-md-2 form-group">
                     <label>&nbsp;</label>
                    </div>
                    <div class=" col-md-2 form-group">
                        <button type="submit" style="padding: 7px !important;" class="btn btn-primary">Add Product</button>
                    </div>
                     <div class=" col-md-1 form-group">
                        <button type="button" style="padding: 7px !important;" class="btn btn-primary">Cancel</button>
                    </div>
                </div>
            <div>
        </form>
    </div>
    <!-- <div class="container mt-4"> -->
            <h2 style="text-align:left;">View Products</h2>
            <div class="table-responsive">
            <table class="table table-striped">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Product Code</th>
                    <th>Applicable GST Rate</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through products and display details dynamically -->
                
                    <?php if ($product): ?>
                        <?php foreach ($product as $key => $product){ ?>
                            <tr>
                             <td><?php echo $product->product_name; ?></h2>
                             <td><?php echo $product->product_code; ?></p>
                             <td><?php echo $product->gst_rate; ?></p>
                            </tr>
                        <?php }?>
                    <?php else: ?>
                        <p>Product not found.</p>
                    <?php endif; ?>
                  
                
                 </tbody>
                        </table>
                    </div>
<!--                 </div>
 --></body>
</html>