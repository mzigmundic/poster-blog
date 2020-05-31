<?php require APPROOT . '/views/includes/header.php'; ?>


<div class="row">
	<div class="col-md-6 mx-auto">
		<div class="card card-body bg-light mt-5">
			<h2>Create an Account</h2>
			<p>Fill out this form to register</p>
			<form action="<?= URLROOT; ?>/users/register" method="post">
				<div class="form-group">
					<label for="name">Name: </label>
					<input type="text" name="name" class="form-control form-control-lg <?= (!empty($data['name_error'])) ? 'is-invalid' : ''; ?>" value="<?= $data['name']?>">
					<span class="invalid-feedback"><?= $data['name_error']; ?></span>
				</div>
				<div class="form-group">
					<label for="email">Email: </label>
					<input type="email" name="email" class="form-control form-control-lg <?= (!empty($data['email_error'])) ? 'is-invalid' : ''; ?>" value="<?= $data['email']?>">
					<span class="invalid-feedback"><?= $data['email_error']; ?></span>
				</div>
				<div class="form-group">
					<label for="password">Password: </label>
					<input type="password" name="password" class="form-control form-control-lg <?= (!empty($data['password_error'])) ? 'is-invalid' : ''; ?>" value="<?= $data['password']?>">
					<span class="invalid-feedback"><?= $data['password_error']; ?></span>
				</div>
				<div class="form-group">
					<label for="password_confirm">Confirm Password: </label>
					<input type="password" name="password_confirm" class="form-control form-control-lg <?= (!empty($data['password_confirm_error'])) ? 'is-invalid' : ''; ?>" value="<?= $data['password_confirm_error']?>">
					<span class="invalid-feedback"><?= $data['password_confirm_error']; ?></span>
				</div>

				<div class="row">
					<div class="col">
						<input type="submit" value="Register" class="btn btn-success btn-block">
					</div>
					<div class="col">
						<a href="<?= URLROOT ?>/users/login" class="btn btn-light btn-block">Login</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>


<?php require APPROOT . '/views/includes/footer.php'; ?>