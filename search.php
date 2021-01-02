
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

a:link{color:#B0EDFD}
a:visited{color:#B0EDFD}

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
      <th>상품 번호</th>
      <th>테마 이름</th>
      <th>나라 이름</th>
      <th>관광지 이름</th>
      <th>상품 가격</th>
      <th>예약  </th>
    </tr>

<?
include ("./dbconn.php");

$country = $_POST["country"];
$theme = $_POST["theme"];

//echo "나라명 : $country<br>";
//echo "테마명 : $theme<br>";


//미 선택시
if (!$country && $theme=="no_theme"){
    echo "<script>alert('나라와 테마 중 하나라도 지정해주세요.'); location.href='./main_page.html'</script>";
}

//나라만 선택시
else if ($country && $theme=="no_theme"){
    $query4 = "SELECT product_num, theme_name, country_name, landmark_name, product_price
              FROM productinfo
              WHERE country_name LIKE '$country'";
}

//테마만 선택시
else if (!$country && $theme){
    $query4 = "SELECT product_num, theme_name, country_name, landmark_name, product_price
              FROM productinfo
              WHERE theme_name LIKE '$theme'";
}

//나라와 테마선택시
else if ($country && $theme){
    $query4 = "SELECT product_num, theme_name, country_name, landmark_name, product_price
              FROM productinfo
              WHERE country_name LIKE '$country' AND theme_name LIKE '$theme'";
}
//echo "<br> 쿼리문 : $query4<br><br>";

$result = mysqli_query($conn, $query4);

// 쿼리문의 행갯수 측정
$search_access = mysqli_num_rows($result);
// 행 하나도 없음. 여행상품 검색 결과 없음.
if(!$search_access){
    echo "<script>alert('검색하신 나라로의 여행상품이 존재하지 않습니다.'); location.href='./main_page.html'</script>";
}

    while ($row = mysqli_fetch_array($result)) {
      echo"
        <tr>
          <td>$row[product_num]</td>
          <td>$row[theme_name]</td>
          <td>$row[country_name]</td>
          <td>$row[landmark_name]</td>
          <td>$row[product_price]</td>
          <td><a href='booking.php?product_num=$row[product_num]'>예약하기</a></td>
        </tr>";
    }



mysqli_close($conn);
?>


</center>
  </body>
