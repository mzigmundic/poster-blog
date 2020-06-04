<?php require APPROOT . '/views/includes/header.php'; ?>



<a href="<?= URLROOT ?>/posts" class="btn btn-light btn-block"><i class="fa fa-backward"></i> Back</a>
<div class="card card-body bg-light mt-5">

	<h2>Edit Post</h2>
	<p>Edit a post with this form</p>
	<form action="<?= URLROOT; ?>/posts/edit/<?= $data['id']; ?>" method="post">
		<div class="form-group">
			<label for="title">Title: </label>
			<input type="text" name="title" class="form-control form-control-lg <?= (!empty($data['title_error'])) ? 'is-invalid' : ''; ?>" value="<?= $data['title']?>">
			<span class="invalid-feedback"><?= $data['title_error']; ?></span>
		</div>
		<div class="form-group">
			<label for="body">Body: </label>
			<textarea name="body" class="form-control form-control-lg <?= (!empty($data['body_error'])) ? 'is-invalid' : ''; ?>"><?= $data['body'] ?></textarea>
			<span class="invalid-feedback"><?= $data['body_error']; ?></span>
		</div>
		<input type="submit" class="btn btn-success btn-block" value="Submit">
	</form>
</div>




<?php require APPROOT . '/views/includes/footer.php'; ?>