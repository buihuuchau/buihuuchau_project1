<?php include "./myfunction.php"?>
<script type="text/javascript" src="myfunction.js"></script>
<?php
    $idtv = $_COOKIE['idtv'];
    $idquan = $_COOKIE['idquan'];// tranh lay thong tin nhan vien quan khac
    $idchucvu = $_COOKIE['idchucvu'];

    kiemtraquyen(1,2,4,0,0);

    $idhd = $_GET['idhd'];
    $idban = $_GET['idban'];

    $sql = "SELECT * FROM `ban` WHERE idquan='$idquan'";
    $result = query($sql);
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="xulydoiban1.css">
    <title>Chọn Bàn Muốn Đổi</title>
</head>
<body>
    <div class="than">
        <div class="than1"></div>
        <div class="than2">
            <center>Chọn Bàn Muốn Đổi</center><br>
            <form action="xulydoiban2.php" method="post">
                <input class="an" type="text" name="idhd" id="idhd" value="<?php echo $idhd ?>">
                <label for="idban">Chọn bàn muốn đổi:</label>
                <select name="idban" id="idban">
                    <?php
                        while($row = $result->fetch_array()){
                            $idban = $row['idban'];
                            $tenban = $row['tenban'];
                            echo"
                                <option value='$idban'>$tenban</option>
                            ";
                        }
                    ?>
                </select>
                <input type="submit" value="Đổi bàn">
            </form>
            <div class="nut" onclick="quayve()">Quay về</div>
        </div>
        <div class="than3"></div>
    </div>
</body>
</html>