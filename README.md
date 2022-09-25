Ipglobal Technical Test
========================

Implement an API and allow access to it from other applications

Technological Stack
------------

1. PHP 8.1.8;
2. Docker - PHP 8.1 + Symfony 5.4.12
3. Docker Compose 
4. Postman / Browser 

Installation
------------

 * Clone GitHub repository
```
git clone https://github.com/PabloAdriaensens/ipglobal
```
 * Access into directory: 
```
cd ipglobal
```
* Build, Run and Start Docker:
```
make initialize
```
* Tailwind ya ha sido compilado, pero si lo queremos volver a compilar:
```
make ssh-be
```
```
npx tailwindcss -i ./assets/styles/app.css -o ./public/build/app.css --watch
`````
* Ready to access to browser or Postman collection:
```
http://localhost:1000/
```
 * Execute tests:
```
php bin/phpunit
```

Enpoints
-----

**API Urls** (Import Postman collection)

* Default URL:
  * <http://localhost:1000>

* GET Posts:
    * <http://localhost:1000/api/posts>

* POST Post:
    * <http://localhost:1000/api/posts>

**Blog Urls**

* Default URL:
  * <http://localhost:1000>

* GET Posts:
    * <http://localhost:1000/posts>

* GET Post:
    * <http://localhost:1000/posts/1>
