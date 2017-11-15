<?php
	header("Content-Type: text/html; charset=utf-8");
?>
<html>
<head>
	<meta charset="utf-8">
    <title>Загрузка файлов на сервер</title>
</head>
<body>
	<?php if (!$_FILES){ 
	
				//$_FILES['filename']['name'] — имя файла;
				//$_FILES['filename']['type'] — тип файла;
				//$_FILES['filename']['tmp_name'] — полный путь к временному каталогу на диске;
				//$_FILES['filename']['error'] — содержит код ошибки, который это 0, если операция прошла успешно;
				//$_FILES['filename']['size'] — размер файла.

	?>
		<h2>Форма для загрузки файлов</h2>
		<form action="index.php" method="post" enctype="multipart/form-data">
			<input type="file" name="filename[]"><br>
			<input type="submit" value="Загрузить"><br>
		</form>
		
	<?php }else{
		
			//проверяем загрузку файла на наличие ошибок
			if($_FILES['filename']['error'] > 0){
				//в зависимости от номера ошибки выводим соответствующее сообщение
				switch ($_FILES['filename']['error']) {
					case 1: echo 'Размер файла превышает допустимое значение UPLOAD_MAX_FILE_SIZE'; break;
					case 2: echo 'Размер файла превышает допустимое значение MAX_FILE_SIZE'; break;
					case 3: echo 'Не удалось загрузить часть файла'; break;
					case 4: echo 'Файл не был загружен'; break;
					case 6: echo 'Отсутствует временная папка.'; break;
					case 7: echo 'Не удалось записать файл на диск.'; break;
					case 8: echo 'PHP-расширение остановило загрузку файла.'; break;
				}
			}
			
			// Проверяем mime 
			switch($_FILES['filename']['type']){
				case "image/jpeg":
					echo "file is jpeg type";
					break;
				case "image/png":
					echo "file is png type";
					break;
				default:
					echo "file is an image, but not of png or jpeg type";
					exit;
			} 
			
		/* 
			$blacklist = array(".jpg"); //можно создать черный список
			foreach ($blacklist as $item){
				if(preg_match("/$item\$/i", $_FILES['filename']['name'])){
					echo "Выбраный вами файл являеться не допустимым.";
					exit;
				}
			} 
		*/
		
			// получаем значеие директивы upload_max_filesize при помощи функции ini_get
			$upload_max_filesize = (integer) ini_get(upload_max_filesize);
			
			// перевобим мегабайты в байты
			$upload_max_filesize  =  $upload_max_filesize  *  1024  * 1024;
			if($upload_max_filesize > $_FILES["filename"]["size"]){
			
				// Проверяем файл
				if(is_uploaded_file($_FILES["filename"]["tmp_name"])){
					
					// Если файл загружен успешно, перемещаем его
					// из временной директории в конечную
					if(move_uploaded_file($_FILES["filename"]["tmp_name"],__DIR__ . DIRECTORY_SEPARATOR . $_FILES["filename"]["name"])){
						echo "Файл  загружен";
					}
					
				}else{
					
					echo "Возможная атака с участием загрузки файла: ";
					echo "файл '". $_FILES['userfile']['tmp_name'] . "'.";
					exit;
					
				}	
				
			}else{
				
				echo("Размер файла превышает допустимого размера");
				exit;
				
			}
			
			//__DIR__ — одна из "волшебных" констант, содержит директорию файла.
			//DIRECTORY_SEPARATOR — предопределённая константа, содержащая разделитель пути. Для ОС Windows это «\», для ОС Linux и остальных — «/».
			
		/* 
			0- Ошибок не возникало, файл был успешно загружен на сервер.
			1- Размер принятого файла превысил максимально допустимый размер, который задан директивой upload_max_filesize конфигурационного файла php.ini..
			2- Размер загружаемого файла превысил значение MAX_FILE_SIZE, указанное в HTML-форме.
			3- Загружаемый файл был получен только частично.
			4- Файл не был загружен.
			6- Нет временную папку.
			7- Сбой при записи файлов на диск.
			8- Загрузка файла остановлена. 
		*/

		/* 
			Кстати, если Вы хотите узнать, где расположен Ваш файл php.ini, выполните скрипт:
			phpinfo();
			Итак, список директив файла php.ini:
			file_uploads — возможность запретить или разрешить загрузку файлов на сервер в целом, по умолчанию разрешена (значение On).
			post_max_size — общее ограничение сверху на размер данных, передаваемых в POST запросе. Если Вам необходимо передавать несколько файлов одновременно, или работать с большими файлами, измените значение этой директивы. Значение по умолчанию 8Мб.
			upload_max_filesize — уже рассмотренная нами директива. Не забывайте при необходимости также менять post_max_size.
			upload_tmp_dir — временная директория на сервере, в которую будут помещаться все загружаемые файлы. 
		*/

		} 
	?>
</body>
</html>