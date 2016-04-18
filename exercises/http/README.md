# HTTP exercises

## Exercise #0: Local web server setup

  - WAMP is installed on the desktop computers in the PC room.
    * Start web server from the Start menu.
    * Save your files under `F:\wamp\www`.
  - Using your personal computers, install depending on your operating system:
    * [WAMP](http://www.wampserver.com/en/) for Windows. Your web root will (mosty likely) be `C:\wamp\www`.
    * [MAMP](https://www.mamp.info/en/) for Mac. Your web root will (mosty likely) be `/Applications/MAMP/htdocs`.
    * LAMP stack for Linux. Depends on your Linux distribution, see, e.g., for [Ubuntu](http://howtoubuntu.org/how-to-install-lamp-on-ubuntu).


## Exercise #1: Testing out a local webserver

  - Copy the [test.html](test.html) page and copy it to the webserver's www root directory.
  - Check [http://localhost/test.html](http://localhost/test.html).
  - Copy the [serverinfo.php](serverinfo.php) file to the webserver's www root directory.
  - Check [http://localhost/serverinfo.php](http://localhost/serverinfo.php).
  - Look at the Apache access log.


## Exercise #2: Form submission (GET)

  - Complete the form in [exercise2.html](exercise2.html) with a checkbox input and a radio input.
  - Set the action property of the form to `formhandler.php`.
  - Complete the [formhandler.php](formhandler.php) file according to the naming of your form variables.
  - Fill out and submit the form. Check the URL in the address bar and try what happens when you reload the page.
  - Look at the Apache access log.


## Exercise #2b: Form submission (POST)

  - Create a copy of the previous form and change the action property of the form to `formhandler2.php`.
  - Additionally, set the method attribute of the form to POST.
  - Complete the [formhandler2.php](formhandler2.php) file according to the naming of your form variables.
  - Fill out and submit the form. Check the URL in the address bar and try what happens when you reload the page.
  - Look at the Apache access log.


## Exercise #3: Setting up a remote webserver

  - Set up Exercises #1 and #2 on the ux.uis server.
