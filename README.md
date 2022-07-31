## Requirements

1) Php 7.3+ (Currently Used by the stable version of Debian Stretch)
2) Composer
3) MariaDB

## How to install

1) Clone the repository
2) Run "cp .env.example .env" (Note: Will not work on windows machines.)
3) Edit the .env file and set the database credentials
4) Run "composer install"
5) Run "php artisan key:generate"
6) Run "php artisan migrate"
7) Run "php artisan db:seed"
8) Run "php artisan serve"

## How to use

1) Go to http://localhost:8000/
2) The first admin user is created by the database seeders. Email "admin@gmail.com" and password is "123456789".

## Requirements:
1) Users should be able to register and log in. (Complete)
2) Users should be logged in to complete a booking, but can view and select whilst
unauthenticated. (Complete)
3) Users should be given a unique booking reference number to use as a redemption
method. (No need to mail it, displaying it will be fine.) (Pending)
4) Users should be able to view their booking specifics after having booked.(Complete)
5) Users should be able to cancel a booking up until one hour before the show starts. (Pending)
6) Cinema theaters have a maximum number of 30 seats.
& When booking, a user only needs to choose a cinema, a film, a show time, and the
number of tickets. (Use whichever display method and process / flow you like best,
simple dropdowns will do as well. ((Complete) Note: The number of seats can be set in the admin panel)

# Assumptions:
1) There are only two cinema locations, each has two theatres, with two films currently
showing.
2) Users won’t need to pay.
3) Environment: Feel free to use whatever you like.

## Tasks:
1) Give a brief explanation about what you used, and why. This may include the tools and
frameworks you made use of, or any methodologies/best practices you incorporated
whilst developing, on the application and DB level.
2) Create a public Github / Bitbucket repository, which should contain your completed
project and all related files, regular small commits will allow us to better follow your
work.
3) Deliver a functional project, with all files included and instructions for setting it up


## Tasks Completed
1) Used Laravel with a simple bootstrap template. I started with the admin panel to help me figure out how the database
needs to be structured. I decided to keep the frontend simple and made used of Jquery datatables to display the data.
2) Repo was created on Git Hug.
3) Should be working fine let me know if there is any problems.

## Nice-to-Haves:
1) An admin CRUD for each data entity (Completed)
2) Testable Code (Did not do test units sorry)
3) SOLID principles followed (Completed)
4) Clean commented code (Completed)
