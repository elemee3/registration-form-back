## About

The Pet Owner Registration page is a simple form that collects data, and sends it to this back end application. Here the data is ingested and either saved or validated based on database connection status. A 201 Created response is returned to the front end upon successful save or validation, otherwise a 400 Bad Request response is returned.

This repo is intended to be used in conjunction with the front end application, [registration-form](https://github.com/elemee3/registration-form).

## Requirements

This project requires the following:
  - PHP 7
    - Proper installation may require the following extensions:
    - php7.0-mbstring
    - php7.2-xml
  - Laravel 8
  - Composer

This project was developed on Ubuntu 20.04. Instructions will support Linux/Unix/MacOS environments. Windows support is not guaranteed at this time.

## Installation

1. Ensure proper installation of all required software listed above
2. Clone this repository via HTTPS
3. `cd` into the repository in the terminal
4. Run `composer install`
5. Run `php artisan serve`
6. See that the development server has started
7. The back end is now ready to receive requests from the front end application

## Design & Architectural Decisions

Due to the nature of this project including time constraints and unknown future states of the app, there were multiple opportunities to make design and architectural decisions. In addition there are of course many options for improving this app.

- While this is a generic app for pets, right now it specifically supports two animal types: cat and dog. While for the simplified purpose of this activity, using a Pet class to encompass both makes sense, a future state would likely require more complex design. To make this more scalable and adaptable, I would create an abstract Pet class, then derive the Dog, Cat, and any other animal classes from there. Depending on the extent of how many pet types will be supported, and how different they are from another I could see even another layer of hierarchy coming into play. For example, Mammal class might implement the Pet class, and Cat might extend from Mammal.

- During development of this back end, the lack of a database layer was on my mind. This would be a clear next step, to track the pets being registered through the system. While I did not want to focus unnecessary time on setting up a database for the current state, I did give thought to supporting that transition in the future. This planning can be found in the routes, by using the resource method rather than a POST, allowing for an easier addition of API methods, such as viewing all pets, or one in particular. The store method in the controller is already set up to create a new record in the (future) pets table; a simple true/false toggle in the .env file controls the app's behavior to accommodate use either with or without the database connection.
