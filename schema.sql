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

/**
 * This SQL script creates the database schema for Vulnerable and adds an admin
 * account.
 */

CREATE TABLE comments (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  message TEXT NOT NULL,
  posted_by VARCHAR(32) NOT NULL,
  post_id INT NOT NULL -- This should have a foreign key constraint.
);

CREATE TABLE posts (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  message TEXT NOT NULL,
  title VARCHAR(64) NOT NULL,
  user_id INT NOT NULL -- This should have a foreign key constraint.
);

CREATE TABLE users (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  administrator BOOLEAN NOT NULL DEFAULT FALSE,
  password VARCHAR(32) NOT NULL,
  suspended BOOLEAN NOT NULL DEFAULT FALSE,
  username VARCHAR(32) NOT NULL UNIQUE
);
