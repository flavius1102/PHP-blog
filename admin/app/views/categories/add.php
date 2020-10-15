<?php require APPROOT . '/views/inc/header.php'; ?>
<a class="btn btn-light" href="<?php echo URLROOT; ?>/categories">
    <i class="fa fa-backward"></i> Back</a>
<div class="card card-body bg-light mt-5">
    <h2>Add Category</h2>
    <p>Create a new category with this form</p>
    <form action="<?php echo URLROOT; ?>/categories/add" method="POST">
        <div class="form-group">
            <label for="name">Category name: <sup class="text-danger">*</sup></label>
            <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>" autofocus>
            <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
        </div>
        <div class="form-group">
            <input type="hidden" name="is_active" class="form-control form-control-lg <?php echo (!empty($data['is_active_err'])) ? 'is-invalid' : ''; ?>" value="1">
            <span class="invalid-feedback"><?php echo $data['is_invalid_err']; ?></span>
        </div>
        <input type="submit" class="btn btn-success" value="Submit">
    </form>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>




