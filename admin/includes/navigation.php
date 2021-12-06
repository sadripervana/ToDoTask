<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<a href="../index.php" class="navbar-brand">TODO Task</a>
		<ul class="nav navbar-nav">

			<!-- Menu Items-->
			<li><a href="index.php">TO DO</a></li>
			<?php if(has_permission('admin')): ?>
			<li><a href="users.php">Users</a></li>
			<?php endif; ?>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-user"></i> Hello <?=$user_data['first']; ?>!
					<span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="change_password.php"><i class="fas fa-key"></i> Change Password</a></li>
					<li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
				</ul>
			</li>
		</ul>
	</div>
</nav>
