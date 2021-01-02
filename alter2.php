<?
session_start();
include ("./dbconn.php");

$date = $_POST["date"];
$book_no = $_SESSION['book_no2'];


$query = "UPDATE book SET book_date = '$date' WHERE book_num = '$book_no'";
//echo "$query";

mysqli_query($conn, $query);

echo "<script>alert('날짜 변경이 완료되었습니다.'); location.href='./main_page.html'</script>";
?>
