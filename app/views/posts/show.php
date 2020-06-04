<?php require APPROOT . '/views/includes/header.php'; ?>

<a href="<?= URLROOT ?>/posts" class="btn btn-light btn-block"><i class="fa fa-backward"></i> Back</a>
<br>
<h1 class="mb-3"><?= $data['post']->title; ?></h1>
<div class="bg-secondary text-white p-2 mb-3">
	Writen By <?= $data['user']->name; ?> on <?= $data['post']->created_at; ?>
</div>
<p><?= $data['post']->body; ?></p>



<!-- Enable editing only for posts writen by current user -->
<?php if ($data['post']->user_id == $_SESSION['user_id']): ?>
	<hr>
	<a href="<?= URLROOT ?>/posts/edit/<?= $data['post']->id ?>" class="btn btn-dark btn-block mb-3">Edit</a>

	<form action="<?= URLROOT ?>/posts/delete/<?= $data['post']->id ?>" method="POST">
		<input type="submit" value="Delete" class="btn btn-danger btn-block">
	</form>
<?php endif; ?>

<?php require APPROOT . '/views/includes/footer.php'; ?>