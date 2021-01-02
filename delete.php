<?
include ("./dbconn.php");

$book_no = $_GET["book_no"];

$query = "DELETE FROM book WHERE book_num = '$book_no'";

mysqli_query($conn, $query);
    echo "<script>alert('예약이 취소 되었습니다.'); location.href='./main_page.html'</script>";
?>
