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
class PostsController extends AppController {
  public function add() {
    $this->request->allowMethod(array('GET', 'POST'));

    if ($this->request->is('POST')) {
      $this->request->data['Post']['user_id'] = $this->Auth->user('id');
      if ($this->Post->save($this->request->data)) {
        $this->Session->setFlash($this->Post->alias . ' Saved');
        $this->redirect(array('action' => 'index'));
      }
    }
  }

  public function beforeFilter() {
    parent::beforeFilter();

    $this->Auth->allow('index');
  }

  public function delete($id = NULL) {
    $this->request->allowMethod('DELETE');

    if ($this->Post->delete($id)) {
      $this->Session->setFlash($this->Post->alias . ' Deleted');
      $this->redirect(array('action' => 'index'));
    } else {
      throw new NotFoundException('No such post exists');
    }
  }

  public function edit($id = NULL) {
    $this->request->allowMethod(array('GET', 'POST', 'PUT'));

    if ($this->request->is('GET')) {
      $post = $this->Post->find('first', array(
        'conditions' => array(
          'Post.id' => $id
        )
      ));

      if ($post) {
        $this->request->data = $post;
      } else {
        throw new NotFoundException('No such user exists');
      }
    } else if ($this->request->is(array('POST', 'PUT'))) {
      $this->request->data['Post']['user_id'] = $this->Auth->user('id');
      if ($this->Post->save($this->request->data)) {
        $this->Session->setFlash($this->Post->alias . ' Saved');
        $this->redirect(array('action' => 'index'));
      }
    }
  }

  public function index() {
    $this->set('posts', $this->Post->find('all'));
  }

  public function isAuthorized($user = NULL) {
    return (bool)$user;
  }
}
