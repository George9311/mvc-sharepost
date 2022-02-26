 <?php require APPROOT . '/views/inc/header.php'; ?>
 <a href="<?php echo URLROOT; ?>/posts" class="btn btn-success mt-3"><i class="fa fa-backward"></i> Back</a>
 <div class="row">
     <div class="card card-body mt-5">

         <h2>Add post</h2>
         <p>Create a post with this form</p>

         <form action="<?php echo URLROOT; ?>/posts/add" method="post" enctype="multipart/form-data">
             <div class="conatiner">
                 <div class="form-group">
                     <label for="title">Title: <sup>*</sup></label>
                     <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?> " value="<?php echo $data['title']; ?>">
                     <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
                 </div>
                 <div class="form-group">
                     <label for="brand">Brand: <sup>*</sup></label>
                     <input type="text" name="brand" class="form-control form-control-lg <?php echo (!empty($data['brand_err'])) ? 'is-invalid' : ''; ?> " value="<?php echo $data['brand']; ?>">
                     <span class="invalid-feedback"><?php echo $data['brand_err']; ?></span>
                 </div>

                 <div class="form-group">
                     <label for="body">Body: <sup>*</sup></label>
                     <textarea name="body" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['body']; ?> </textarea>
                     <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
                 </div>

                 <div class="form-group mt-2">
                     <label for="price">Adauga pret :</label>
                     <input type="number" name="price" min="1" max="1000" class="form-control form-control-lg <?php echo (!empty($data['price_err'])) ? 'is-invalid' : ''; ?> " value="<?php echo $data['price']; ?>">
                 </div>

                 <div class="form-group mt-4">
                     <label for="sizes">Select size: <sup>*</sup></label>
                     <select name="sizes" class="form-select <?php echo (!empty($data['sizes_err'])) ? 'is-invalid' : ''; ?><?php echo $data['sizes']; ?>" aria-label="Default select example">
                         <option selected>Sizes</option>
                         <option value="XS">XS</option>
                         <option value="S">S</option>
                         <option value="M">M</option>
                         <option value="L">L</option>
                         <option value="XL">XL</option>
                     </select>
                     <span class="invalid-feedback"><?php echo $data['sizes_err']; ?></span>
                 </div>


             </div>

             <div class="form-group">
                 <label for="upload">Example file input</label>
                 <input type="file" class="form-control-file" id="upload">
             </div>


             <input type="submit" class="btn btn-success mt-3" value="Submit">
     </div>
     </form>


 </div>
 </div>

 <?php require APPROOT . '/views/inc/footer.php'; ?>