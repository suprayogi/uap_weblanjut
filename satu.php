<!DOCTYPE html>
<html lang="en">
<head>
<title>UAP No.1</title>
<style>
.box{ padding: 10px 50px; }
.txtform{ margin: 50px 100px; }
.btnok{ padding: 5px 50px; margin: 0 20px; }
.btncancel{ padding: 5px 20px; }
</style>
</head>
<body>
    <div class="box">
        <form method="POST" action="">
            <div class="txtform">
                Baris : <input type="text" name="baris">
            </div>
            <div class="txtform">
                Kolom : <input type="text" name="kolom">
            </div>
            <div class="txtform">
                <input type="submit" class="btnok" name="submit" value="OK">
                <input type="button" class="btncancel" name="cancel" value="Batal">
            </div>
        </form>
    </div>
    <div class="box">
        <?php
        if(isset($_POST['submit'])){
            $npm="201943570003";
            $baris=(isset($_POST['baris'])?intval($_POST['baris']):0);
            $kolom=(isset($_POST['kolom'])?intval($_POST['kolom']):0);
            echo '<table border="1">';
            for($x=0;$x<$baris;$x++){
            echo '<tr>';
                for($y=0;$y<$kolom;$y++){
                    echo '<td>'.$npm.'</td>';
                }
            echo '</tr>';
            }
            echo '</table>';
        }
        ?>
    </div>
</body>
</html>