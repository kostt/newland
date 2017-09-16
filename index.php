<?
include "myTest.php"; 
$obj = new myTest;
?>

<html>
<head>
<title>Ньюлэнд</title>
<link rel='stylesheet' type='text/css' href='css.css' >
<meta name="viewport" content="initial-scale=1.0">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>

<script src="func.js"></script>

<div class="menu-top-3"><img src="logo-tablet.png"></div>
<div class="top">
<div class="menu-top">Система заявок</div>
<div class="menu-top">Wiki</div>
<div class="menu-top-2">Фамилия И. О</div>
<div class="menu-top-2">Выход</div>
</div>

<div class="back-body">

<div>Заявка #23424</div>
<form enctype="multipart/form-data" method="post"> 

<ul class="ul-back-body"><li class="t-li">Тема*</li><li class="t-li-2"><input class="input-tema" type="text" name="subject"></li></ul>

<div>Содержание: *</div>
<textarea class="input-tema-2" type="text" name="content"></textarea>

<div class="back-body-2">
<ul class="ul-body">
<li>
<div class="m"><div class="inline"><b>Дата начала *:</b></div><div class="inline2"><input type="text" name="starttime" id="datepicker"></div></div>
<div class="m"><div class="inline"><b>Планируемая дата завершения *:</b></div><div class="inline2"><input type="text" name="esttime" id="datepicker2"></div></div>
</li>
<li>
<div class="m"><div class="inline"><b>Автор *:</b></div><div class="inline2"><input type="text" name="author"></div></div>
<div class="m"><div class="inline"><b>Исполнитель *:</b></div><div class="inline2"><input type="text" name="assignedto"></div></div>
</li>
<li><div class="f">
<div class="m"><div class="inline"><b>Приоритет *:</b></div><div class="inline2">
<select name="priority_id">
<? $obj->select(); ?>
</select>
</div></div>
<div class="m"><div class="inline"><b>Информировать *: </b></div><input type="submit" value="+" onClick="AddItem2(); return false;"><div class="inline2">

<span id="name1" class="fio" onclick="show_name(1);">ФИО Сотрудника</span>
<input align="center" style="display:none;" type="text" id="c_name1" value=""><span id="ok_name1" style="cursor:pointer; display:none;" onclick="post_name(1);">ОК</span>

<div id="items2"></div></div></div></div>
</li>
</ul>

<div style="float:right"><input type="submit" value="Отправить"></div>
<div><input type="file" name="file"><br><br><a href="/" onClick="AddItem(); return false;">добавить еще файл</a></div><br><div id="items"></div>
</div>
</form>

<div><?$obj->post(); ?></div>
</div>

</body>
</html>