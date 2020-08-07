users
--------
`id` int(11)
`email` varchar(55)
`login` varchar(55)

и таблица заказов
orders
--------
`id` int(11)
`user_id` int(11)
`price` int(11)

/*
Необходимо :
1 - составить запрос, который выведет список email'лов встречающихся более чем у одного пользователя
2 - вывести список логинов пользователей, которые не сделали ни одного заказа
3 - вывести список логинов пользователей которые сделали более двух заказов
*/

/*Первый запрос*/
SELECT email
FROM users
GROUP BY email
HAVING COUNT(email) > 1;

/*Второй запрос*/
SELECT users.login
FROM users
LEFT JOIN orders
ON orders.user_id = users.id
WHERE orders.id is NULL;

/*Третий запрос*/
SELECT u.login, count(o.id) as order_count
FROM orders o
INNER JOIN users u
ON o.user_id = u.id
GROUP BY u.login
HAVING order_count >2;
