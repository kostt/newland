<?
final class myTest
{

private $host = 'localhost'; 
private $username = 'root'; 
private $pass = ''; 
private $dbname = 'my_bd'; 

function __construct(){
$this->createTable();
}

public function query($query){
$link = mysqli_connect($this->host, $this->username, $this->pass, $this->dbname) or die("Ошибка " . mysqli_error($link));
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link) . ";<br>"); 
return $result;
}
 
protected function createTable(){

$show ="SHOW TABLES FROM `my_bd` like 'tickets';";
$res = $this->query($show);
$r = mysqli_fetch_array($res);
if($r==null){
$query ="CREATE TABLE IF NOT EXISTS `tickets` (
`Version_id` int(11) NOT NULL COMMENT 'Id версии',
`ticket_id` int(11) NOT NULL COMMENT 'Id заявки',
`subject` varchar(255) NOT NULL COMMENT 'Тема заявки',
`author` varchar(255) DEFAULT NULL COMMENT 'Автор',
`assignedto` varchar(255) DEFAULT NULL COMMENT 'Исполнитель',
`content` text NOT NULL COMMENT 'Содержание заявки',
`starttime` datetime NOT NULL COMMENT 'Дата начала',
`esttime` datetime DEFAULT NULL COMMENT 'Планируемая дата выполнения',
`priority_id` int(11) DEFAULT NULL COMMENT 'Id приоритета',
`fd` datetime NOT NULL COMMENT 'Дата создания версии',
`td` datetime DEFAULT NULL COMMENT 'Дата закрытия версии'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
$this->query($query); 
}

$show2 ="SHOW TABLES FROM `my_bd` like 'priorities';";
$res2 = $this->query($show2);
$r = mysqli_fetch_array($res2);
if($r==null){
$query2 ="CREATE TABLE IF NOT EXISTS `priorities` (
`priority_id` int(11) NOT NULL AUTO_INCREMENT,
`priority_name` varchar(100) NOT NULL,
PRIMARY KEY (`priority_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;";
$this->query($query2);

$query1 ="INSERT INTO `priorities` (`priority_id`, `priority_name`) VALUES
(1, 'Некритично'),
(2, 'Условно критично'),
(3, 'Критично'),
(4, 'Максимально критично');";
$this->query($query1);
}

}


public function select(){

$query_pri = "SELECT * FROM priorities"; 
$result = $this->query($query_pri);

while($r = mysqli_fetch_array($result)){
echo '<option value="'.$r['priority_id'].'">'.$r['priority_name'].'</option>';
}

}

public function post(){

if(isset($_POST['subject'])){$subject = $_POST['subject'];}else{exit;}
if(isset($_POST['content'])){$content = $_POST['content'];}else{exit;}
if(isset($_POST['starttime'])){$starttime = $_POST['starttime'];}else{exit;}
if(isset($_POST['esttime'])){$esttime = $_POST['esttime'];}else{exit;}
if(isset($_POST['author'])){$author = $_POST['author'];}else{exit;}
if(isset($_POST['assignedto'])){$assignedto = $_POST['assignedto'];}else{exit;}
if(isset($_POST['priority_id'])){$priority_id = $_POST['priority_id'];}else{exit;}

if (empty($content)){die('<font style="color:red;position: relative;bottom:15px">Не все обязательные поля заполнены!</font>');}
if (empty($subject)){die('<font style="color:red;position: relative;bottom:15px">Не все обязательные поля заполнены!</font>');}
if (empty($starttime)){die('<font style="color:red;position: relative;bottom:15px">Не все обязательные поля заполнены!</font>');}
if (empty($esttime)){die('<font style="color:red;position: relative;bottom:15px">Не все обязательные поля заполнены!</font>');}
if (empty($author)){die('<font style="color:red;position: relative;bottom:15px">Не все обязательные поля заполнены!</font>');}
if (empty($assignedto)){die('<font style="color:red;position: relative;bottom:15px">Не все обязательные поля заполнены!</font>');}
if (empty($priority_id)){die('<font style="color:red;position: relative;bottom:15px">Не все обязательные поля заполнены!</font>');}

$query_insrt = "INSERT INTO tickets (`content`,`subject`,`starttime`,`esttime`,`author`,`assignedto`,`priority_id`) VALUES ('$content','$subject','$starttime','$esttime','$author','$assignedto','$priority_id')"; //Формируем запрос для добавления новых полей
$this->query($query_insrt);
echo "Готово"; //Пробуем выпонить запрос
}


}



?>