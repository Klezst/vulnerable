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
  <p>
    <?php echo $this->Html->link(
      '<span class="glyphicon glyphicon-plus"></span> Add Post',
      array('action' => 'add'), array('class' => 'btn btn-default',
      'escape' => FALSE)); ?>
  </p>
<?php endif; ?>
<?php if ($posts): ?>
  <?php foreach ($posts as $post): ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">
          <?php echo $post['Post']['title']; ?>
          <small>
            by <?php echo $post['User']['username']; ?>
          </small>
          <?php if ($poster): ?>
            <div class="pull-right">
              <?php echo $this->Html->link(
                '<span class="glyphicon glyphicon-pencil"></span>',
                array('action' => 'edit', $post['Post']['id']),
                array('escape' => FALSE)); ?>
              <?php echo $this->Form->postLink(
                '<span class="glyphicon glyphicon-remove"></span>',
                array('action' => 'delete', $post['Post']['id']),
                array('escape' => FALSE, 'method' => 'DELETE')); ?>
            </div>
          <?php endif; ?>
        </h3>
      </div>
      <div class="panel-body">
        <p><?php echo $post['Post']['message']; ?></p>

        <?php foreach ($post['Comment'] as $comment): ?>
          <blockquote>
            <p>
              <?php if ($poster): ?>
                <?php echo $this->Form->postLink(
                  '<span class="glyphicon glyphicon-remove"></span>',
                  array('controller' => 'comments', 'action' => 'delete',
                  $comment['id']), array('escape' => FALSE, 'method' =>
                  'delete')); ?>
              <?php endif; ?>
              <?php echo $comment['message']; ?>
            </p>
            <footer><?php echo $comment['posted_by']; ?></footer>
          </blockquote>
        <?php endforeach; ?>
        <?php echo $this->Html->link('Add Comment', array('controller' =>
          'comments', 'action' => 'add', $post['Post']['id'])); ?>
      </div>
    </div>
  <?php endforeach; ?>
<?php else: ?>
  <p>There are no posts.</p>
<?php endif; ?>
