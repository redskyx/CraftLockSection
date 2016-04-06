# Lock a page or section

## What is this?

Awful craft extension based on info found here:

http://craftcms.stackexchange.com/questions/8360/protect-a-page-with-a-single-password.

Which is based on this:

https://github.com/lindseydiloreto/craft-businesslogic

##Some Docs

1. Copy Locksection folder to Plugin directory.
2. Create Global Section LockSection (handle name 'locksection')
3. Add field named password
4. Populate password field with pass word you want to use.
5. Add below to pages you want to'lock'

{% if craft.LockSection.accessGranted %}

{# CONTENT YOU WANT TO HIDE HERE #}

{% else %}

{# SHOW FORM #}

   {% if error is defined %}
   <p class="error">{{ error }}</p>
   {% endif %}
   <form method="post" action="" accept-charset="UTF-8">
   <input type="hidden" name="action" value="LockSection/authorize">
   <input type="text" name="pw" value="">
   <input type="submit" value="Log In">
   </form>

{% endif %}
