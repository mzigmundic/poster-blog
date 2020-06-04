<?php require APPROOT . '/views/includes/header.php'; ?>


<?php flash('post_message'); ?>

<div class="row mb-3">
	<div class="col-md-6">
		<h1>Posts</h1>
	</div>
	<div class="col-md-6">
		<a href="<?= URLROOT ?>/posts/add" class="btn btn-primary pull-right">
			<i class="fa fa-pencil"></i> Add Post
		</a>
	</div>
</div>


<?php foreach($data['posts'] as $post) : ?>
	<div class="card card-body md-3">
		<h4 class="card-title"><?= $post->title; ?></h4>
		<div class="bg-white mb-2">
			Written by <strong><?= $post->name; ?></strong> on <?= $post->postCreated; ?>
		</div>
		<div class="bg-light p-3 mb-2">
			<p class="card-text"><?= $post->body; ?></p>
		</div>
		<a href="<?= URLROOT; ?>/posts/show/<?= $post->postId; ?>" class="btn btn-dark">More</a>
	</div>
<?php endforeach; ?>


<?php require APPROOT . '/views/includes/footer.php'; ?>