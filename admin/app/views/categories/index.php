<?php require APPROOT . '/views/inc/header.php'; ?>
<a class="btn btn-light" href="<?php echo URLROOT; ?>">
    <i class="fa fa-backward"></i> Back</a>
<br>
<br>
<?php flash('category_message'); ?>
<div class="row mb-3">
    <div class="col-md-6">
        <h1>Categories</h1>
    </div>
    <div class="col-md-6">
        <a href="<?php echo URLROOT; ?>/categories/add" class="btn btn-primary pull-right">
            <i class="fa fa-pencil"></i>
            Add New Category
        </a>
    </div>
</div>
<?php foreach($data['categories'] as $category) : ?>
    <p><?php echo $category->name; ?> <a class="btn btn-warning" href="<?php echo URLROOT; ?>/categories/show/<?php echo $category->categoryId; ?>">Edit or Inactivate</a></p>
<?php endforeach; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>
