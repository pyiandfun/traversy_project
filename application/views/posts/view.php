<h2><?php echo $post['title']; ?></h2>
<small><?php echo $post['create_at']; ?></small>
<p><?php echo $post['body']?></p>
<div>
    <img style="width: 300px; height: 300px;" src="<?php echo base_url('assets/images/'. $post['img'])?>" alt="">
</div>
<?php if($this->session->userdata('user_id') == $post['user_id']):?>
    <form action="<?php echo base_url('/posts/delete/'.$post['id']) ?>" class="my-4">
        <a class="btn btn-secondary" href="<?php echo base_url('posts/edit/'.$post['slug']); ?>">Edit</a>
        <input type="submit" value="delete" class="btn btn-secondary">
    </form>
<?php endif;?>
<hr>
<div class="well">
<?php if($comments): ?>
        <?php foreach($comments as $comment) :?>
            <h5><?php echo $comment['body']; ?><strong>[by <?php echo $comment['name']; ?>]</strong></h5>
        <?php endforeach;?>
    <?php else: ?>
    <?php endif; ?>
</div>
<hr>
<h3>Add Comment</h3>
<?php echo validation_errors(); ?>
<?php echo form_open('comment/create/'.$post['id']); ?>
    <div class="form-group">
        <label for="name"></label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="form-group">
        <label for="email"></label>
        <input type="email" name="email" class="form-control">
    </div>
    <div>
        <label for="body">Body</label>
        <textarea name="body" class="form-control" cols="30" rows="10"></textarea>
    </div>
    <input type="hidden" name="slug" value="<?php echo $post['slug']; ?>">
    <button class="btn btn-secondary my-2" type="submit">Submit</button>
</form>
