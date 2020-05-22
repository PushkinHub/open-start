<?php

ini_set('memory_limit', '256M');

error_reporting(E_ALL);
ini_set('display_startup_errors', 1);
ini_set('display_errors', '1');

require_once 'dompdf/lib/html5lib/Parser.php';
require_once 'dompdf/lib/php-font-lib/src/FontLib/Autoloader.php';
require_once 'dompdf/lib/php-svg-lib/src/autoload.php';
require_once 'dompdf/src/Autoloader.php';
Dompdf\Autoloader::register();

use Dompdf\Dompdf;



$html = '
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	
	<style type="text/css">
		* { 
			font-family: DejaVu Sans;
			font-size: 14px;
			line-height: 14px;
		}
		table {
			margin: 0 0 15px 0;
			width: 100%;
			border-collapse: collapse; 
			border-spacing: 0;
		}		
		table td {
			padding: 5px;
		}	
		table th {
			padding: 5px;
			font-weight: bold;
		}
 
		.header {
			margin: 0 0 0 0;
			padding: 0 0 15px 0;
			font-size: 12px;
			line-height: 12px;
			text-align: center;
		}
		
		/* Реквизиты банка */
		.details td {
			padding: 3px 2px;
			border: 1px solid #000000;
			font-size: 12px;
			line-height: 12px;
			vertical-align: top;
		}
 
		h1 {
			margin: 0 0 10px 0;
			padding: 10px 0 10px 0;
			border-bottom: 2px solid #000;
			font-weight: bold;
			font-size: 20px;
		}
 
		/* Поставщик/Покупатель */
		.contract th {
			padding: 3px 0;
			vertical-align: top;
			text-align: left;
			font-size: 13px;
			line-height: 15px;
		}	
		.contract td {
			padding: 3px 0;
		}		
 
		/* Наименование товара, работ, услуг */
		.list thead, .list tbody  {
			border: 2px solid #000;
		}
		.list thead th {
			padding: 4px 0;
			border: 1px solid #000;
			vertical-align: middle;
			text-align: center;
		}	
		.list tbody td {
			padding: 0 2px;
			border: 1px solid #000;
			vertical-align: middle;
			font-size: 11px;
			line-height: 13px;
		}	
		.list tfoot th {
			padding: 3px 2px;
			border: none;
			text-align: right;
		}	
 
		/* Сумма */
		.total {
			margin: 0 0 20px 0;
			padding: 0 0 10px 0;
			border-bottom: 2px solid #000;
		}	
		.total p {
			margin: 0;
			padding: 0;
		}
		
		/* Руководитель, бухгалтер */
		.sign {
			position: relative;
		}
		.sign table {
			width: 60%;
		}
		.sign th {
			padding: 40px 0 0 0;
			text-align: left;
		}
		.sign td {
			padding: 40px 0 0 0;
			border-bottom: 1px solid #000;
			text-align: right;
			font-size: 12px;
		}
		
		.sign-1 {
			position: absolute;
			left: 149px;
			top: -44px;
		}	
		.sign-2 {
			position: absolute;
			left: 149px;
			top: 0;
		}	
		.printing {
			position: absolute;
			left: 271px;
			top: -15px;
		}
	</style>
</head>
<body>
	<p class="header">
		Внимание! Оплата данного счета означает согласие с условиями поставки товара.
		Уведомление об оплате обязательно, в противном случае не гарантируется наличие
		товара на складе. Товар отпускается по факту прихода денег на р/с Поставщика,
		самовывозом, при наличии доверенности и паспорта.
	</p>
 
	<table class="details">
		<tbody>
			<tr>
				<td colspan="2" style="border-bottom: none;">ЗАО "БАНК", г.Москва</td>
				<td>БИК</td>
				<td style="border-bottom: none;">000000000</td>
			</tr>
			<tr>
				<td colspan="2" style="border-top: none; font-size: 10px;">Банк получателя</td>
				<td>Сч. №</td>
				<td style="border-top: none;">00000000000000000000</td>
			</tr>
			<tr>
				<td width="25%">ИНН 0000000000</td>
				<td width="30%">КПП 000000000</td>
				<td width="10%" rowspan="3">Сч. №</td>
				<td width="35%" rowspan="3">00000000000000000000</td>
			</tr>
			<tr>
				<td colspan="2" style="border-bottom: none;">ООО "Компания"</td>
			</tr>
			<tr>
				<td colspan="2" style="border-top: none; font-size: 10px;">Получатель</td>
			</tr>
		</tbody>
	</table>
 
	<h1>Счет на оплату № 10 от 01 февраля 2018 г.</h1>
 
	<table class="contract">
		<tbody>
			<tr>
				<td width="15%">Поставщик:</td>
				<th width="85%">
					ООО "Компания", ИНН 0000000000, КПП 000000000, 125009, Москва г, 
					Тверская ул, дом № 9
				</th>
			</tr>
			<tr>
				<td>Покупатель:</td>
				<th>
					ООО "Покупатель", ИНН 0000000000, КПП 000000000, 119019, Москва г, 
					Новый Арбат ул, дом № 10
				</th>
			</tr>
		</tbody>
	</table>
 
	<table class="list">
		<thead>
			<tr>
				<th width="5%">№</th>
				<th width="54%">Наименование товара, работ, услуг</th>
				<th width="8%">Коли-<br>чество</th>
				<th width="5%">Ед.<br>изм.</th>
				<th width="14%">Цена</th>
				<th width="14%">Сумма</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td align="center">1</td>
				<td align="left">Название</td>
				<td align="right">Число</td>
				<td align="left">Единица измерения</td>
				<td align="right">Цена</td>
				<td align="right">Сумма</td>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="5">Итого:</th>
				<th>100</th>
			</tr>
			<tr>
				<th colspan="5">В том числе НДС:</th>
				<th>100</th>
			</tr>
			<tr>
				<th colspan="5">Всего к оплате:</th>
				<th>100</th>
			</tr>
			
		</tfoot>
	</table>
	
	<div class="total">
		<p>Всего наименований много, на сумму 100 руб.</p>
		<p><strong>1000 руб.</strong></p>
	</div>
	
	<div class="sign">
		<img class="sign-1" style="width: 200px" src="pechati_obrazec_ooo-26-1000x1000.png">
 
		<table>
			<tbody>
				<tr>
					<th width="30%">Руководитель</th>
					<td width="70%">Иванов А.А.</td>
				</tr>
				<tr>
					<th>Бухгалтер</th>
					<td>Сидоров Б.Б.</td>
				</tr>
			</tbody>
		</table>
	</div>
</body>
</html>';


$dompdf = new Dompdf();
$html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
$dompdf->loadHtml($html, 'UTF-8');
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream('invoice.pdf', ['Attachment' => 0]);
