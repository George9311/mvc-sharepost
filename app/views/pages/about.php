<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">
<div class="card-body text-center">
<h1 class="display-4"><?php echo $data['title'];?></h1>
    <p class="lead"><?php echo $data['description'];?></p>
    <p class="lead">App version : <?php echo APPVERSION ?> </p>
</div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>