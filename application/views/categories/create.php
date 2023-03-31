<?php echo validation_errors(); ?>
<form action="<?php echo base_url('categories/create') ?>" method="post">
    <div class="form-group mt-4">
    <label for="category_name">Title</label>
        <input type="text" class="form-control"  name="category_name" placeholder="Enter Category Name">
    </div>
    <button class="btn btn-secondary" type="submit">Create</button>
</form>
