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

<h2>Users</h2>
<?php echo $this->Html->link('Add User', array('action' => 'add')); ?>
<?php if ($users): ?>
  <table>
    <thead>
      <tr>
        <th>Username</th>
        <th>Administrator</th>
        <th>Suspended</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($users as $user): ?>
        <tr>
          <td><?php echo $user['User']['username']; ?></td>
          <td><?php echo $user['User']['administrator'] ? '&#10003;' : ''; ?>
          <td><?php echo $user['User']['suspended'] ? '&#10003;' : ''; ?>
          <td>
            <?php
              echo $this->Html->link('Edit', array(
                'action' => 'edit',
                $user['User']['id']
              ));
            ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php else: ?>
  <p>There are no users.</p>
<?php endif; ?>
