<!-- Begin Site Title
================================================== -->
<div class="container">
	<div class="mainheading">
		<h1 class="sitetitle">Mediumish</h1>
		<p class="lead">
			 Bootstrap theme, medium style, simply perfect for bloggers
		</p>
	</div>
    
	<!-- Begin Featured
	================================================== -->
	<section class="featured-posts">
	<div class="section-title">
		<h2><span>Featured</span></h2>
	</div>
	<div class="card-columns listfeaturedtag">
    <?php foreach($posts as $post):?>
		<!-- begin post -->
		<div class="card d-flex flex-row m-5">
			<div class="row">
				<div class="col-md-5 wrapthumbnail">
					<a href="<?php echo base_url('/posts/'.$post['slug']);?>">
						<div class="thumbnail">
                            <img  style="width: 400px; height:400px;" src="<?php echo base_url('assets/images/'. $post['img'])?>" alt="">
						</div>
					</a>
				</div>
				<div class="col-md-7">
					<div class="card-block">
						<h2 class="card-title"><a href="<?php echo base_url('/posts/'.$post['slug']);?>"><?php echo $post['title'] ?></a></h2>
						<h4 class="card-text"><?php $body=$post['body']; echo substr_replace($body, "...", 500);
                        ?></h4>
						<div class="metafooter">
							<div class="wrapfooter">
								<span class="meta-footer-thumb">
								</span>
								<span class="author-meta">
								<span class="post-name"><a href="#"><?php echo $post['category_name'];?></a></span><br/>
								<span class="post-date"><?php echo $post['create_at'];?></span><span class="dot"></span>
								</span><br>
                                <button class="btn btn-secondary mt-2"> <a class="text-light text-decoration-none" href="<?php echo base_url('/posts/'.$post['slug']);?>">Read More</a></button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    <?php endforeach;?>
	<div class="pagination-links">
		<?php	echo $this->pagination->create_links(); ?>
	</div>
		<!-- end post -->