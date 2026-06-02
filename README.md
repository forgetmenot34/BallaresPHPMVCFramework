Ballares, Dan Paolo B.
BS Information Technology - 3

# Custom PHP MVC Inventory Framework

A custom-built PHP MVC framework featuring an inventory management system as its MVP (Minimum Viable Product). The project demonstrates framework engineering concepts such as routing, dependency injection, repository pattern, validation abstraction, and SOLID principles.

========

# Project Overview

This project was developed to demonstrate how a lightweight PHP MVC framework operates internally without relying on external frameworks such as Laravel or Symfony.

The framework includes:

— Custom MVC architecture
— Dynamic routing
— Reflection-based dispatcher
— Dependency Injection Container
— Repository Pattern
— Validation Layer
— Database abstraction
— Request/Response abstraction
— CRUD inventory management system

========

# MVP Application

## Warehouse Inventory Management System

The MVP (Minimum Viable Product) of the framework is a Warehouse Inventory Management System.

The application allows users to:

— Add products
— Edit products
— Delete products
— View all inventory items
— Track stock quantity
— Organize products by category
— Manage SKU identifiers

========

# Framework Design Decisions

## MVC Architecture

The framework follows the MVC (Model-View-Controller) pattern to separate:

— business logic
— database logic
— presentation logic

Benefits:

— cleaner codebase
— easier maintenance
— better scalability

========

## Repository Pattern

All SQL queries are centralized inside repositories.

Instead of controllers directly using SQL:

php
SELECT — FROM products


controllers use repository methods:

php
$this->products->all();


Benefits:

— cleaner controllers
— reusable database logic
— ORM-style abstraction

========

## Dependency Injection

The framework uses a custom DI Container to resolve dependencies automatically.

Example:

php
ProductRepositoryInterface
→
ProductRepo


Benefits:

— loose coupling
— easier testing
— cleaner architecture

========

## Dynamic Routing

Routes support dynamic parameters.

Example:

text
/inventory/edit/{id}


Benefits:

— flexible URLs
— REST-like routing
— scalable route handling

========

## Request and Response Abstraction

The framework avoids directly using:

— $_POST
— $_GET
— raw header()

Instead it uses:

— Request class
— Response class

Benefits:

— cleaner code
— centralized HTTP handling

========

## Validation Layer

Validation logic is separated into a reusable Validator class.

Supported validations:

— required()
— min()
— max()
— numeric()
— email()

Benefits:

— reusable validation logic
— cleaner controllers
— improved stability

========

## Front Controller Pattern

All requests pass through:

text
public/index.php


Benefits:

— centralized request handling
— cleaner application flow
— improved security

========

# Request Lifecycle

text
Browser Request
↓
public/index.php
↓
Router
↓
Dispatcher
↓
Container
↓
Controller
↓
Repository
↓
Database
↓
View Engine
↓
Browser Response


========

# Application Routes

| Method | Route                  | Description        |
| ================ | ========================================================- | ================================================ |
| GET    | /                      | Inventory homepage |
| GET    | /inventory             | View all products  |
| GET    | /inventory/create      | Show create form   |
| POST   | /inventory/store       | Store new product  |
| GET    | /inventory/edit/{id}   | Show edit form     |
| POST   | /inventory/update/{id} | Update product     |
| GET    | /inventory/delete/{id} | Delete product     |

========

# SOLID Principles Applied

| Principle | Implementation                                                    |
| ======================== | ===================================================================================================== |
| SRP       | Separate classes for routing, validation, repositories, responses |
| OCP       | Database driver abstraction prepared for future extensions        |
| LSP       | Database drivers can be replaced interchangeably                  |
| ISP       | Repository interface only contains required methods               |
| DIP       | Controllers depend on interfaces instead of concrete classes      |

========

# Technologies Used

— PHP 8.5.6
— MySQL
— PDO
— Composer
— HTML/CSS
— JavaScript
— PSR-4 Autoloading

========

# Database Setup

## 1. Create Database

Import:

text
database/schema.sql


into MySQL.

========

## 2. Configure Database

Edit:

text
config/database.php


Example:

php
return [
    'host' => 'localhost',
    'dbname' => 'warehouse_db',
    'username' => 'root',
    'password' => ''
];


========

# Installation Instructions

## 1. Clone Repository

bash
git clone https://github.com/YOUR_USERNAME/YOUR_REPOSITORY.git


========

## 2. Enter Project Directory

bash
cd mymvcframework


========

## 3. Install Composer Dependencies

bash
composer install


========

## 4. Generate Autoload Files

bash
composer dump-autoload


========

## 5. Start PHP Development Server

bash
php -S localhost:6475 -t public


========

# Access Application

Open browser:

text
http://localhost:[PORT]/inventory




========

# Features

## Framework Features

— MVC Architecture
— Dynamic Routing
— Dependency Injection
— Reflection Dispatcher
— Repository Pattern
— Validation Layer
— Request/Response Abstraction
— Database Abstraction
— Front Controller Pattern

========

## Inventory Features

— Product Listing
— Product Creation
— Product Editing
— Product Deletion
— Quantity Tracking
— Category Management
— SKU Management
— Validation Alerts

========

# Educational Purpose

This project was created for educational purposes to demonstrate:

— framework engineering
— software architecture
— MVC implementation
— SOLID principles
— dependency injection
— repository pattern
— database abstraction
— request lifecycle handling

========

# Author

Developed as a custom PHP MVC framework academic project.
