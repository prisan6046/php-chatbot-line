<!DOCTYPE html>
<html lang="en">
<head>
  <title>หน้าสำหรับเพิ่มข้อมูล</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

<h2>เพิ่มคำสำหรับ Chatbot</h2>
  <form action="insert.php" method="post">
    <div class="form-group">
      <label for="email">คำที่ค้นหา</label>
      <input type="text" class="form-control" id="email"  name="keyword">
    </div>
    <div class="form-group">
      <label for="pwd">คำที่ตอบ</label>
      <input type="text" class="form-control" id="pwd"  name="intent">
    </div>
   
    <button type="submit" class="btn btn-default">บันทึก</button>
  </form>
  <br />
  <br />
  <h2>ข้อความ</h2>
  <p>ตัวอย่างการค้นหาคำเพื่อตอบสำหรับ chatbot</p>            
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>คำที่ค้นหา</th>
        <th>คำที่ตอบ</th>
      </tr>
    </thead>
    <tbody>
    <?php
    include "config.php";
    $sql = "select * from data";
    $res = $conn->query($sql);
      if($res->num_rows > 0){
        while ($row = $res->fetch_assoc()) {
              echo "<tr>
                    <td>".$row['keyword']."</td>
                    <td>".$row['intent']."</td>
                    <td><a href=\"delete.php?id=".$row['id']."\"><button type=\"button\" class=\"btn btn-danger\">ลบข้อมูล</button></a></td>
                    </tr>";
        }
      }

    ?>
      
     
    </tbody>
  </table>
</div>

</body>
</html>
