![Bugloos](public/logo.png "Bugloos")

## About Project

This is a test project that is requested from [**Bugloos**](https://bugloos.nl/) company as a task to check PHP development skills of me.

- Developer: [**Mohammad Mostafa Shahraki**](https://www.ncis.ir).
- Technologies Used:
  - [Laravel](https://laravel.com)
  - [Swagger](https://github.com/DarkaOnLine/L5-Swagger)
  - [JWT](https://github.com/lcobucci/jwt)
  - [Jalali Calendar](https://github.com/morilog/jalali)

## Usage

1. Run `composer install`
2. Copy `.env.example` file to `.env`
4. Create your database and set database connection settings in `.env` file
5. Run `php artisan key:generate`
5. Run `php artisan migrate:fresh`
6. Run `php artisan db:seed`  
(this may take a while to generate some test data to work on)
7. Run `php artisan serve`
8. Head to [http://127.0.0.1:8000/openapi](http://127.0.0.1:8000/openapi)
9. Use [api/v1/auth/login](http://127.0.0.1:8000/api/v1/auth/login) to obtain a JWT
10. Login as **admin** user with password **12354678**
11. Copy **token** response value and paste it in *Authorize* dialog of swagger and press **Login** button
12. Now you can use other API's
13. In order to use API with another tools (cURL, Postman, etc.) you should send **token** as *BearerToken* authorization header of your request.
14. If you have done any changes to Swagger documentation, you shoud run  
`php artisan l5-swagger:generate`  
to regenerate documentation.


## License

MIT License

Copyright (c) 2021 Mohammad Mostafa Shahraki

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
