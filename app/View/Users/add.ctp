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

<h2>Add User</h2>
<p>
  Submitting this form will enable the user to login and make blog posts. If you
  make them an administrator, they will also be able to manage users. You'll
  need to notify the user of their login credentials manually. Suspending the
  user will prevent them from logging into the system.

  <?php if (Configure::read('moreSecure')): ?>
    <strong>Warning:</strong> You should make it clear that the user should use a
    unique password for this website <abbr title="As Soon As Possible">ASAP</abbr>.
  <?php endif; ?>
</p>

<?php
  echo $this->Form->create('User');
  echo $this->Form->input('username', array(
    'class' => 'form-control',
    'div' => array(
      'class' => 'form-group'
    )
  ));

  // We should be using a password form control, instead of just text.
  // The users pasword should be automatically generated by the system.
  // Administrators should never know a user's password.
  echo $this->Form->input('password', array(
    'class' => 'form-control',
    'div' => array(
      'class' => 'form-group'
    )
  ));

  echo $this->Form->input('administrator', array(
    'required' => FALSE,
    'type' => 'checkbox'
  ));
  echo $this->Form->input('suspended', array(
    'required' => FALSE,
    'type' => 'checkbox'
  ));
  echo $this->Form->end(array(
    'class' => 'btn btn-default',
    'label' => 'Save'
  ));
?>
