<?php require APPROOT . '/views/inc/header.php'; ?>
<a class="btn btn-light" href="<?php echo URLROOT; ?>/categories">
    <i class="fa fa-backward"></i> Back</a>
<div class="card card-body bg-light mt-5">
    <h2>Edit Category</h2>
    <p>Edit a category with this form</p>
    <form action="<?php echo URLROOT; ?>/categories/edit/<?php echo $data['id']; ?>" method="POST">
        <div class="form-group">
            <label for="name">Name: <sup class="text-danger">*</sup></label>
            <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>">
            <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
        </div>
        <div class="form-group">
            <label for="is_active">Active or Not: <sup class="text-danger">*</sup></label>
            <select name="is_active" class="form-control form-control-lg <?php echo (!empty($data['is_active_err'])) ? 'is-invalid' : ''; ?>">
                <option value="<?php echo $data['is_active']; ?>">Active</option>
                <option value="2">Not Active</option>
            </select>
            <span class="invalid-feedback"><?php echo $data['is_active_err']; ?></span>
        </div>
        <input type="submit" class="btn btn-success" value="Edit">
    </form>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>




