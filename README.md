<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

<img src="http://sejs.se/portfolio/pic/webbshop-Laravel/image.png" />
<img src="http://sejs.se/portfolio/pic/webbshop-Laravel/image2.png" />

Create a shopping cart from a shortlist of products.
The application must be written in PHP with code standard PSR-2 (http://www.php-fig.org/psr/psr-2/)

## Assignment
# 1. Shopping Cart widget
Shopping cart widget displays information about the products you have in your cart.
It should contain
- Items
- Total price including VAT

# 2. Product List
Products are supplied in a JSON file
In each JSON objects are the following value
- Code (part)
- Name (name)
- VAT (tax percentage eg 25)
- Price (price excluding VAT)

These should be listed out by name, part number, VAT, price including VAT, number-box and a buy button.
When you click on purchase, the current article added to the basket with AJAX with the number that you have entered.
Is the product already in vending Kogen number should be updated.
Shopping cart widget is updated with the number and total price.

# 3. Basket
There should be a page where all the items in the cart are listed out by name, part number, quantity, price including VAT, and the total price including VAT.
You should be able to change the quantity of a product
You should be able to remove a product
At the bottom of the page there should be a summary:
- Total excl.
- VAT total
- Total including VAT

# No requirement of CSS is.
# Optional library for both frontend and backend may be used;

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb combination of simplicity, elegance, and innovation give you tools you need to build any application with which you are tasked.

## Learning Laravel

Laravel has the most extensive and thorough documentation and video tutorial library of any modern web application framework. The [Laravel documentation](https://laravel.com/docs) is thorough, complete, and makes it a breeze to get started learning the framework.

If you're not in the mood to read, [Laracasts](https://laracasts.com) contains over 900 video tutorials on a range of topics including Laravel, modern PHP, unit testing, JavaScript, and more. Boost the skill level of yourself and your entire team by digging into our comprehensive video library.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
