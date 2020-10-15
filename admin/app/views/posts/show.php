<?php require APPROOT . '/views/inc/header.php'; ?>
<a class="btn btn-light" href="<?php echo URLROOT; ?>/posts">
    <i class="fa fa-backward"></i> Back</a>
<br>
<h1><?php echo $data['post']->title; ?></h1>
<div class="bg-secondary text-white p-2 mb-3">
    Written by <?php echo $data['user']->name; ?> on <?php echo $data['post']->created_at; ?>
</div>
<p class="bg-light p-2 mb-3">Category: <?php echo $data['category']->name; ?></p>
<p><?php echo $data['post']->body; ?></p>

    <hr>
<form class="pull-right" action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->id; ?>" method="POST">
    <input type="submit" value="Delete" class="btn btn-danger">
</form>

<?php require APPROOT . '/views/inc/footer.php'; ?>
