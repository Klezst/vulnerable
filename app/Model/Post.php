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

App::uses('AppModel', 'Model');

/**
 * This class represents a post and handles database operations.
 */
class Post extends AppModel {
  public $belongsTo = array(
    'User'
  );

  public $validate = array(
    'message' => array(
      'notEmpty' => array(
        'required' => TRUE,
        'rule' => 'notEmpty',
        'message' => 'May Not Be Blank'
      ),
      'minLength' => array(
        'rule' => array('minLength', 1),
        'message' => 'May Not Be Blank'
      ),
    ),
    'title' => array(
      'notEmpty' => array(
        'required' => TRUE,
        'rule' => 'notEmpty',
        'message' => 'May Not Be Blank'
      ),
      'minLength' => array(
        'rule' => array('minLength', 1),
        'message' => 'May Not Be Blank'
      ),
      'maxLength' => array(
        'rule' => array('maxLength', 64),
        'message' => 'Exceedes 64 Characters'
      )
    )
  );
}
