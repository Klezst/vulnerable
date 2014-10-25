# Vulnerable Web App
This is a vulnerable web application. Do NOT use: It intentionally contains
security vulnerabilities. I do not assume any responsibility whatsoever for any
damages that occur from the use of this application. The application is
distributed WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.

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
password form to point to a different user thus changing their password. To do
this you would only need to change the value of the hidden id field to another
value.

### Cross-site Request Forgery (CSRF)
Exploiting this vulnerability can cause a user to inadvertently perform actions
on the website. The unwilling user visits your website and clicks a button. Your
website then sends a request on behalf of the user to the vulnerable blog
website deleting or editing a post. For example, your website could have the
following HTML form:
```html
<form action="http://vulnerableblog.com/posts/edit/1" method="post">
  <input name="message" type="hidden" value="This is embarrassing.">
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

Note that even the attack resistant code may contain vulnerabilities, but I made
an effort to make them less vulnerable. I do not assume any responsibility for
any damages that occur from code based on this project, its attack resistant
code and examples. I do not guarantee that the attack resistant code is free
of vulnerabilities.

## Technology Colophon
Here's a list of some technologies used by this application.
* [CakePHP](http://cakephp.org)
