<?
session_start();
include ("./dbconn.php");

$book_no = $_GET["book_no"];
$_SESSION['book_no2'] = $book_no;

?>
<html>
<head>
	<meta charset="utf-8" />
	<title>예약 변경</title>

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
	<form method="post" name="booking" action="alter2.php">
		<h1 style="position: absolute; left: 550px; top: 100px; color:white;">변경하실 날짜를 입력해주세요.</h1><br>
    <fieldset style="position: absolute; left: 600px; top: 180px;">
				<legend style="color:white;"></legend>
					<table>

						<tr>
							<td style="color:white;">여행날짜 </td>
							<td><input type="text" size="20" name="date" placeholder="YYYY-MM-DD       (-)포함"></td>
						</tr>

            <br>

					</table>

				<br><center><input type="submit" value="변경하기"></center>
      </fieldset>
	</form>


</body>
</html>
