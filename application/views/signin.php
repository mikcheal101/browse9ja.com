<nav class="navbar navbar-light bg-white navbar-fixed-top">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h3 class="navbar-brand m-b-0">
					<?=anchor ('/', 'browse9ja', ['class' => '']);?>					
				</h3>
				<ul class="nav navbar-nav pull-xs-right">
					<li class="nav-item">
						<?=anchor ('sign-up', 'sign up', ['class' => 'nav-link']);?>
					</li>
					<li class="nav-item">
						<?=anchor ('sign-in', 'sign in', ['class' => 'nav-link active']);?>
					</li>
				</ul>
			</div>
		</div>
	</div>
</nav>

<div class="container m-t-3 p-t-2">
	<div class="row">
		<div class="col-sm-2">
			<!-- ads -->
		</div>
		<div class="col-sm-8 offset-sm-1">
			<div class="card">
				<div class="card-header bg-white">
					sign in
				</div>
				<div class="card-block">
					<form method="post" action="">
						<div class="form-group ">
							<div class="margin-2">
								<label for="username">Username:</label>
								<input class="form-control" type="text" placeholder="enter username" />
							</div>
						</div>

						<div class="form-group ">
							<div class="margin-2">
								<label for="password">Password:</label>
								<input class="form-control" type="password" placeholder="enter password" />
							</div>
						</div>

						<div class="form-group ">
							<div class="margin-2">
								<button class="btn btn-success btn-block">sign in</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>