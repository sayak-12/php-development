<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reading data with php</title>
</head>
<body>
    <table class="table">
        <tr>
            <th>Sl.no.</th>
            <th>Username</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Password</th>
            <th>Time Submitted</th>
        </tr>
        <?php
            include 'connection.php';
            $query = "SELECT * FROM `data_table`";
            $appl = mysqli_query($con, $query);
            // $numrow = mysqli_num_rows($appl);
            /*$applArray = mysqli_fetch_all($appl, MYSQLI_ASSOC);
            ?>
            <script>
                var mytable = document.querySelector(".table");
            var jsAppl = <?php echo json_encode($applArray); ?>;
            console.log(jsAppl);
            for (let i = 0; i < jsAppl.length; i++) {
                mytable.innerHTML += `<tr><td>${i+1}</td><td>${jsAppl[i].Username}</td><td>${jsAppl[i].email}</td><td>${jsAppl[i].phone}</td><td>${jsAppl[i].password}</td><td>${jsAppl[i].timestamp}</td></tr>`;
                
            }
            </script>
            <?php*/
            $i=1;
            while($res = mysqli_fetch_array($appl)){
                ?>
                    <tr>
                        <td><?php echo $i; $i++; ?></td>
                        <td><?php echo $res['Username'];?></td>
                        <td><?php echo $res['email'];?></td>
                        <td><?php echo $res['phone'];?></td>
                        <td><?php echo $res['password'];?></td>
                        <td><?php echo $res['timestamp'];?></td>
                    </tr>
                <?php
            }
        ?>
    </table>
</body>
</html>