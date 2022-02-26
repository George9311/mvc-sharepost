<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('post_message'); ?>
<div class="row">
  <div class="col-sm-4">
    <h2>Posts</h2>
    <h4>
      <?php if ($_SESSION['user_id'] == 2) {
        echo "Buna, " . $_SESSION['user_name'];
      } else {

        echo "Salut, " . $_SESSION['user_name'];
      } ?> </h4>


  </div>
  <div class="col-md-8">
    <a href="<?php echo URLROOT; ?>/posts/add" class="float-end btn btn-success mt-3">
      <i class="fa-solid fa-pen-circle"></i>Add post



    </a>
  </div>
</div>

<!-- <?php foreach ($data['posts'] as $post) : ?>
  
     
    <div class="card card-body mb-3 m-5">
        <h5 class="card-title"><?php echo $post->title; ?></h5>
        <div class="bg-light p-2 mb-3">
            Adaugat de : <?php echo $post->name; ?> in data de:  <?php echo
                                                                  $post->postCreated ?>
        </div>
        <p class="card-text"><?php echo $post->body; ?></p>
        <p class="card-text">Magazin: <?php echo $post->brand; ?></p>
        <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>" class="btn btn-outline-danger ">More</a>
    </div>
    <?php endforeach; ?>
</div> -->

<div class="container">
  <table class="table table-hover m-5">
    <thead>
      <tr>
        <th>Title</th>
        <th>Brand Name</th>
        <th>Utilizator</th>
        <th>Data adaugari</th>
        <th>Descriere</th>
        <th>Marime</th>
        <th>Detalii</th>


      </tr>
    </thead>
    <tbody>
      <?php foreach ($data['posts'] as $post) : ?>
        <tr>
          <td><?php echo $post->title; ?></td>
          <td><?php echo $post->brand; ?></td>
          <td><?php echo $post->name; ?></td>
          <td><?php echo $post->postCreated; ?></td>
          <td><?php echo $post->body; ?></td>
          <td><?php echo $post->sizes; ?></td>



          <td><a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>" class="btn btn-outline-danger ">More</a></td>
          </form>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>




</div>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>