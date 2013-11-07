to setup postfix to send all your mail to the mail eater, 

1) Post Fix Stuff

	a) Add the following to the very end of /etc/postfix/main.cf

		default_transport = file_route

	b) Add the following to the very end of /etc/postfix/master.cf

		file_route unix  -       n       n       -       -       pipe user=$user argv=$path

		Where $user is the value of whoami on the command line and $path is the path to the mail_eater.php function.
		For me
		$user = dougmclean
		$path = /Users/dougmclean/Dropbox/www/mail_eater/mail_eater.php

	c) run the command $sudo postfix reload

3) PHP needs to have mailparse enabled

	a) Install XCode through the AppStore
	b) Install macports if you don't have it already
		check to see if you have mac ports by running the port command - is it there? 
	c) sudo port install autoconf
	d) Download php5.4.4 to /Applications/MAMP/bin/php/php5.4.4/include/php 
	e) cd /Applications/MAMP/bin/php/php5.4.4/include/php/
	e) ./configure --enable-mbstring
	f) sudo /Applications/MAMP/bin/php/php5.4.4/bin/pecl install mailparse
	g) add "extension=mailparse.so" after the line: extension=pdo_mysql.so (my line 540)

4) Install this program

	a) Checkout this git repos to your web accessible directory. Mine is ~/www.
	b) run /Applications/MAMP/bin/php/php5.4.4/bin/php ~/www/mail_eater/test.php
		We are running php explicitly so that we know which version we're running, alternatively, if you've setup symlinks to the right version of php, you don't need to worry about this, check your php version by typing in php -v.
	c) Visit http://localhost/mail_eater/text.txt.  Do you see the letters 'asdf'?

5) If this is working properly, you should be able to visit two pages
	a) Http://localhost/mail_eater/text.txt to see the text version of the email that was sent
	b) Http://localhost/mail_eater/html.html to see the html version of the email that was sent.

	Now go and create software, and know what emails are being sent out without having to actually send the emails.
	
	
