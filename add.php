<?php
// mysql connection
require_once 'includes/db.php';
$query = "SELECT * FROM `students`";
$results = mysqli_query($conn, $query);
$records = mysqli_num_rows($results);
$msg = "";
if (!empty($_GET['msg'])){
    $msg = $_GET['msg'];
    $alert_msg = ($msg == "add") ? "&#9989; Новая запись успешно добавлена!" : (($msg == "del") ? "&#10062; Запись успешно удалена!" : "&#9851; Запись успешно обновлена!");
    }else{
        $alert_msg = "";
    }
?>
<!DOCTYPE html>
    <html lang="en">
        <?php include 'partial/head.php';?>
    <body>
    <?php include 'partial/nav.php';?>
    <div class="container-fluid">
        <?php if (!empty($alert_msg))
        {
        ?>
            <div class="alert alert-success"><?php echo $alert_msg; ?></div>
        <?php
        }
        ?>
        <div class="info">
            <img src="images/rubycrud.png" alt="logo" style="margin: 50px 0;margin: 50px 0;display: block;margin-left: auto;margin-right: auto;width: 40%;">
        </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">№-ID</th>
                        <th scope="col">Введённого Имя и Фамилия</th>
                        <th scope="col">Выбронного Поль</th>
                        <th scope="col">Введённого E-Мail</th>
                        <th scope="col">Ввыбронного Курса</th>
                        <th scope="col">Действие</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if (!empty($records))
                        {
                            while ($row = mysqli_fetch_assoc($results))
                            {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $row['id']; ?></th>
                                    <td><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></td>
                                    <td><?php echo $row['gender']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['course']; ?></td>
                                    <td>
                                        <a href="http://crud/add.php?id=<?php echo $row['id']; ?>" class="btn btn-primary"><i class="fa fa-check-square-o" aria-hidden="true"></i> ИЗМЕНИТЬ</a>
                                        <a href="http://crud/delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onClick="javascript:return confirm('Вы действительно хотите удалить?');" ><i class="fa fa-trash" aria-hidden="true"></i> УДАЛИТЬ</a>
                                    </td>
                                </tr>
                            <?php
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <?php include 'partial/footer.php';?>
    </body>
</html>