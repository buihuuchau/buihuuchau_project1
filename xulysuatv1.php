<?php include "./myfunction.php"?>
<?php
    $idtv = $_COOKIE['idtv'];
    $idquan = $_COOKIE['idquan'];// tranh lay thong tin nhan vien quan khac
    $idchucvu = $_COOKIE['idchucvu'];
    kiemtraquyen(1,2,0,0,0);

    $idtvsua = $_GET['idtvsua']; // idtv nhan tu trang truoc // khi nao get du lieu moi can dat ten bien khac nhau
    setcookie('idtvsua', $idtvsua, time() + 3600);

    $sql ="SELECT * FROM `thanhvien` WHERE idtv='$idtvsua' AND idquan='$idquan'";
    $result = query($sql);

    $row=$result->fetch_array();
    $hinhtv = $row['hinhtv'];
    $diachi = $row['diachi'];
    $idchucvu = $row['idchucvu'];
    $luong = $row['luong'];

    $sql2 ="SELECT * FROM `chucvu`";
    $result2 = query($sql2);
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="xulysuatv1.css">
    <title>Sửa Thông Tin Thành Viên</title>
</head>
<body>
    <div class="than">

        <div class="than1"></div>

        <div class="than2">

            <center><h1>Sửa thông tin thành viên</h1></center>
            <form action="xulysuatv2.php" method="post" enctype="multipart/form-data">
                <center><img src="<?php echo $hinhtv; ?>" width="200px" height="200px"></center>
                <div class="hang"><label for="hinhtv">Hình ảnh:</label>   <input type="file" name="hinhtv"></div>
                <div class="hang"><label for="diachi">Địa chỉ:</label>    <input type="text" name="diachi" id="diachi" value="<?php echo $diachi; ?>"></div>
                <div class="dschon">
                    <div class="dschon1"><label for="idchucvu">Chọn chức vụ:</label></div>
                    <div class="dschon2">
                        <select name='idchucvu' id='idchucvu'>
                            <?php
                                while($row2 = $result2->fetch_array()){
                                    $idchucvu2 = $row2['idchucvu'];
                                    $tenchucvu2 = $row2['tenchucvu'];
                                    echo $idchucvu2;
                                    echo $tenchucvu2;
                                    if($idchucvu==$idchucvu2){
                                        echo"
                                            <option value='$idchucvu2' selected>$tenchucvu2</option>
                                        ";
                                    }
                                    else{
                                        echo"
                                            <option value='$idchucvu2'>$tenchucvu2</option>
                                        "; 
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="hang"><label for="luong">Lương:</label>   <input type="number" name="luong" id="luong" value="<?php echo $luong; ?>"></div>
                <div class="nut">
                    <input type="submit" value="Cập nhật" class="nut1">
                    <a href='./quanlynhanvien.php' class='nut2'><center>Về trang trước</center></a>
                </div>
            </form>

        </div>

        <div class="than3"></div>

    </div>
</body>
</html>