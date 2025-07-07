# Reminder-application #
![Gemini_Generated_Image_h5c090h5c090h5c0](https://github.com/user-attachments/assets/07e15e51-c96c-441f-a6b8-f049cc87fad7)
**Introduction:**
This is a small, standalone PHP-based Reminder App that runs on a local web server.  
It was created as a personal learning project to explore PHP, CRUD operations, and automated mailing via SMTP (Simple Mail Transfer Protocol).

The app works out of the box on local environments like my other project, [**Webserver-Rethink**](https://github.com/Tyomus/Webserver-rethink) or can be embedded into any website.

## Features ##

- Add, edit, and delete reminders (CRUD)
- Each reminder includes: title, description, due date, notice date, and email (for the reminder to be send to).
- [**PHPMailer**](https://github.com/PHPMailer/PHPMailer) for the SMTP email sending
- Lightweight setup – no external dependencies required beyond an SMTP provider

## Setup Guide: ##

**1 .** Prepare the PC (`or other`) environment  
(Tested on Ubuntu 22.04 “Jammy”, should work on any Debian‑based distro)

`sudo apt update`

`sudo apt install php php-cli php-mbstring php-xml` -> PHP environment

`sudo apt install mariadb-server mariadb-client php-mysql` -> MariaDB environment

`sudo apt install composer` -> Composer (PHP Dependency manager) for installing PHPMailer

`composer require phpmailer/phpmailer` -> for installing PHPMailer
*Alternatively* [Download](https://github.com/PHPMailer/PHPMailer)
Unzip and place the PHPMailer/src folder in private/PHPMailer/.

**2.** Clone this repository for the prepared code environment

**3.** Configure the database connection
private/db.inc.php -> 





creathe an accout by an SMTP  (Simple Mail Transfer Protocol) Provider like Brevo.
