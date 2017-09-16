var items=1;
var items2=1;

$( function() {
$( "#datepicker" ).datepicker({dateFormat:'yy-mm-dd 00:00:00'});
} );
$( function() {
$( "#datepicker2" ).datepicker({dateFormat:'yy-mm-dd 00:00:00'});
} );

function AddItem() {
div=document.getElementById("items");
button=document.getElementById("add");
items2++;
newitem="<input type=\"file\" name=\"file" + items2;
newitem+="\" size=\"45\"><br>";
newnode=document.createElement("span");
newnode.innerHTML=newitem;
div.insertBefore(newnode,button);
}

function AddItem2() {
div=document.getElementById("items2");
button=document.getElementById("add");
items++;
newitem="<span id=\"name"+items+"\" class=\"fio\" onclick=\"show_name("+items+");\">ФИО Сотрудника</span><br><input style=\"display:none;\" type=\"text\" id=\"c_name"+items+"\"><span id=\"ok_name"+items+"\" style=\"cursor:pointer; display:none;\" onclick=\"post_name("+items+");\">ОК</span>";
newnode=document.createElement("span");
newnode.innerHTML=newitem;
div.insertBefore(newnode,button);
}

function show_name(num){
document.getElementById('name'+num+'').style.display = 'none';
document.getElementById('c_name'+num+'').style.display = 'block';
document.getElementById('ok_name'+num+'').style.display = 'block';
}

function post_name(num){
var c_name = document.getElementById('c_name'+num+'').value;
if (c_name===""){c_name='ФИО Сотрудника'};
document.getElementById('name'+num+'').innerHTML = c_name;
document.getElementById('name'+num+'').style.display = 'block';
document.getElementById('c_name'+num+'').style.display = 'none';
document.getElementById('ok_name'+num+'').style.display = 'none';
}