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
 * This class represents a user and handles database operations.
 */
class User extends AppModel {
  public $validate = array(
    'administrator' => array(
      'boolean' => array(
        'required' => FALSE,
        'rule' => 'boolean',
        'message' => 'Yes or No Only'
      )
    ),
    'password' => array(
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
        'rule' => array('maxLength', 32),
        'message' => 'Exceedes 32 Characters'
      )
    ),
    'suspended' => array(
      'boolean' => array(
        'required' => FALSE,
        'rule' => 'boolean',
        'message' => 'Yes or No Only'
      )
    ),
    'username' => array(
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
        'rule' => array('maxLength', 32),
        'message' => 'Exceedes 32 Characters'
      ),
      'unique' => array(
        'rule' => 'isUnique',
        'message' => 'Unavailable'
      )
    )
  );
}
