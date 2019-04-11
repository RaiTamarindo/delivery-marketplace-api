# Delivery Marketplace API

An API that handles with stores, products and routes to deliver to the clients.

## About

This API was built in PHP using a microframework called **Slim** for routing and creating middlewares.

For ORM was choosed **Eloquent** ORM, the same in Laravel framework. I have prefer avoid using Laravel because it's a fullstack framework, that is, it would bring too much things that a **RESTful** API doesn't needs (things like Cookies and Session management, login pages, any sort of frontend stuff, etc).

All dependencies are managed by **Composer**, which allows you to create deploy automation scripts using Docker, for example.

It was developed generic classes for services, controllers and routers with common code to handle CRUD operation through a REST interface.

About data modeling, there is a linking table called *routes* that connects *addresses* and *stores* and keeps aditional data: distance and is_straight_line. This table was designed to store distances between stores and user addresses, if a route does not exists (given a specific address-store pair), is computed that route distance in "straight line" mode, that is, using the Haversine algorithm. Therefore, this table can be updated by another service that search on Google API for the real path distance.

There is other linking table between *products* and *stores* that keeps price and availability status for each product-store pair. Searches on *products* eager loads all related *stores* and then, with that data, if is given an address id, make a query for related routes and attach distances (computed or stored) to result.

## `// TODO` list

 - [x] Data modeling
 - [x] Database schema migration script
 - [x] Services
 - [x] Controllers
 - [x] Routers
 - [ ] Data validation middlewares
 - [ ] Authentication middleware
 - [x] Custom product search endpoint
 - [ ] Frontend app

## Requirements

1. PHP 7.1+
2. Apache web server
3. MySQL server (with database and user available)
3. Composer

## Setup

1. Install dependencies

`composer install`

2. Create `.env` file with application settings (see `.env-sample` file)

3. Run database migrations

`composer migrate`