<?php
	header("Content-Type: text/html; charset=utf-8");
	
	session_start(); //Стартуем сессию
	$_SESSION['login'] = 'admin'; //Добавляем значение
	echo "_SESSION['login']: ".$_SESSION['login']; //Выводим
	echo "<br>";
	echo "session_id: ".session_id(); //уникальный идентификатор
	echo "<br>";
	echo "session_name: ".session_name(); //позволяет узнать имя сессии
	
/* 
	Для того, чтобы завершить сессию нам нужно:
	Очистить массив $_SESSION.
    Удалить временное хранилище на сервере.
    Удалить сессионный cookie.
	Очистить массив $_SESSION можно при помощи функции session_unset().
	Функция session_destroy() удаляет временное хранилище на сервере. Кстати, она больше ничего не делает.
	Удалить сессионный cookie нужно при помощи функции setcookie(), которую мы изучили в уроке pабота с cookie в PHP. 
*/
	session_start(); //начать
    session_unset(); //очистить
    session_destroy(); //удалить
	
	//Время жизни сессии можно изменить используя функцию session_set_cookie_params()
	session_set_cookie_params(60);
	
?>