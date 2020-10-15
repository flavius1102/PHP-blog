<?php require APPROOT . '/views/inc/header.php'; ?>
<a class="btn btn-light" href="<?php echo URLROOT; ?>/posts">
    <i class="fa fa-backward"></i> Back</a>
<div class="card card-body bg-light mt-5">
    <h2>Add Post</h2>
    <p>Create a post with this form</p>
    <form action="<?php echo URLROOT; ?>/posts/add" method="POST">
        <div class="form-group">
            <label for="title">Title: <sup class="text-danger">*</sup></label>
            <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>">
            <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
        </div>
        <div class="form-group">
            <label for="category_id">Category: <sup class="text-danger">*</sup></label>
            <select name="category_id" class="form-control form-control-lg <?php echo (!empty($data['category_err'])) ? 'is-invalid' : ''; ?>">
                <option value="">Select Category</option>
                <?php foreach($data['category_id'] as $category) : ?>
                    <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                <?php endforeach; ?>
            </select>
            <span class="invalid-feedback"><?php echo $data['category_err']; ?></span>
        </div>
        <div class="form-group">
            <label for="body">Body: <sup class="text-danger">*</sup></label>
            <textarea name="body" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['body']; ?></textarea>
            <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
        </div>
        <input type="submit" class="btn btn-success" value="Submit">
    </form>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>


