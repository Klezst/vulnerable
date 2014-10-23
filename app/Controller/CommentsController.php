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

App::uses('AppController', 'Controller');

/**
 * This class processes requests about users.
 */
class CommentsController extends AppController {
  public function add($id = NULL) {
    $this->request->allowMethod(array('GET', 'POST'));

    if ($this->request->is('GET')) {
      if ($this->Comment->Post->exists($id)) {
        $this->request->data['Comment'] = array(
          'post_id' => $id
        );
      } else {
        throw new NotFoundException();
      }
    } else if ($this->request->is('POST')) {
      if ($this->Comment->save($this->request->data)) {
        $this->Session->setFlash($this->Comment->alias . ' Saved');
        $this->redirect(array('controller' => 'posts', 'action' => 'index'));
      }
    }
  }

  public function beforeFilter() {
    parent::beforeFilter();

    $this->Auth->allow('add');
  }

  public function delete($id = NULL) {
    $this->request->allowMethod('DELETE');

    if ($this->Comment->delete($id)) {
      $this->Session->setFlash($this->Comment->alias . ' Deleted');
      $this->redirect(array('controller' => 'posts', 'action' => 'index'));
    } else {
      throw new NotFoundException('No such comment exists');
    }
  }

  public function isAuthorized($user = NULL) {
    return (bool)$user;
  }
}
