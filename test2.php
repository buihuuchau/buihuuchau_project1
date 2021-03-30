<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="doiban.css">
        <title>Đổi bàn</title>
    </head>
    <body>
        <div class="than">
            <div class="than1"></div>

            <div class="than2">
                <center>Đổi bàn</center>
                <form action="xulyhoadon.php" method="post">
                    <label for="idban">Sửa bàn:</label>
                    <select name="idban" id="idban">
                        <?php
                            $con = new mysqli("localhost", "root","", "quanly");
                            $con->set_charset("utf8");
                            $sql = "SELECT * FROM `hoadon` WHERE idquan='$idquan'";
                            $result = $con->query($sql);
                        
                            while($row = $result->fetch_array()){
                                $idhd = $row['idhd'];
                                $idtv = $row['idtv'];
                                $idban = $row['idban'];
                                $idquan = $row['idquan'];
                                $ngaytao = $row['ngaytao'];
                                $giotao = $row['giotao'];
                                $thanhtien = $row['thanhtien'];
                                // echo "$ngaytao, ";
                                // echo "$giotao, ";
                                // echo "$thanhtien, ";
                        
                                $sql0 = "SELECT * FROM `thanhvien` WHERE idtv='$idtv'";
                                $result0 = $con->query($sql0);
                        
                                while($row0 = $result0->fetch_array()){
                                    $idtv = $row0['idtv'];
                                    $hoten = $row0['hoten'];
                                    // echo "$hoten, ";
                                }
                        
                                $sql1 = "SELECT * FROM `ban` WHERE idban='$idban'";
                                $result1 = $con->query($sql1);
                                
                                while($row1 = $result1->fetch_array()){
                                    $idban = $row1['idban'];
                                    $tenban = $row1['tenban'];
                                    // echo "$tenban, ";
                                    echo"
                                        <option value='$idban'>$tenban</option>
                                    ";
                                }
                        
                                $sql2 = "SELECT * FROM `chitiet` WHERE idhd='$idhd'";
                                $result2 = $con->query($sql2);
                        
                                while($row2 = $result2->fetch_array()){
                                    $idct = $row2['idct'];
                                    $idhd = $row2['idhd'];
                                    $idmon = $row2['idmon'];
                                    $soluong = $row2['soluong'];
                                    // echo "$soluong, ";
                        
                                    $sql3 = "SELECT * FROM `mon` WHERE idmon='$idmon'";
                                    $result3 = $con->query($sql3);
                        
                                    while($row3 = $result3->fetch_array()){
                                        $idmon = $row3['idmon'];
                                        $tenmon = $row3['tenmon'];
                                        // echo "$tenmon";
                                        // echo "<br>";
                                    }
                                }
                            }
                            $con->close();
                        ?>
                    </select>




                    <label for="idban">Thành bàn:</label>
                    <select name="idban" id="idban">
                        <?php
                            $con = new mysqli("localhost", "root","", "quanly");
                            $con->set_charset("utf8");
                            $sql = "SELECT * FROM `hoadon` WHERE idquan='$idquan'";
                            $result = $con->query($sql);
                        
                            while($row = $result->fetch_array()){
                                $idhd = $row['idhd'];
                                $idtv = $row['idtv'];
                                $idban = $row['idban'];
                                $idquan = $row['idquan'];
                                $ngaytao = $row['ngaytao'];
                                $giotao = $row['giotao'];
                                $thanhtien = $row['thanhtien'];
                                // echo "$ngaytao, ";
                                // echo "$giotao, ";
                                // echo "$thanhtien, ";
                        
                                $sql0 = "SELECT * FROM `thanhvien` WHERE idtv='$idtv'";
                                $result0 = $con->query($sql0);
                        
                                while($row0 = $result0->fetch_array()){
                                    $idtv = $row0['idtv'];
                                    $hoten = $row0['hoten'];
                                    // echo "$hoten, ";
                                }
                        
                                $sql1 = "SELECT * FROM `ban` WHERE idban='$idban'";
                                $result1 = $con->query($sql1);
                                
                                while($row1 = $result1->fetch_array()){
                                    $idban = $row1['idban'];
                                    $tenban = $row1['tenban'];
                                    // echo "$tenban, ";
                                    echo"
                                        <option value='$idban'>$tenban</option>
                                    ";
                                }
                        
                                $sql2 = "SELECT * FROM `chitiet` WHERE idhd='$idhd'";
                                $result2 = $con->query($sql2);
                        
                                while($row2 = $result2->fetch_array()){
                                    $idct = $row2['idct'];
                                    $idhd = $row2['idhd'];
                                    $idmon = $row2['idmon'];
                                    $soluong = $row2['soluong'];
                                    // echo "$soluong, ";
                        
                                    $sql3 = "SELECT * FROM `mon` WHERE idmon='$idmon'";
                                    $result3 = $con->query($sql3);
                        
                                    while($row3 = $result3->fetch_array()){
                                        $idmon = $row3['idmon'];
                                        $tenmon = $row3['tenmon'];
                                        // echo "$tenmon";
                                        // echo "<br>";
                                    }
                                }
                            }
                            $con->close();
                        ?>
                    </select>
                    <input type="submit" value="Gửi">
                </form>
                <div class="nut">
                    <a href="thongtincanhan.php" class="nut1"><center>Về trang chính</center></a>
                    <a href="hoadon.php" class="nut1"><center>Sửa hóa đơn/ Thanh toán</center></a>
                </div>
            </div>

            <div class="than3"></div>
        </div>
    </body>
</html>