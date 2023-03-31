<ul class="list-group">
    <?php foreach($categories as $category):?>
        <li class="list-group-item"><a href="<?php echo base_url('/categories/posts/'.$category
        ['id']) ?>"><?php echo $category['category_name'];?></a>
        <?php if($this->session->userdata('user_id') == $category['user_id']  ) :  ?>
                <form action="categories/delete/<?php echo $category['id'];?>" class="d-inline float-right" method="post">
                    <input type="submit" class="btn text-danger" value="[ X ]">
                </form>
        <?php endif; ?></li>
    <?php endforeach;?>
</ul>