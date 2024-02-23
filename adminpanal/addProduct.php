<?php
include('query.php');
include('header.php');
?>
            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">
                    <div class="col-md-6 text-center">
                        <h3>add Product</h3>
                        <form action="" method="post"enctype="multipart/form-data">
                          <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="ProductName" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            <div class="form-group">
                            <label for="">Price</label>
                            <input type="text" name="ProductPrice" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            <div class="form-group">
                            <label for="">Quantity</label>
                            <input type="text" name="ProductQuantity" id="" class="form-control" placeholder="" aria-describedby="helpId">
                          </div>
                          <div class="form-group">
                            <label for="">Image</label>
                            <input type="text" name="ProductImage" id="" class="form-control" placeholder="" aria-describedby="helpId">
                           
                          </div>
                          <div class="form-group">
                            <label for="">Description</label>
                            <input type="text" name="ProductDes" id="" class="form-control" placeholder="" aria-describedby="helpId">
                          </div>
                          <div class="form-group">
                            <label for="">Select category</label>
                            <select class="form-control" name="Cid" id="">
                              <option>Select category</option>
                             <?php
                             $query = $pdo->query("select * from categories");
                             $allCategories = $query->fetchAll(PDO::FETCH_ASSOC);
                             foreach ($allCategories as $cat) {
                              ?>
                              <option value="<?php echo $cat['id']?><?php echo $cat['Name']?>"></option>
                                 <?php
                             }
                             ?>
                            </select>
                          </div>

                          <button name="addProduct"class="btn mt-3 btn-primary"type="submit">add Product</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Blank End -->


