<?
session_start();
include ("./dbconn.php");
$product_num = $_GET["product_num"];
$_SESSION['product_num'] = $product_num;
$user_id = $_SESSION['user_id'] ;
?>
<html>
<head>
	<meta charset="utf-8" />
	<title>여행 예약</title>




</head>
<style>
body{
background: #343d46;
background-image:url('map.png');
background-repeat: no-repeat;
background-position: center top;
background-size:1200px 700px;
}
</style>
<body>
	<form method="post" name="booking" action="booked.php">
		<h1 style="position: absolute; left: 600px; top: 100px; color:white;">여행 예약</h1><br>
    <fieldset style="position: absolute; left: 600px; top: 180px;">
				<legend style="color:white;">필요한 정보를 입력해 주세요.</legend>
					<table>
						<tr>
							<td style="color:white;">상품번호</td>
							<td style="color:white;"><b><?echo "$product_num";?></b></td>
						</tr>
						<tr>
							<td style="color:white;">아이디</td>
							<td style="color:white;"><b><?echo "$user_id";?></b></td>
						</tr>
						<tr>
							<td style="color:white;">이름</td>
							<td><input type="text" size="35" name="name" placeholder="김디비"></td>
						</tr>
						<tr>
							<td style="color:white;">여행날짜</td>
							<td><input type="text" size="35" name="date" placeholder="YYYY-MM-DD     (-) 하이픈 포함"></td>
						</tr>
            <tr>
              <td style="color:white;" id="peopleNum">인원</td>
              <td><input type="text" size="35" name="peopleNum" placeholder="숫자만 입력해주세요"></td>
            </tr><br>

					</table>

				<br><input type="submit" value="예약하기" onclick="checkFrom();" />
      </fieldset>
	</form>


</body>
</html>
