# account_demo

Allows you to register for an account, login, update account information, and log out. If you are not logged in and try to access a page requiring a login, you will be redirected back to the login page.

The code is kind of thrown together, since I was learning this all as I was creating the site.

Requires a table with these fields (to function correctly):

<table>
<tr><td>Field</td><td>Type</td><td>Null</td><td>Key</td><td>Default</td><td>Extra</td></tr>
<tr><td>id</td><td>int(11)</td><td>NO</td><td>PRI</td><td>NULL</td><td>auto_increment</td></tr>
<tr><td>username</td><td>char(50)</td><td>NO</td><td></td><td>NULL</td><td>UNIQUE(username)</td></tr>
<tr><td>email</td><td>char(50)</td><td>NO</td><td></td><td>NULL</td><td></td></tr>
<tr><td>first_name</td><td>char(50)</td><td>YES</td><td></td><td>NULL</td><td></td></tr>
<tr><td>last_name</td><td>char(50)</td><td>YES</td><td></td><td>NULL</td><td></td></tr>
<tr><td>unsafe_pass</td><td>char(50)</td><td>NO</td><td></td><td>NULL</td><td></td></tr>
<tr><td>ip</td><td>char(45)</td><td>YES</td><td></td><td>NULL</td><td></td></tr>
<tr><td>date_created</td><td>timestamp</td><td>NO</td><td></td><td>CURRENT_TIMESTAMP</td><td></td></tr>
<tr><td>suspended</td><td>tinyint(1)</td><td>YES</td><td></td><td>0</td><td></td></tr>
</table>
Ip is currently unused, and suspended can only be set by directly accessing the database (although the login will check to see if the user is suspended).
