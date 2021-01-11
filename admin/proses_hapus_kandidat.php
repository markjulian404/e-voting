  <?php 
  define("BASEPATH", dirname(__FILE__));
  include('../config.php');
    $id = $_GET['id'];
    $cek = mysqli_query($con,"SELECT * FROM kandidat WHERE id='$id'");
    $data = mysqli_fetch_array($cek);
    $foto = $data['gketua'];
    $foto2 = $data['gwketua'];
    unlink("img/".$foto);
    unlink("img/".$foto2);

    mysqli_query($con,"DELETE FROM kandidat WHERE id='$id'")or die(mysqli_error());
    echo '<script type="text/javascript">
    alert("Data berhasil di hapus");
    window.location="kandidat.php";</script>';
    exit;
  ?>