<?
session_start();
include ("./dbconn.php");

$user_id = $_POST["user_id"];
$user_pw = $_POST["user_pw"];
$_SESSION['user_id'] = $user_id;

$query3 = "SELECT * FROM Customer WHERE member_id LIKE '$user_id' AND member_pw LIKE '$user_pw'";

$login_info = mysqli_query($conn, $query3);
$login_access = mysqli_num_rows($login_info);

if($login_access){
    echo "<script> location.href='./main_page.html' </script>";
}
else if(!$login_access) {
    echo "<script>alert('아이디 혹은 비밀번호가 일치하지 않습니다.'); location.href='./index.html'</script>";
}

?>
