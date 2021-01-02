
<head>
  <title>검색 결과</title>
  <script type="text/javascript">

  </script>
</head>

<style>
body{
background: #343d46;
background-image:url('map.png');
background-repeat: no-repeat;
background-position: center top;
background-size:1200px 700px;
}

a:link{color: white}
a:visited{color: white}

table{
  background-color: #343d46;
  position: absolute;
  top: 170px;
  left: 380px;
  color: white;
  padding: 10px;
}

th{
  font-size: 17px;
  font-weight: bold;
}

</style>

<body>
  <h1 style="position: absolute; left: 650px; top: 70px; color:white;">여행 상품 목록</h1><br>
<center>

  <p align="center"> </p>
  <table width="800" border="1">
    <tr>
      <th>예약 번호</th>
      <th>아이디</th>
      <th>이름</th>
      <th>여행날짜</th>
      <th>테마</th>
      <th>나라</th>
      <th>관광지명</th>
      <th>인원</th>
    </tr>
    <a href="main_page.html" style="position: absolute; left: 1000; top: 450; width: 170px; height: 28px;" value="메인화면">메인화면으로 돌아가기</a>
<?
include ("./dbconn.php");


$user_id = $_POST["user_id"];

$query = "SELECT * FROM Book WHERE member_id LIKE '$user_id'";


$booked_result = mysqli_query($conn, $query);
$booked_access = mysqli_num_rows($booked_result);

if(!$booked_access){
    echo "<script>alert('예약하신 내역이 없습니다.'); location.href='./booking_status.html'</script>";
}

$query2 = "SELECT * FROM Vbook_detail WHERE id LIKE '$user_id'";
$booked_result_view = mysqli_query($conn, $query2);

while ($row = mysqli_fetch_array($booked_result_view)) {
  echo"
    <tr>
      <td>$row[book_no]</td>
      <td>$row[id]</td>
      <td>$row[user_name]</td>
      <td>$row[date]</td>
      <td>$row[theme]</td>
      <td>$row[country]</td>
      <td>$row[landmark]</td>
      <td>$row[people]</td>
      <td><a href='alter.php?book_no=$row[book_no]'>날짜변경</a></td>
      <td><a href='delete.php?book_no=$row[book_no]'>예약취소</a></td>
    </tr>";
}




?>
