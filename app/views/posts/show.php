<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT; ?>/posts" class="btn btn-success mt-3"><i class="fa fa-backward"></i> Back</a>

<br>
<h1></h1>
<div class="bg-secondary text-white p-2 mb-3">

  <section id="stats-subtitle">
    <div class="row">
      <div class="col-12 mt-3 mb-1">
        <h4 class="text-uppercase">Adaugat de : <?php echo $data['user']->name; ?> in <?php echo $data['post']->created_at ?></h4>
        <p><?php echo $data['post']->title; ?> &amp; <?php echo $data['post']->brand; ?></p>
      </div>
    </div>

</div>
<div class="col-xl-6 col-md-12">
  <div class="card">
    <div class="card-content">
      <div class="card-body cleartfix">
        <div class="media align-items-stretch">
          <div class="align-self-center">
            <i class="icon-speech warning font-large-2 mr-2"></i>
          </div>
          <div class="media-body">
            <h4><?php echo $data['post']->body; ?></h4>
            <span></span>
          </div>
          <div class="align-self-center">
            <h1></h1>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<p></p>

<div class="col-xl-6 col-md-12">
  <div class="card">
    <div class="card-content">
      <div class="card-body cleartfix">
        <div class="media align-items-stretch">
          <div class="align-self-center">
            <h1 class="mr-2"><?php echo $data['post']->price; ?> Lei</h1>
          </div>
          <div class="media-body">
            <h4>Pret <?php echo $data['post']->brand; ?></h4>
            <span>Monthly Sales Amount</span>
          </div>
          <div class="align-self-center">
            <i class="icon-wallet"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php if ($data['post']->user_id == $_SESSION['user_id']) : ?>
    <hr>
    <a href="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post']->id; ?>" class="btn btn-dark">Edit</a>

    <form class="float-right" action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->id; ?> " method="post">
      <input type="submit" value="Delete" class="btn btn-danger">

    </form>
  <?php endif; ?>

</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>