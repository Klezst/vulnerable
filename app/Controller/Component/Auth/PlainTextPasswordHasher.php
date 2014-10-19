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

App::uses('AbstractPasswordHasher', 'Controller/Component/Auth');

/**
 * Does not hash passwords. Instead just uses the plain text password.
 */
class PlainTextPasswordHasher extends AbstractPasswordHasher {
  public function hash($password) {
      return $password;
  }

  public function check($password, $hashedPassword) {
      return $hashedPassword === $password;
  }
}
