<?php
session_start();
require_once 'helpers/functions.php';
require_once 'core/Model.php';
require_once 'core/Post.php';

if(!is_authenticated()){
	header('location: login.php');
}

$post_model = new Post();
$posts = $post_model->select(['user_id' => $_SESSION['user']['id']]);

?>


<?php require_once('includes/header.php') ?>

<style>
	td img {
		width: 200px;
	}

</style>
<main>

	<div class="container">
		
		<a href="#">New Post</a>

		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<tr>
						<th>#</th>
						<th>Description</th>
						<th>Image</th>
						<th>Action</th>
					</tr>

					<?php
						$i = 1;
						foreach ($posts as $post) {
							echo	"<tr>
								<td>". $i++ ."</td>

								<td class='w-50'>{$post['description']}</td>
								<td>
									".( ($post['image']) ? '<img src="storage/posts/'. $post['image'] .'" />' : '<i>No Image</i>' )."
								</td>

								<td>
									<a href='#'>Edit</a> &nbsp; | &nbsp;
									<a href='#'>Delete</a>
								</td>
							</tr>";
						}
					?>
				</table>
			</div>
		</div>
	</div>

</main>

<?php require_once('includes/footer.php') ?>