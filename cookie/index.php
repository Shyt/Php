<?php
	header("Content-Type: text/html; charset=utf-8");
/*
	//Синтаксис cookie
	bool setcookie (
		string имя,
		string значение,
		int время жизни,
		string путь,
		string домен,
		bool протокол,
		bool http only 
	); 
	
    string имя — имя в паре имя=значение
    string значение — значение в паре имя=значение
    int время жизни — время хранения cookie, это метка времени Unix, т.е. желательно задавать это время с помощью функции time(), прибавляя время в секундах, через которое срок действия cookie должен истечь. Также можно воспользоваться функцией mktime().
    string путь — путь к директории на сервере, из которой будут доступны cookie.
    string домен — домен, которому доступны cookie.
    bool протокол — указывает на то, что значение cookie должно передаваться от клиента по защищенному HTTPS соединению. Если задано TRUE, cookie от клиента будет передано на сервер, только если установлено защищенное соединение. При передаче cookie от сервера клиенту следить за тем, чтобы cookie этого типа передавались по защищенному каналу, должен программист веб-сервера.
    bool http only — если задано TRUE, cookie будут доступны только через HTTP протокол. То есть cookie в этом случае не будут доступны скриптовым языкам, вроде JavaScript. Эта возможность была предложена в качестве меры, эффективно снижающей количество краж личных данных посредством XSS атак (несмотря на то, что поддерживается не всеми браузерами). Стоит однако же отметить, что вокруг этой возможности часто возникают споры о ее эффективности и целесообразности. Аргумент добавлен в PHP 5.2.0. Может принимать значения TRUE или FALSE.

*/

/* 
	//Создание
	setcookie("message", "welcome", time() + 60);
	echo "cookie установлены. Приветствие: $_COOKIE[message]";
	echo "<pre>";
	print_r($_COOKIE);
	echo "</pre>"; 
*/
	
/* 
	//Удаление
	setcookie("message", "welcome", time() - 60*60*24*32);
	echo "cookie удалены"; 
*/
	
	if (!$_COOKIE["counter"]){
		$counter  =  1;
	}else{
		$counter  =  ++$_COOKIE['counter'];
	}
	
	setcookie("counter", $counter, time() + 60);
	echo "Визит страницы: $counter";



?>