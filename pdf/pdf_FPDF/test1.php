<?php
	require('fpdf16/fpdf.php');
	
	//Создадим экземпляр класса 
	$pdf = new FPDF();
	
	$pdf->SetAuthor('Alex');
	$pdf->SetTitle('FPDF tutorial');
	
	$pdf->SetFont('Helvetica','B',12); //b - bold, 20 - shrift
	$pdf->SetTextColor(50,60,100); //используя значения RGB
	
	$pdf->AddPage(L); //«P» или «L» для указания ориентации страницы
	$pdf->SetDisplayMode('real','default'); //мы используем 100% увеличение и разметку по умолчанию
	
	$pdf->Image('fpdf.jpg',10,10,114,84,'jpg','http://www.fpdf.org/'); //Мы отобразим логотип FPDF используя функцию Image и передадим в нее следующие параметры — название файла, размерность и адрес
	
	//$pdf->Link(10, 20, 33,33, 'http://www.fpdf.org/'); //добавить ссылку
	
	$pdf->SetXY(10,10); //Функция SetXY устанавливает x и y координаты точки
	$pdf->SetDrawColor(50,60,100); //SetDrawColor устанавливает цвет границы, используя значения RGB
	$pdf->Cell(114,10,'FPDF Tutorial',1,0,'C',0); //функцию Cell для вывода прямоугольника, ширина, высота, текст, граница, ln, выравнивание и заполнение. Значение границы 0 — отсутствие границы или 1 для наличия границы. Для ln мы используем значение по умолчанию 0, «C» — выравнивание текста по цуентру и 0 для параметра заполнение. Если мы бы установили последний паараметр в 1 наш прямоугольник был бы закрашен, значение 0 оставит его прозрачным.
	
	$pdf->SetXY(10,94);
	$pdf->SetFontSize(10); //уменьшим размер шрифта, используя SetFontSize
	$pdf->Write(5,'Congratulations! You have generated a PDF. '); //Функция Write напечатает текст в наш документ. Параметр 5 устанавливает высоту, он имеет смысл только тогда когда у нас есть много строк в нашем тексте. В конце мы выведен наш результат, используя функцию Output
	
	$pdf->Output("test.pdf","I");

?>