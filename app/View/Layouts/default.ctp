<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<div style="float:left;max-width:75%;">
				<h1>Vulnerable Web Application</h1>
				<p>
					<strong>WARNING:</strong> This is a vulnerable web application. Do NOT
					use: It intentionally contains security vulnerabilities. I do not
					assume any responsibility whatsoever for any damages that occur from
					the use of this application.
				</p>
			</div>
			<div style="float:right;">
				<?php
					if ($this->Session->check('Auth.User')):
						if ($this->Session->read('Auth.User.administrator')):
							if ($this->name == 'Posts'):
								echo $this->Html->link('Users', array('controller' => 'users')).
									' ';
							else:
								echo $this->Html->link('Posts', array('controller' => 'posts')).
									' ';
							endif;
						endif;

						echo $this->Html->link('Edit Profile', array('controller' =>
							'users', 'action' => 'edit',
							$this->Session->read('Auth.User.id'))) . ' ';
						echo $this->Html->link('Logout', array('controller' => 'users',
							'action' => 'logout'));
					else:
						echo $this->Html->link('Login', array('controller' => 'users',
							'action' => 'login'));
					endif;
				?>
			</div>

		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
				);
			?>
			<p>
				<?php echo $cakeVersion; ?>
			</p>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
