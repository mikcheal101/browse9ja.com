

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
							<?=anchor ('sign-in', 'sign in', ['class' => 'nav-link']);?>
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
			<div class="col-sm-10">
				<div class="col-sm-12 p-x-0">
					<!-- search part -->
					<form >
						<input type="search" name="search" class="form-control" placeholder="search locally for companies" />
					</form>
				</div>
				<br />
				<br />
				<br />
				<!-- categories -->
				<?php for ($i=0; $i<5; $i++) { ?>
				<div class="col-sm-12 p-x-0 m-b-3">
					<!-- search part -->
					<h6>Category</h6>
					<hr>
					<?php for ($x=0; $x<5; $x++) { ?>
					<div class="row" style="padding-bottom: 2px;">
						<a class="col-sm-3 text-xs-center font-12" href="#">
							Baking
						</a>
						<a class="col-sm-3 text-xs-center font-12" href="#">
							Clothing
						</a>
						<a class="col-sm-3 text-xs-center font-12" href="#">
							Shoes
						</a>
						<a class="col-sm-3 text-xs-center font-12" href="#">
							Car rentals
						</a>
					</div>
					<?php } ?>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>

	
</body>
</html>