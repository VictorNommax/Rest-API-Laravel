CREATE DATABASE IF NOT EXISTS test_task;

USE test_task;

CREATE TABLE IF NOT EXISTS orders
(
  ID INT(12) UNSIGNED NOT NULL,
  FIO VARCHAR(255) NOT NULL,
  SUM FLOAT UNSIGNED NOT NULL,
  CREATED DATETIME NOT NULL,
  ADDRESS VARCHAR(255) NOT NULL,

  UNIQUE(ID)
);

INSERT INTO `orders` (ID, FIO, SUM, CREATED, ADDRESS)
VALUES (1, 'Ivanov Ivan Ivanovich', 924.78, '2022-05-03 18:37:59', 'Moscow, 3rd Horoshevskaya 24, 45');

INSERT INTO `orders` (ID, FIO, SUM, CREATED, ADDRESS)
VALUES (2, 'Userov User Userovich', 1099.00, '2022-05-26 12:17:29', 'Moscow, Snayperskaya 28, 157');

INSERT INTO `orders` (ID, FIO, SUM, CREATED, ADDRESS)
VALUES (3, 'Borisov Gleb Victorovich', 618.90, '2022-05-03 18:37:59', 'Moscow, Akademika Saharova 12, 123');

INSERT INTO `orders` (ID, FIO, SUM, CREATED, ADDRESS)
VALUES (4, 'Artemiev Aleksey Ivanovich', 720.99, '2022-05-03 18:37:59', 'Moscow, Pushkinskaya 34 k5, 78');

INSERT INTO `orders` (ID, FIO, SUM, CREATED, ADDRESS)
VALUES (5, 'Petrov Petr Petrovich', 0.00, '2022-05-03 18:37:59', 'Moscow, stanciya Yasenevo');
