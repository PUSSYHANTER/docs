<?
if($_POST['name']){ // заносим в массив значение полей, их может быть больше
  $znach = array(
    1 => $_POST['name'],
    2 => $_POST['phone']
  );
  mail("info@gazel.jrt.kz", "заказ звонка  ".$_SERVER['HTTP_REFERER'], $znach[2]." ".$znach[1]); // письмо на свой электронный ящик, измените на свой email
}
Header("Refresh: 2; URL=".$_SERVER['HTTP_REFERER']); // спустя 8 секунд человек будет возвращён на предыдущий URL
?>

<!DOCTYPE html>
<title><? print "$znach[1], данные успешно отправлены!"; ?></title>
<meta content='text/html; charset=UTF-8' http-equiv='Content-Type'/>
<meta name="robots" content="noindex"/>
<style>
body {background: rgba(180,180,180,.9);}
body > div {
  position: absolute;
  top: 50%; left: 50%;
  -ms-transform: translate(-50%, -50%); -webkit-transform: translate(-50%, -50%); transform: translate(-50%, -50%);
  padding: .5% 1% 1%;
  border: 1px solid rgb(100,100,100);
  font-size: 140%;
  font-weight: 600;
  text-align: right;
  text-shadow: -1px -1px #666;
  color: rgb(240,240,240);
  background: #FFFFFF linear-gradient(rgb(100,100,100), rgb(170,170,170));
}
label:hover {
  color: #dbeaf9;
  cursor: pointer;
}
body > div > div {padding-top: 3%;}
</style>

<div>
<label title="Продолжить">✕</label>
<div><? print "$znach[1]"; ?>, Ваша заявка получена!<br>
Мы позвоним Вам в течении часа.</div>
</div>

<script> // нажав на label посетитель вернётся на предыдущую страницу, где заполнял форму
document.getElementsByTagName('label')[0].onclick = function() {
  window.location.href="<? print $_SERVER['HTTP_REFERER']; ?>"
}
</script>
