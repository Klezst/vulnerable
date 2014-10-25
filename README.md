# Vulnerable Web App
This is a vulnerable web application. Do NOT use it: This application
intentionally contains security vulnerabilities. I do not assume any
responsibility whatsoever for any damages that occur from the use of this
application. The application is distributed WITHOUT ANY WARRANTY; without even
the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.

I do not condone illegal behavior: this application is meant only as an academic
exercise to help programmers be more aware of security concerns.

## Copyright Notice
This file is part of Vulnerable.

Vulnerable is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

Vulnerable is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Vulnerable.  If not, see <http://www.gnu.org/licenses/>.

## Vulnerabilities
The application has many vulnerabilities, since no attempt was made to harden
the system. Listed here are some examples of vulnerabilities present in the
application.

### Cross-site scripting (XSS)
This vulnerability enables a user to inject malicious scripts into pages served
by the application. An example exploit would be injecting JavaScript to redirect
the user to your own website in a Phishing attempt. To achieve the you would
simply submit the following comment to a blog post.
```html
<script>window.location = "http://aphishingattempt.com";</script>
```

### SQL Injection
You can use this vulnerability to make changes to the website's content. It can
also be used to change user passwords to known values, since the passwords are
stored in plain text. To perform this exploit you would submit the following
comment to a blog post.
```sql
comment', 1, 'hacker'); UPDATE users SET password = 'password1!';
```

### Form Manipulation
Malicious users can directly construct HTTP requests submitting whatever form
data they want. To make it easier, you can simply use Google Chrome's Developer
Tools (press F12 in Google Chrome) to edit the HTML. Firefox has a similar
feature. This can be exploited to bypass authorization: altering your change
password form to include an administrator field set to true. To do this you
would only need to add the following HTML to the form:
```html
<input type="hidden" name="data[User][administrator]" id="UserAdministrator_" value="1">
```

### Cross-site Request Forgery (CSRF)
Exploiting this vulnerability can cause a user to inadvertently perform actions
on the website. The unwilling user visits your website and clicks a button. Your
website then sends a request on behalf of the user to the vulnerable blog
website deleting or editing a post. For example, your website could have the
following HTML form:
```html
<form action="http://192.168.1.168/posts/edit/10" method="post">
  <input name="data[Post][title]" type="hidden" value="I forgot to bring the cookies.">
  <input name="data[Post][message]" type="hidden" value="This is embarrassing.">
  <input type="submit" value="Click Me">
</form>
```

### Putting it Together
You can combine these vulnerabilities together. For example, you can use the
example XSS exploit to redirect the user to your Phishing site whenever they
try to visit the homepage of the vulnerable blog. Then your Phishing website
could use the example exploit in CSRF to trick the user into performing an
action. The use of the XSS vulnerability made your Phishing website appear more
genuine to the user.

## Fixing the Problem
The application's configuration file (i.e. app/Config/core.php) contains the
configuration option moreSecure. Enabling this option probably removes some of
the vulnerabilities in the application. This allows you to delineate between the
attack resistant code and vulnerable code. In other words, you can see the right
way of programming and the wrong way.

We address the XSS vulnerability by sanitizing all of our input before outputing
it into HTML. This is done via a behavior (i.e.,
app/Model/Behavior/HTMLBehavior.php). The SQL Injection issue is mitigated by
using our framework's built in data management functions, rather than directly
querying the database.

For form manipulation we load CakePHP's SecurityComponent, which serializes each
form's structure and saves it in the session. Similarly SecurityComponent
mitigates the CSRF vulnerability, by inserting a cryptographically secure random
number into each form and saving it in the session. When the user submits a
form, the random number is extracted and compared to the value in the session.
The form is serialized and compared to the value stored in the session also.

Note that even the attack resistant code may contain vulnerabilities, but I made
an effort to make them less vulnerable. I do not assume any responsibility for
any damages that occur from code based on this project, its attack resistant
code or examples. I do not guarantee that the attack resistant code is free
of vulnerabilities.

## Installation
Do not install this software on a production device. You can install the
software by following the [CakePHP installation instructions](
http://book.cakephp.org/2.0/en/installation.html), but use vulnerable's source
code instead of CakePHP's. After completing the CakePHP installation
instructions, run the schema.sql file on the database. You'll probably want to
manually insert an administrator user account into the database too:
```sql
INSERT INTO users (administrator, password, username) VALUES (1, 'YOURPASSWORD', 'YOURUSERNAME');
```

## Technology Colophon
Here's a list of some technologies used by this application.
* [Bootstrap](http://getbootstrap.com)
* [CakePHP](http://cakephp.org)
* [jQuery](https://jquery.org/)
