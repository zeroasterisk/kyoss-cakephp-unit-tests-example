CakePHP Unit Testing Example
=======

[![CakePHP](http://cakephp.org/img/cake-logo.png)](http://www.cakephp.org)

App Setup
---------------

```
cd /path/to/
git clone https://github.com/zeroasterisk/kyoss-cakephp-unit-tests-example.git
cd kyoss-cakephp-unit-tests-example/app
cp Config/database.example.php Config/database.php
edit Config/database.php
```

Setup Database & User

```
mysql -u root -p
  create database example_main;
  create database example_test;
  create user 'dbuser'@'localhost' identified by 'xxxxxxxxx';
  grant all privileges on example_main.* to dbuser@localhost ;
  grant all privileges on example_test.* to dbuser@localhost ;

  grant usage on *.* to dbuser@localhost identified by 'xxxxxxxxx';
```

Setup Schema (Event Table)

```
./cake schema create
```

answer `y` to drop and `y` to create -- should create an `events` table in your `example_main` database

Testing Commands
---------------

```
cd /path/to/kyoss-cakephp-unit-tests-example/app

./cake test help

./cake test core AllTests

./cake test app Model/Event

./cake test app Model/Event --coverage-html webroot/coverage
```
