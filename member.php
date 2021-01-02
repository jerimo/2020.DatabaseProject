<?
session_start();
include ("./dbconn.php");

$userid = $_POST["userid"];
$userpw = $_POST["userpw"];
$name = $_POST["name"];
$phoneNum = $_POST["phoneNum"];
$_SESSION['userid'] = $userid;

$query = "SELECT * FROM Customer where member_id = '$userid'";
$result = mysqli_query($conn, $query);
$num = mysqli_num_rows($result);

  if(!$num) {
    $query2 = "INSERT INTO Member VALUES ('$userid','$userpw','$name','$phoneNum')";
    mysqli_query($conn, $query2);
    echo "<script>alert('회원가입이 완료되었습니다. 로그인 페이지로 이동합니다.'); location.href='./index.html'</script>";
  }
  else {
    echo "<script>alert('아이디가 중복되었습니다.'); location.href='./sign_up.html'</script>";
  }

?>
