  <?php 
  define("BASEPATH", dirname(__FILE__));
  include('../config.php');
    $id = $_GET['id'];
    mysqli_query($con,"DELETE FROM admin WHERE id='$id'")or die(mysqli_error());
    echo '<script type="text/javascript">
    alert("Data berhasil di hapus");
    window.location="admin.php";</script>';
    exit;
  ?>