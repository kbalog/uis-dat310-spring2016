# Setting up Smarty and MySQL on ux.uis.no

## One-time setup

  1. Open homepage on ux.uis.no
     * ssh into badne7.ux.uis.no (e.g., using Putty)
     * type `homepage-open`
     * for more info see the [UX wiki](http://wiki.ux.uis.no/foswiki/Info/HomePage)
  2. Copy Smarty to public_html
     * Use an FTP client, e.g., [FileZilla](https://filezilla-project.org/)
        * during FileZilla installation don't blindly click "Next" as that would install two additional programs that you don't need
     * Use SFTP to copy Smarty to your `public_html` folder
     * If all goes well, going to <http://www.ux.uis.no/~yourusername/Smarty-3.1.21/> will display a list of files
        * Replace 3.1.21 with your Smarty version
  
## Setting up a Smarty project

  1. Set the `SMARTY_DIR` in PHP 
     * You can use an absolute path `/home/stud/yourusername/public_html/Smarty-3.1.21/libs/`
     * or a relative one, e.g., `../Smarty-3.1.21/libs/`
     * Replace 3.1.21 with your Smarty version
  2. Set the `PROJECT_DIR` in PHP. 
     * You can simply leave it empty `define("PROJECT_DIR", "");`
  3. Make sure your project has a `smarty` directory with the following sub-directories: 
     * `cache`
     * `config`
     * `templates`
     * `templates_c`
  4. `smarty/cache` and `smarty/templates_c` need to be writeable by Apache (`777`)
     * You can set it in FileZilla by right clicking on the directories and "File Permissions"
     * Or, you can ssh into badne7.ux.uis.no, change to the project directory and issue the following to commands:
        * `chmod 777 smarty/cache`
        * `chmod 777 smarty/templates_c`

### Troubleshooting

  * If <http://www.ux.uis.no/~yourusername> does not display any content, then you forgot the homepage-open step. See the top of this document.
  * If you get a Smarty error (*PHP Fatal error: Uncaught --> Smarty: unable to write file ./templates_c/...*), it is because of permission issues. 
    * You can test your setup with `$smarty->testInstall();` This will tell you if Smarty has all the necessary permissions.
    * If you find that `cache` and `templates_c` are not writeable (despite that you set chmod 777), you need to 
      * ssh into badne7.ux.uis.no
      * go to your smarty directory
      * `setfacl --remove-all cache`
      * `setfacl --remove-all templates_c`


## Connecting to MySQL    

  * You have received an email with your MySQL credentials (username, password, database) from the UNIX system administrator. 
    * If you have not received such email, send a mail to Theodor Ivesdal <theo@ux.uis.no> saying that you need a MySQL database for this course. You need to send him your UX username!
  * You can work with the database from the UNIX shell or using a DB management tool, like MySQLWorkbench
  * Mind that you cannot connect directly to the MySQL on UX (for example, setting the host to mysql.ux.uis.no in a PHP script that runs on your localhost will not work); you can connect directly from the other ux.uis machines or use SSH tunneling.

### Connecting to MySQL from UNIX shell

  1. ssh into badne7.ux.uis.no
  2. `mysql -h mysql.ux.uis.no -u balog -p dbbalog`
    * replace `balog` with your MySQL username
    * replace `dbbalog` with your MySQL database
    * use the MySQL password (not the same as your UX password!)
  
### Connecting to MySQL from MySQLWorkbench  

  1. Create a new connection with the following settings
    * Connection method: Standard TCP/IP over SSH
    * SSH hostname: badne7.ux.uis.no
    * SSH username: your UX username
    * SSH password: your UX password
    * MySQL hostname: mysql.ux.uis.no
    * MySQL server port: 3306 (default)
    * Username: your MySQL username
    * Password: your MySQL password
  2. Connect
    * If you get a connection error, you might need to enable *use old authentication protocol* on the Advanced tab
    