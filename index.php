<?php

	require_once ('core/Model.php');
	require_once ('core/Post.php');

	$post_model = new Post();

	$post_model->select();

	$posts = $post_model->get_posts_with_user();

?>

		<?php require_once('includes/header.php') ?>

		<main>

		<div class="container">


		<div class="row">

		
			<?php

				foreach ($posts as $post) {
					echo 	'<div class="col-md-6">
								<div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
									<div class="col p-4 d-flex flex-column position-static">
										<div class="mb-1 text-muted">'. $post['created_at'] .'</div>
										<strong class="text-primary">'. $post['user_name'] .'</strong>
										<p class="card-text mb-auto">
											'. $post['description'] .'
										</p>
										<a href="post.php?post_id='. $post['id'] .'" class="stretched-link">Continue reading</a>
									</div>';

									if($post['image']){
										echo '<div class="col-auto d-none d-lg-block">
											<img src="storage/posts/'. $post['image'] .'" />
								
										</div>';
									}
							echo '
								</div>
							</div>';
				}
			
			?>

		</div>
		</div>

	</main>
	
	<?php require_once('includes/footer.php') ?>

