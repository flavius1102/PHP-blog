<?php require APPROOT . '/views/inc/header.php'; ?>
<a class="btn btn-light" href="<?php echo URLROOT; ?>/categories">
    <i class="fa fa-backward"></i> Back</a>
<br>
<h1 class="mt-3"><?php echo $data['category']->name; ?></h1>
<hr>
<a class="pull-right btn btn-warning" href="<?php echo URLROOT; ?>/categories/edit/<?php echo $data['category']->id; ?>">Edit or Inactivate</a>

<?php require APPROOT . '/views/inc/footer.php'; ?>
