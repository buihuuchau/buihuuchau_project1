<?php
    $con = new mysqli("localhost", "root","", "quanly");
    $con->set_charset("utf8");
    $sql = "SELECT * FROM `hoadon` WHERE idquan='$idquan'";
    $result = $con->query($sql);

    while($row = $result->fetch_array()){
        $idhd = $row['idhd'];
        $idtv = $row['idtv'];
        $idban = $row['idban'];
        $ngaytao = $row['ngaytao'];
        $giotao = $row['giotao'];
        $thanhtien = $row['thanhtien'];
        echo "$ngaytao, ";
        echo "$giotao, ";
        echo "$thanhtien, ";

        $sql0 = "SELECT * FROM `thanhvien` WHERE idtv='$idtv'";
        $result0 = $con->query($sql0);

        while($row0 = $result0->fetch_array()){
            $hoten = $row0['hoten'];
            echo "$hoten, ";
        }

        $sql1 = "SELECT * FROM `ban` WHERE idban='$idban'";
        $result1 = $con->query($sql1);

        while($row1 = $result1->fetch_array()){
            $tenban = $row1['tenban'];
            echo "$tenban, ";
        }

        $sql2 = "SELECT * FROM `chitiet` WHERE idhd='$idhd'";
        $result2 = $con->query($sql2);

        while($row2 = $result2->fetch_array()){
            $idmon = $row2['idmon'];
            $soluong = $row2['soluong'];
            echo "$soluong, ";

            $sql3 = "SELECT * FROM `mon` WHERE idmon='$idmon'";
            $result3 = $con->query($sql3);

            while($row3 = $result3->fetch_array()){
                $tenmon = $row3['tenmon'];
                echo "$tenmon";
                echo "<br>";
            }
        }
    }
    $con->close();
?>