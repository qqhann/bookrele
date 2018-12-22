```
==> ../public_html_bak/arithmetic.php <==
<html>
<head><title>arithmetic.php</title></head>
<body>
<?php
$a=5;
$b=3;
print ($a/$b);
?>
</body>
</html>

==> ../public_html_bak/array.php <==
<html>
<head><title>array.php</title></head>
<body>
<?php
$color1[0]="red";
$color1[1]="green";
$color1[2]="blue";
print_r($color1);
print("<br />");

$color2[]="red";
$color2[]="green";
$color2[]="blue";
print_r($color2);
print("<br />");

$color3=array(0=>'red', 1=>'green', 2=>'blue');
print_r($color3);
?>
</body>
</html>
==> ../public_html_bak/association_array.php <==
<html>
<head><title>association_array</title></head>
<body>
<?php
$like1['color']="red";
$like1['food']="sushi";
$like1['sports']="baseball";
print_r($like1);
print("<br />");

$like2=array('color'=>'red', 'food'=>'sushi', 'sports'=>'baseball');
print_r($like2);
?>
</body>
</html>
==> ../public_html_bak/bit.php <==
<html>
<head><title>bit.php</title></head>
<body>
<?php
$a=5; /* 0101 */
$b=9; /* 1001 */
$c=1; /* 0001 */
print (($a & $b)."<br />"); /* 0001 */
print (($a | $b)."<br />"); /* 1101 */
print (($a ^ $b)."<br />"); /* 1100 */
print ((~$a)."<br />"); /* 1010 */
print (($a << $c)."<br />"); /* 1010 */
print (($a >> $c)); /* 0010 */
?>
</body>
</html>

==> ../public_html_bak/cast.php <==
<html>
<head><title>cast.php</title></head>
<body>
<?php
$sougaku = 1234;
$sougaku = $sougaku * 1.05;
$seikyugaku = (int)$sougaku;
print ("請求額は".$seikyugaku."円です");
?>
</body>
</html>

==> ../public_html_bak/change_type.php <==
<html>
<head><title>change_type.php</title></head>
<body>
<?php
$var_num="10";
print ($var_num + 5 ."<br />");
print ($var_num + 5.5);
?>
</body>
</html>
==> ../public_html_bak/combined.php <==
<html>
<head><title>combined.php</title></head>
<body>
<?php
$a=5;
$a+=5;
$str="value:";
print ($str.=$a);
?>
</body>
</html>

==> ../public_html_bak/compare.php <==
<html>
<head><title>compare.php</title></head>
<body>
<?php
$var=3;
$str="3";
if($var==$str){
    print ("等しい<br />");
}
if($var!==$str){
    print ("等しくない<br />");
}
?>
</body>
</html>
==> ../public_html_bak/conditional.php <==
<html>
<head><title>conditional.php</title></head>
<body>
<?php
$a=10;
$var = ( $a>0 ? "プラスです" : "マイナスまたはゼロです" );
print ($var);
?>
</body>
</html>
==> ../public_html_bak/dowhile.php <==
<html>
<head><title>dowhile.php</title></head>
<body>
<?php
$a=0;
do {
    print ($a."<br />");
    $a++;
} while ($a <= 3);
?>
</body>
</html>

==> ../public_html_bak/endif.php <==
<html>
<head><title>endif.php</title></head>
<body>
<?php
$point = 80;
if ($point >= 70) :
    print ("合格です!");
endif;
?>
</body>
</html>
==> ../public_html_bak/error.php <==
<html>
<head><title>error.php</title></head>
<body>
<?php
$a = 100;
$b = 0;
print ($a / $b);
?>
</body>
</html>

==> ../public_html_bak/execution_for_unix.php <==
<html>
<head><title>execution_for_unix.php</title></head>
<body>
<?php
$var = `pwd`;
print ("<pre>".$var."<pre>");
?>
</body>
</html>

==> ../public_html_bak/execution_for_win.php <==
<html>
<head><title>execution_for_win.php</title></head>
<body>
<?php
$var = `dir`;
print ("<pre>".$var."<pre>");
?>
</body>
</html>
==> ../public_html_bak/for.php <==
<html>
<head><title>for.php</title></head>
<body>
<?php
for ($a=0; $a<=3; $a++){
    print ($a."<br />");
}
?>
</body>
</html>

==> ../public_html_bak/foreach.php <==
<html>
<head><title>foreach.php</title></head>
<body>
<?php
$color3=array(0=>'red', 1=>'green', 2=>'blue');
foreach ($color3 as $value) {
    print ($value."<br />");
}
?>
</body>
</html>

==> ../public_html_bak/get_array_data.php <==
<html>
<head><title>配列データの取得</title></head>
<body>
<table border="1">
<tr><td>題名</td><td>著者</td><td>出版社</td></tr>
<?php
$host = "localhost";
if (!$conn = mysqli_connect($host, "s1511548", "I<38884")){
    die("MySQL接続エラー.<br />");
}
mysqli_select_db($conn, "s1511548");
mysqli_set_charset($conn, "utf8");
$sql = "SELECT * FROM book_table LIMIT 10";
$res = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($res)) {
    print("<tr>");
    print("<td>".$row["btitle"]."</td>");
    print("<td>".$row["bauth"]."</td>");
    print("<td>".$row["bpub"]."</td>");
    print("</tr>\n");
}
mysqli_free_result($res);
?>
</table>
</body>
</html>

==> ../public_html_bak/get_data_multi_2.php <==
<html>
<head><title>配列データの取得</title></head>
<body>
<table border="1">
<tr><td>id</td><td>file</td></tr>
<?php
$host = "localhost";
$mysqli = new mysqli("localhost", "s1511548", "I<38884", "s1511548");
if ($mysqli->connect_error) {
    die("MySQL connection error<br>");
} else {
    $mysqli->set_charset("utf8");
}
$sql = "SELECT * FROM test_table2";
$res = $mysqli->query($sql);
while($row = $res->fetch_array()) {
    print("<tr>");
    print("<td>".$row["id"]."</td>");
    print("<td>".$row["file"]."(<a href=\"".$row["file"]."\">pic</a>)</td>");
    print("</tr>");
}
$res->free();
?>
</table>
</body>
</html>

==> ../public_html_bak/global.php <==
<html>
<head><title>global.php</title></head>
<body>
<?php
$a = 1;
function gtest(){
    global $a;
    print ($a+1);
}
gtest();
?>
</body>
</html>

==> ../public_html_bak/hello_world.php <==
<html>
<head><title>hello_world.php</title></head>
<body>
<?php
$var_str="Hello World";
print ($var_str);
?>
</body>
</html>
==> ../public_html_bak/here.php <==
<html>
<head><title>here.php</title></head>
<body>
<?php
$str = <<< EOD
Hello World!!
これが<font color="red">ヒアドキュメント</font>です。
EOD;
print($str);
?>
</body>
</html>
==> ../public_html_bak/if.php <==
<html>
<head><title>if.php</title></head>
<body>
<?php
$point = 80;
if ($point >= 70) {
    print ("合格です!");
} else {
    print ("残念!");
}
?>
</body>
</html>
==> ../public_html_bak/increment.php <==
<html>
<head><title>increment.php</title></head>
<body>
<?php
$a=5;
print ($a++."<br />");
print ($a."<br />");
print (++$a."<br />");
print ($a);
?>
</body>
</html>

==> ../public_html_bak/kaimono2_class.php <==
<?php
require_once( "kaimono_class.php" );
class kaimono2_class extends kaimono_class {

    var $card;

    function kaimono2_class( $money, $name, $card = 0 ){
        $this->kaimono_class( $money, $name );
        $this->card = $card;
    }

    function get_card(){
        return $this->card;
    }
    function buy2( $nedan ){
        if( !$this->buy( $nedan ) ){
            $this->card -= $nedan;
            return FALSE;
        }else{
            return TRUE;
        }
    }
    function message_money( $shina ){
        $this->message( $shina );
    }
    function message_card( $shina ){
        print( $this->who.":".$shina."-購入(カード)<br />" );
    }
}
?>
==> ../public_html_bak/kaimono_class.php <==
<?php
class kaimono_class{

    var $saifu;
    var $who;

    function kaimono_class( $money, $name ){
        $this->saifu = (int)$money;
        $this->who = $name;
    }

    function get_saifu(){
        return $this->saifu;
    }
    function buy( $nedan ){
        if( $this->saifu < $nedan ){
            return FALSE;
        }else{
            $this->saifu -= $nedan;
            return TRUE;
        }
    }
    function message( $shina ){
            print( $this->who.":".$shina."-購入<br />" );
    }
}
?>
==> ../public_html_bak/logical.php <==
<html>
<head><title>logical.php</title></head>
<body>
<?php
$a=10;
$b=-5;
if($a>0 and $b>0){
    print ("$a・$bともプラスです");
} else {
    print ("プラスとマイナスです");
}
?>
</body>
</html>

==> ../public_html_bak/mix_array.php <==
<html>
<head><title>mix_array.php</title></head>
<body>
<?php
$array = array( 5 => 'fifth', 'a' => 'string a', 'where?', '010' => 'string 010', '8' => 'eighth', 'where?');
print_r($array);
?>
</body>
</html>
==> ../public_html_bak/no_error.php <==
<html>
<head><title>no_error.php</title></head>
<body>
<?php
$a = 100;
$b = 0;
@print ($a / $b);
?>
</body>
</html>

==> ../public_html_bak/no_global.php <==
<html>
<head><title>no_global.php</title></head>
<body>
<?php
$a = 1;
function gtest(){
    print ($a+1);
}
gtest();
?>
</body>
</html>

==> ../public_html_bak/otsukai.php <==
<?php
require_once( "kaimono_class.php" );
define( KODUKAI, 800 );
define( NINJIN, 200 );
define( MOYASHI, 60 );
define( JAGAIMO, 120 );
define( HOURENSOU, 180 );
define( KABOCHA, 320 );
define( TAMANEGI, 220 );
print( "【母豚からのお小遣い】<br />" );
print( KODUKAI."円<br />" );
print("【三匹の子豚のお使い〜3等分して手分けしてお買い物〜】<br />");

$pigA = new kaimono_class(KODUKAI/3, "子豚A");
$pigB = new kaimono_class(KODUKAI/3, "子豚B");
$zankin = KODUKAI - $pigA->get_saifu() - $pigB->get_saifu();
$pigC = new kaimono_class($zankin, "子豚C");

if($pigA->buy( NINJIN )){
    $pigA->message("にんじん");
    $kago[] = "にんじん";
}
if($pigA->buy( MOYASHI )){
    $pigA->message("もやし");
    $kago[] = "もやし";
}
if($pigB->buy( JAGAIMO )){
    $pigB->message("ジャガイモ");
    $kago[] = "ジャガイモ";
}
if($pigB->buy( HOURENSOU )){
    $pigB->message("ホウレン草");
    $kago[] = "ホウレン草";
}
if($pigC->buy( KABOCHA )){
    $pigC->message("かぼちゃ");
    $kago[] = "かぼちゃ";
}
if($pigC->buy( TAMANEGI )){
    $pigC->message("たまねぎ");
    $kago[] = "たまねぎ";
}
print("【買ったものリスト】<br />");
foreach( $kago as $value ){
    print("$value ");
}
print("<br />【おつり合計】<br />");
$otsuri = $pigA->get_saifu() + $pigB->get_saifu() + $pigC->get_saifu();
print( $otsuri."円");
?>
==> ../public_html_bak/otsukai2.php <==
<?php
require_once( "kaimono2_class.php" );
define( KODUKAI, 800 );
define( NINJIN, 200 );
define( MOYASHI, 60 );
define( JAGAIMO, 120 );
define( HOURENSOU, 180 );
define( KABOCHA, 320 );
define( TAMANEGI, 220 );
print( "【母豚からのお小遣い】<br />" );
print( KODUKAI."円<br />" );
print("【三匹の子豚のお使い〜3等分して手分けしてお買い物〜】<br />");

$pigA = new kaimono2_class(KODUKAI/3, "子豚A");
$pigB = new kaimono2_class(KODUKAI/3, "子豚B");
$zankin = KODUKAI - $pigA->get_saifu() - $pigB->get_saifu();
$pigC = new kaimono2_class($zankin, "子豚C");

if($pigA->buy2( NINJIN )){
    $pigA->message_money("にんじん");
}else{
    $pigA->message_card( "にんじん" );
}
if($pigA->buy2( MOYASHI )){
    $pigA->message_money("もやし");
}else{
    $pigA->message_card( "もやし" );
}
if($pigB->buy2( JAGAIMO )){
    $pigB->message_money("ジャガイモ");
}else{
    $pigB->message_card( "ジャガイモ" );
}
if($pigB->buy2( HOURENSOU )){
    $pigB->message_money("ホウレン草");
}else{
    $pigB->message_card( "ホウレン草" );
}
if($pigC->buy2( KABOCHA )){
    $pigC->message_money("かぼちゃ");
}else{
    $pigC->message_card( "かぼちゃ" );
}
if($pigC->buy2( TAMANEGI )){
    $pigC->message("たまねぎ");
}else{
    $pigC->message_card( "たまねぎ" );
}

print("<br />【おつり合計】<br />");
$otsuri = $pigA->get_saifu() + $pigB->get_saifu() + $pigC->get_saifu();
print( $otsuri."円");
print("<br />【カード合計】<br />");
$card = $pigA->get_card() + $pigB->get_card() + $pigC->get_card();
print( $card."円");
?>
==> ../public_html_bak/phpinfo.php <==
<?php
phpinfo();
?>

==> ../public_html_bak/search_type.php <==
<html>
<head><title>search_type.php</title></head>
<body>
<?php
$var=TRUE;
print (gettype($var)."<br />");
$var=100;
print (gettype($var)."<br />");
$var=100.001;
print (gettype($var)."<br />");
$var="TRUE";
print (gettype($var));
?>
</body>
</html>
==> ../public_html_bak/simple_connect.php <==
<html>
<head><title>簡易接続</title></head>
<body>
<?php
$mysqli = new mysqli("localhost", "s1511548", "I<38884", "s1511548");
$mysqli->set_charset("utf8"); // utf8 コードを利用するときにはこれが必要
$res = $mysqli->query("SHOW TABLES");
if($res){
	print ("データ獲得に成功しました。");
}
$res->free();
?>
</body>
</html>

==> ../public_html_bak/string.php <==
<html>
<head><title>string.php</title></head>
<body>
<?php
$str1="Hello";
$str2="World";
print ($str1.$str2);
?>
</body>
</html>

==> ../public_html_bak/switch.php <==
<html>
<head><title>switch.php</title></head>
<body>
<?php
$hyouka = "B";
switch ($hyouka){
    case "A":
        print ("パーフェクト!");
        break;
    case "B":
        print ("素晴らしい!");
        break;
    case "C":
        print ("合格!");
        break;
    default:
        print ("がんばりましょう!");
}
?>
</body>
</html>
==> ../public_html_bak/tax.php <==
<html>
<head><title>tax.php</title></head>
<body>
<?php
function tax($zeikomi) {
    $zeinuki = $zeikomi / 1.05;
    return $zeinuki;
}
print (tax(105));
?>
</body>
</html>

==> ../public_html_bak/variable_variable.php <==
<html>
<head><title>variable_variable.php</title></head>
<body>
<?php
$number=1;
$var_1="one";
$var_2="two";
if($number==1){
    $output="var_1";
}else if($number==2){
    $output="var_2";
}
print $$output;
?>
</body>
</html>

==> ../public_html_bak/while.php <==
<html>
<head><title>while.php</title></head>
<body>
<?php
$a=0;
while ($a <= 3) {
    print ($a."<br />");
    $a++;
}
?>
</body>
</html>

==> ../public_html_bak/while_break.php <==
<html>
<head><title>while_break.php</title></head>
<body>
<?php
$a=0;
while ($a <= 5) {
    print ($a."<br />");
    $a++;
    if ($a == 3)
    break;
}
?>
</body>
</html>
```
