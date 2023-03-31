<h2><?php echo $title;?></h2>
<?php echo validation_errors(); ?>
<form action="<?php echo base_url('posts/update') ?>" method="post">
<input type="hidden" name="id" value="<?php echo $post['id'] ?>">
  <div class="form-group mt-4">
    <label for="title">Title</label>
    <input type="text" class="form-control"  name="title" placeholder="Enter Title" value="<?php echo $post['title'];?>">
  </div>
  <div class="form-group mt-4">
    <label for="body">Body</label>
    <textarea type="text" class="form-control" name="body" placeholder="Add Body"><?php echo $post['body'];?></textarea>
  </div>
  <div class="form-group mt-4">
    <select class="form-select" name="category_id" >Categories
      <?php foreach($categories as $category):?>
        <option value="<?php echo $category['id']?>"><?php echo $category['category_name']?></option>
      <?php endforeach;?>
    </select>
  </div>
  <div>
    <label for="exampleInputEmail1">Image</label>
    <input type="file" class="form-control" name="img" value="<?php echo $post['img']; ?>">
  </div>
  <button type="submit" class="btn btn-secondary mt-4">Update</button>
</form>
