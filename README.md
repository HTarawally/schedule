# Schedule V2

<p align="center">
  <img src="../media/app_screenshot.png?raw=true" width="500" />
</p>

## About

A rudimentary system for scheduling tasks that will be repeated on a weekly
basis.

## Requirements

PHP version 5.0.0+, compiled with support for the MySQLi extension will be
needed to run the project. MySQL version 4.1.13 or newer is also needed.

As for front-end requirements, any modern browser with JavaScript enabled
will do, including Internet Explore 8+.

## Installation

Clone this repository and upload the contents of the schedule folder to
your web root.

Open the functions.php file with a text editor of your choice.

<img src="../media/functions_php_top_screenshot.png?raw=true" width="500" />

Search for `define("DBHOST", "localhost");` and edit this line and three lines
that follow to complete the database details setup. Make sure that these
details are correct and the database has already been created in MySQL
before proceeding.

Open a web browser and visit the url you uploaded the project to complete the
database setup.

## Usage

Using the system is pretty straightforward.

To add a new item, look to the bottom left of the screen. Fill in the form
and click "Send Data".

<img src="../media/add_new_item_screenshot.png?raw=true" width="500" />

Once an item is added, it can be edited. Simply click on your required item
and the respective forms will appear at the bottom of the screen.

<img src="../media/editing_screenshot.png?raw=true" width="500" />
