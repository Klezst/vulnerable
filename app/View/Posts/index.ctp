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

 $poster = $this->Session->check('Auth.User');
?>

<h2>Posts</h2>
<?php if ($poster): ?>
  <?php echo $this->Html->link('Add Post', array('action' => 'add')); ?>
<?php endif; ?>
<?php if ($posts): ?>
  <?php foreach ($posts as $post): ?>
    <h3>
      <?php echo $post['Post']['title']; ?>
      <small>by <?php echo $post['User']['username']; ?></small>
    </h3>
    <?php if ($poster): ?>
        <?php echo $this->Html->link('Edit', array('action' => 'edit',
          $post['Post']['id'])); ?>
        <?php echo $this->Form->postLink('Delete', array('action' => 'delete',
          $post['Post']['id']), array('method' => 'DELETE')); ?>
    <?php endif; ?>
    <p><?php echo $post['Post']['message']; ?></p>

    <?php foreach ($post['Comment'] as $comment): ?>
      <h4>Comment by <?php echo $comment['posted_by']; ?></h4>
      <?php if ($poster): ?>
        <?php echo $this->Form->postLink('Delete', array('controller' =>
          'comments', 'action' => 'delete', $comment['id']), array('method' =>
          'delete')); ?>
      <?php endif; ?>
      <p><?php echo $comment['message']; ?></p>
    <?php endforeach; ?>
    <?php echo $this->Html->link('Add Comment', array('controller' =>
      'comments', 'action' => 'add', $post['Post']['id'])); ?>
  <?php endforeach; ?>
<?php else: ?>
  <p>There are no posts.</p>
<?php endif; ?>
