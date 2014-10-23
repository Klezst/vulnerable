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

App::uses('ModelBehavior', 'Model');
App::uses('Sanitize', 'Utility');

/**
 * This class sanitizes all data read from the database for HTML.
 */
class HTMLBehavior extends ModelBehavior {
  public function afterFind(Model $Model, $results, $primary = FALSE) {
    if ($primary && Configure::read('moreSecure')) {
      $results = Sanitize::clean($results);
    }

    return $results;
  }
}
