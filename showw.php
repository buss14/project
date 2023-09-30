
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylee.css">
    
</head>
<body>

        <div class="">
            <h>

            </h>
        </div>

        <?php
        $sql = "SELECT * FROM answer WHERE q_id='$q_id' ORDER BY q_id,a_id ";
        if($result = $mysqli -> query($sql)){

    while ($row = $result -> fetch_array()){
        $q_id_2 = $row["q_id"];
        $detail01_2 = $row["detail"];
        $postby_2 = $row["postby"];
        $postdata_2 = $row["postdate"];

        $detail01_2 = nl2br($detail01_2);
        echo "<br><br>แสดงความคิดเห็น";
        echo "<br>detail: $detail01_2";
        echo "<br>post by: $postby_2";
        echo "<br>post data: $postdata_2";

    }
}
?>
        <div class="d.flex justify-content-center align-items-center ">
        <h1>แสดงความคิดเห็น</h1>
        <form action="answer.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="q_id" value="<?php echo $q_id; ?>">
        <table>
        <tr>
            <td>รายละเอียด</td>
            <td> <textarea name="txtdetail01" rows="3" cols="30"></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="text" name="txtpostby"></td>
        </tr>

        <tr>
            <td></td>
            <td><input type="submit" name="submit_btn" value="บันทึก"></td>
        </tr>


        </table>


        </form>
        <a href="webb.php"><h3>รายการเว็บบอร์ด</h3></a>

        </div>
        </h>
    </div>
</body>
</html>