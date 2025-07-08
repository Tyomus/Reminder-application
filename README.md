# Reminder-application #
![Gemini_Generated_Image_h5c090h5c090h5c0](https://github.com/user-attachments/assets/07e15e51-c96c-441f-a6b8-f049cc87fad7)
**Introduction:**
This is a small, standalone PHP-based Reminder App that runs on a local web server.  
It was created as a personal learning project to explore PHP, CRUD operations, and automated mailing via SMTP (Simple Mail Transfer Protocol).

The app works out of the box on local environments like my other project, [**Webserver-Rethink**](https://github.com/Tyomus/Webserver-rethink) or can be embedded into any website.

![Screenshot at 2025-07-07 18-31-07](https://github.com/user-attachments/assets/24b807b9-eb16-4bcd-bd33-6074c1c3e912)


## Features ##

- Add, edit, and delete reminders (CRUD)
- In this current release each reminder includes: title, description, due date, notice date, and email (for the reminder to be send to).
- [**PHPMailer**](https://github.com/PHPMailer/PHPMailer) as a mailer extention for PHP for the SMTP email sending
- Lightweight setup – no external dependencies required beyond an SMTP provider

## Setup Guide: ##

**1 .** Prepare the PC (`or other`) environment  
(Tested on Ubuntu 24.04 “Noble”, should work on any Debian‑based distro)

`sudo apt update`

`sudo apt install php php-cli php-mbstring php-xml` -> PHP environment

`sudo apt install mariadb-server mariadb-client php-mysql` -> MariaDB environment

`sudo apt install composer` -> Composer (PHP Dependency manager) for installing PHPMailer

`composer require phpmailer/phpmailer` -> for installing PHPMailer
or *Alternatively* [Download](https://github.com/PHPMailer/PHPMailer) and place it into the `private/PHPMailer/` folder.

**2.** Clone this repository for the prepared code environment

**3.** Configure the database connection:
- private/db.inc.php (complete it with your database credentials)
- use the "reminders.sql" Dump file for the table structure
        
**4.** SMTP (Simple Mail Transfer Protocol) setup:

PHP's built-in `mail()` function isn't reliable on most systems because:

        - It lacks proper authentication

        - It often gets flagged as spam

That's why this app uses PHPMailer with a trusted SMTP provider.
The provider (like [Brevo](https://developers.brevo.com/docs/smtp-integration), [SMTP2GO](https://www.smtp2go.com/tour/), or [Gmail](https://developers.google.com/workspace/gmail/imap/imap-smtp)) handles the actual email delivery securely and ensures your messages reach their destination without being marked as junk.

In this project, you configure PHPMailer with your SMTP provider’s credentials, and it sends the reminder emails on your behalf.
(I was choosing Brevo for it's outstanding [setup guide](https://developers.brevo.com/docs/smtp-integration) and it allows you to send out freely 300Mails/Day which is more than enough for this project)

**5.** Configure mailing (SMTP):

- Replace the placeholders with your SMTP credentials in the `private/mailer.php` file.

**6.** Start the local server (in this chase a PHP built-in server)
      `php -S 127.0.0.1:8000` (or with port 8080 with the [Phone-Webserver](https://github.com/Tyomus/Webserver-rethink) solution)

**7.** Start using the Application

Browse to `http://127.0.0.1:8000` or `http://localhost:8000` and you are free to use the app and it's features.


## Planned improvements ##

  - Google Calendar [API](https://developers.google.com/workspace/calendar/api/guides/overview) sync
  - Responsive UI (CSS)
