# The Archery repository

## What is it?

This is the Archery repository.

## Deployment

As crude as the maintainer was, this is the deployment command:

```
rsync -azP --exclude=.git/ --exclude=.idea/ . you@server:/users/uwarchery/www/
```

## To-do list

What you might want to do:

* Turn the calendar into JS
* Migrate registration page from PHP object persistence to sqlite
* Install a CMS so the entire website is obsolete
* Make the entire site static