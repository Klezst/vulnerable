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

<h2>Add Comment</h2>
<?php
  echo $this->Form->create('Comment');
  echo $this->Form->hidden('post_id');
  echo $this->Form->input('posted_by');
  echo $this->Form->input('message');
  echo $this->Form->end('Save');
?>
