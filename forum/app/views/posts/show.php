<?php require APPROOT . '/views/inc/header.php'; ?>
<a class="btn btn-light" href="<?php echo URLROOT; ?>/posts">
    <i class="fa fa-backward"></i> Back</a>
<br>
<h1 class="mt-3"><?php echo $data['post']->title; ?></h1>
<div class="bg-light p-2 mb-3">
    Written by <?php echo $data['user']->name; ?> on <?php echo $data['post']->created_at; ?>
</div>
<p class="bg-light p-2 mb-3">Category: <?php echo $data['category']->name; ?></p>
<p><?php echo $data['post']->body; ?></p>

<?php require APPROOT . '/views/inc/footer.php'; ?>
