# contactmailandinstagramgallery
Project: Contact Form with airtable and mailgun. Project: Photo Gallery with instagram API.

## Software Requirement Specifications – Contact Us & Gallery
Project: Contact Form
When a user can't find their answer on our FAQ pages, they should be able to send us their question.
Therefore we need to create a webpage with a form where a user can ask a question.
The question should be emailed to our customer support and saved in a database.
Task
Create a webpage with a form
Submit the form to a php script
Send the form data by email using the API of an external mail service (like:
www.mailgun.com )
Extra/Bonus: Save the record on an Airtable ( https://airtable.com , create your own
account)
Extra/Bonus: Create a MySQL database and save the input data there





Bonus





Pretty design
Input validation (frontend and server side)
Security
Unit testing
Whatever you think would add value
====================================================================
Solution:
Technology Used
Laravel 5.4, PHP 7.1, Mysql 5.6, phpunit, oauth2 [installed not used due to I dont have domain].
DFD
1
Dhiraj PatraSoftware Requirement Specifications – PastBook – Contact Us & Gallery
Pages
 Home
It has menu for both Contact Us and Gallery application.

Contact Us
This is contact us page to give customer details to send mail by mailgun to customer support, save
into DB, save into Airtable.
2
Dhiraj PatraSoftware Requirement Specifications – PastBook – Contact Us & Gallery
After filling form [highly secure with csrf check and validation are there] it showing message
“Thanks for contacting us”.
======================================================================
Project: Photo Gallery
We want to let a user see a gallery of his/her pictures from a cloud service where they are stored.
As cloud service you can use any of these: Facebook, Instagram, Flickr, Dropbox, Google Photos
Task
Let user login on the cloud service
Retrieve some photos via API
Show them in a grid



Bonus




3
Pretty design
Security
Pagination (in case of a lot of photos)
Whatever you think would add value
Dhiraj PatraSoftware Requirement Specifications – PastBook – Contact Us & Gallery
Solution:
Technology Used
Laravel 5.4, PHP 7.1, Mysql 5.6, phpunit, oauth2 [installed not used due to I dont have domain].
DFD
Pages

4
Gallery
Dhiraj PatraSoftware Requirement Specifications – PastBook – Contact Us & Gallery
This page actually a login page to oauth2 [which I have kept ready with all necessary libraries into
application but since I do not have any domain and short time I couldn’t implemented for login with
social netowrking or other site.]
Now need to enter only Instagram username to fetch photos.
After fetching photos [only once and keeping in session with memcached/redis for a specific
account search] in a grid with pagination.
For both projects
Document Folder
/documents/
How to install







5
Extract the zip [incase you are not cloning from Github/repo].
Keep the folder with full permission into your localhost
Create a virtual host to name laravelrest for it
Create a database name “laravelrest”
run command
◦ composer install
◦ php artisan migrate
give folders permissions
change configurations for your application
▪ .env files
▪ mysql database details
▪ mailgun details
Dhiraj PatraSoftware Requirement Specifications – PastBook – Contact Us & Gallery

▪ airtable details [need to create a table in airtable - “questions” with Name, Email and
Message col]
phpunit [create a few for time being, we can add more test cases here - /tests/unit/]
◦ run command
▪ alise phpunit="vendor/bin/phpunit"
▪ phpunit
How to run


go to browser and type your virtual host eg. http://laravelrest/
Follow menu
Any question or issue kindly contact me at dhiraj.patra@gmail.com or skype: dhirajpatra
Ph. +91 7893273022
6
Dhiraj Patra
