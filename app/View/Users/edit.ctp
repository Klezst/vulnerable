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

 $admin = $this->Session->read('Auth.User.administrator');
?>

<h2>Edit User</h2>
<?php if ($admin): ?>
  <p>
    Submitting this form will enable the user to login and make blog posts. If you
    make them an administrator, they will also be able to manage users. You'll
    need to notify the user of their login credentials manually, if you change
    their password. Suspending the user will prevent them from logging into the
    system.

    <?php if (Configure::read('moreSecure')): ?>
      <strong>Warning:</strong> You should make it clear that the user should use a
      unique password for this website <abbr title="As Soon As Possible">ASAP</abbr>.
    <?php endif; ?>
  </p>
<?php endif; ?>

<?php
  echo $this->Form->create('User', array(
    'inputDefaults' => array(
      'escape' => FALSE
    )
  ));
  echo $this->Form->hidden('id');
  echo $this->Form->input('username', array(
    'class' => 'form-control',
    'div' => array(
      'class' => 'form-group'
    )
  ));

  // We should be using a password form control, instead of just text.
  // Administrators should not be able to change a users password. They should
  // not be able to see the users password either. Administrators should never
  // know a user's password.
  echo $this->Form->input('password', array(
    'class' => 'form-control',
    'div' => array(
      'class' => 'form-group'
    )
  ));

  if ($admin):
    echo $this->Form->input('administrator', array(
      'required' => FALSE,
      'type' => 'checkbox'
    ));
    echo $this->Form->input('suspended', array(
      'required' => FALSE,
      'type' => 'checkbox'
    ));
  endif;

  echo $this->Form->end(array(
    'class' => 'btn btn-default',
    'label' => 'Save'
  ));
?>
