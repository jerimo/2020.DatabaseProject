<?
session_start();
echo "예약완료창..<br> db에 저장하기.<br> member.php(회원가입)이랑 똑같이..<br>------------------------<br>";

include ("./dbconn.php");


$product_num = $_SESSION['product_num'] ;
$user_id = $_SESSION['user_id'] ;
$name = $_POST["name"];
$date = $_POST["date"];
$peopleNum = $_POST["peopleNum"];


//현재까지 예약한 인원수 카운트
$query = "SELECT * FROM book";
$book_cnt = mysqli_query($conn, $query);
$book_numbering = mysqli_num_rows($book_cnt);

$book_num = $book_numbering + 1;
//***********************************
//$query00 = "SELECT now() + 3 AS now;"
//$result = mysqli_query($conn, $query00);
//$book_numm = mysqli_fetch_object($result);
//$book_num = $book_numm->now;
//***********************************
$query2 = "INSERT INTO book VALUES('$book_num','$product_num','$user_id','$date','$peopleNum')";

$query3 = "SELECT * FROM book WHERE member_id LIKE '$user_id' AND book_date LIKE '$date'";

$date_cnt = mysqli_query($conn, $query3);
$same_date = mysqli_num_rows($date_cnt);

echo "<br> 같은 아이디 같은날짜 몇개? : $same_date";

//같은 아이디가 같은 날짜에 예약 할 경우 예약불가능
if($same_date){
  echo "<script>alert('해당 날짜에 이미 예약하셨습니다. 메인 화면으로 이동합니다.'); location.href='./main_page.html'</script>";
}

//아니면 예약후 삽입문 실행
else if(!$same_date){
 mysqli_query($conn, $query2);
 echo "<script>alert('예약이 완료되었습니다. 메인 화면으로 이동합니다.'); location.href='./main_page.html'</script>";
}





?>
