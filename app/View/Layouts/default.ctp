<?php
/**
* This file is part of Vulnerable.
*
* Vulnerable is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
*
* Vulnerable is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with Vulnerable. If not, see <http://www.gnu.org/licenses/>.
*/
?>

<!DOCTYPE html>

<html>
	<head>
		<?php echo $this->Html->charset(); ?>
		<title>
			Vulnerable Web Application:
			<?php echo $title_for_layout; ?>
		</title>

		<?php
			echo $this->Html->meta('icon');

			echo $this->Html->css(array(
				'bootstrap.min',
				'custom'
			));
			echo $this->Html->script(array(
				'jquery.min',
				'bootstrap.min'
			));

			echo $this->fetch('meta');
			echo $this->fetch('css');
			echo $this->fetch('script');
		?>
	</head>
	<body>
		<header>
			<nav class="navbar navbar-default" role="navigation">
			  <div class="container-fluid">
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="/">Vulnerable Web Application</a>
			    </div>

			    <div class="collapse navbar-collapse" id="navbar-collapse">
			      <ul class="nav navbar-nav">
							<?php if ($this->Session->check('Auth.User')): ?>
								<?php if ($this->Session->read('Auth.User.administrator')): ?>
									<?php if ($this->name == 'Posts'): ?>
										<li><?php echo $this->Html->link('Users', array(
											'controller' => 'users')); ?></li>
									<?php else: ?>
										<li><?php echo $this->Html->link('Posts', array(
											'controller' => 'posts')); ?></li>
									<?php endif; ?>
								<?php endif; ?>

								<li><?php echo $this->Html->link('Edit Profile', array(
									'controller' => 'users', 'action' => 'edit',
									$this->Session->read('Auth.User.id'))); ?></li>
								<li><?php echo $this->Html->link('Logout', array(
									'controller' => 'users', 'action' => 'logout')); ?></li>
							<?php else: ?>
								<li><?php echo $this->Html->link('Login', array(
									'controller' => 'users', 'action' => 'login')); ?></li>
							<?php endif; ?>
			      </ul>
			    </div>
			  </div>
			</nav>
		</header>
		<main>
			<div class="alert alert-warning" role="alert">
				<strong>WARNING:</strong> This is a vulnerable web application. Do NOT
				use it: This application intentionally contains security
				vulnerabilities. I do not assume any responsibility whatsoever for any
				damages that occur from the use of this application.
			</div>

			<?php $flash = $this->Session->flash(); ?>
			<?php if ($flash): ?>
				<div class="alert alert-info" role="alert"><?php echo $flash; ?></div>
			<?php endif; ?>

			<?php echo $this->fetch('content'); ?>
		</main>
		<footer>
			<?php echo $this->element('sql_dump'); ?>
		</footer>
	</body>
</html>
