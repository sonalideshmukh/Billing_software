    <div class="container mt-4">
        <h2 style="text-align:left;">Add <?php echo $page_name;?></h2>
        <form method="post" action="<?php echo site_url($action_url); ?>">
            <!-- Seller form fields go here -->
           <div class="col-md-12">
            <div class="row">
                <div class="col-md-2 form-group">
                <label for="name">Name</label>
                </div>
                <div class="col-md-3 form-group">
                <input type="text" name="name" class="form-control" required>
                </div>
            </div>
             <div class="row">
             <div class=" col-md-2 form-group">
                <label for="gstin">GSTIN</label>
            </div>
            <div class=" col-md-3 form-group">
                <input type="text" name="gstin" class="form-control" required>
            </div>
        </div>
         <div class="row">
            <div class=" col-md-2 form-group">
                <label for="address">Address</label>
            </div>
            <div class=" col-md-3 form-group">
                <textarea name="address" class="form-control" rows="3" required></textarea>
            </div>
        </div>
        <div class="row">
            <div class=" col-md-2 form-group">
                 <label >&nbsp;</label>
            </div>
             <div class=" col-md-3 form-group">
            <button type="submit" style="padding: 7px !important;" class="btn btn-primary">Add <?php echo $page_name;?></button>
        </div>
    </div>
    </div>
        </form>
    </div>
 <div class="container mt-4">
            <h2 style="text-align:left;">View <?php echo $page_name;?></h2>
            <div class="table-responsive">
            <table class="table table-striped">
            <thead>
                <tr>
                    <th><?php echo $page_name;?> Name</th>
                    <th>Gstin</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through products and display details dynamically -->
                
                    <?php if($seller){ ?>
                        <?php foreach ($seller as $key => $seller){ ?>
                            <tr>
                             <td><?php echo $seller->name; ?></h2>
                             <td><?php echo $seller->gstin; ?></p>
                             <td><?php echo $seller->address; ?></p>
                            </tr>
                        <?php }?>
                    <?php }else{?>
                         <tr><td><?php echo $page_name;?> not found.</td><td></td><td></td> </tr>
                    <?php }?>
            </tbody>
        </table>
            </div>
            </div>
</body>
</html>