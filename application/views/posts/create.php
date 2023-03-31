<h2><?php echo $create;?></h2>
<?php echo validation_errors(); ?>
<form action="<?php echo base_url('posts/create') ?>" method="post">
  <div class="form-group mt-4">
    <label for="title">Title</label>
    <input type="text" class="form-control"  name="title" placeholder="Enter Title">
  </div>
  <div class="form-group mt-4">
    <label for="body">Body</label>
    <textarea type="text" class="form-control" name="body" placeholder="Add Body"></textarea>
  </div>
  <select class="form-select" name="category_id" >Categories
    <?php foreach($categories as $category):?>
      <option value="<?php echo $category['id']?>"><?php echo $category['category_name']?></option>
    <?php endforeach;?>
</select>
<div>
    <label for="euserfile">Image</label>
    <input type="file" class="form-control" name="img">
  </div>
  <button type="submit" class="btn btn-secondary mt-4">Create</button>
</form>
