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

App::uses('Controller', 'Controller');

/**
 * This class processes requests about users.
 */
class UsersController extends Controller {
  public function add($id = NULL) {
    $this->request->allowMethod(array('GET', 'POST'));

    if ($this->request->is('POST')) {
      if ($this->User->save($this->request->data)) {
        $this->Session->setFlash($this->User->alias . ' Saved');
        $this->redirect(array('action' => 'index'));
      }
    }
  }

  public function edit($id = NULL) {
    $this->request->allowMethod(array('GET', 'POST', 'PUT'));

    if ($this->request->is('GET')) {
      $user = $this->User->find('first', array(
        'conditions' => array(
          'id' => $id
        )
      ));

      if ($user) {
        $this->request->data = $user;
      } else {
        throw new NotFoundException('No such user exists');
      }
    } else if ($this->request->is(array('POST', 'PUT'))) {
      if ($this->User->save($this->request->data)) {
        $this->Session->setFlash($this->User->alias . ' Saved');
        $this->redirect(array('action' => 'index'));
      }
    }
  }

  public function index() {
    // This query grabs all the user information from the database including the
    // plain text passwords. Since we're not using the password, we should not
    // be reading them.
    $this->set('users', $this->User->find('all'));
  }
}
