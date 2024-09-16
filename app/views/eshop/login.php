<?php $this->view("header", $data); ?>
<section id="form"><!--form-->
	<div class="container">
		<div class="row">
			<div class="login-form"><!--login form-->
				<h2>Login to your account</h2>
				<span><?php check_error() ?></span> 
				<form action="#" method="post">
					<input value="<?= isset($_POST['email']) ? $_POST['email'] :''; ?>" name="email" type="text" placeholder="Email" />
					<input value="<?= isset($_POST['password']) ? $_POST['password'] :''; ?>" name="password" type="password" placeholder="Password" />
					<span>
						<input name="chechbox" type="checkbox" class="checkbox">
						Keep me signed in
					</span>
					<button type="submit" class="btn btn-default">Login</button>
				</form>
				<a href="/?url=signup">Don't have account ? SignUp here</a>
			</div><!--/login form-->
		</div>


	</div>

</section><!--/form-->

<?php $this->view("footer"); ?>