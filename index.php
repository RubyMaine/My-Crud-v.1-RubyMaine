<?php

if (isset($_POST['submit']) && $_POST['submit'] != ''){
    // require the db connection
    require_once 'includes/db.php';
    $first_name = (!empty($_POST['first_name'])) ? $_POST['first_name'] : '';
    $last_name = (!empty($_POST['last_name'])) ? $_POST['last_name'] : '';
    $gender = (!empty($_POST['gender'])) ? $_POST['gender'] : '';
    $email = (!empty($_POST['email'])) ? $_POST['email'] : '';
    $course = (!empty($_POST['course'])) ? $_POST['course'] : '';
    $id = (!empty($_POST['student_id'])) ? $_POST['student_id'] : '';
    if (!empty($id)) {
        // update the record
        $stu_query = "UPDATE `students` SET first_name='" . $first_name . "', last_name='" . $last_name . "',gender='" . $gender . "',email= '" . $email . "', course='" . $course . "' WHERE id ='" . $id . "'";
        $msg = "update";
    } else {
        // insert the new record
        $stu_query = "INSERT INTO `students` (first_name, last_name, gender,email, course) VALUES ('" . $first_name . "', '" . $last_name . "', '" . $gender . "', '" . $email . "', '" . $course . "' )";
        $msg = "add";
    }
    $result = mysqli_query($conn, $stu_query);
    if ($result) {
        header('location:http://crud/index.php?msg=' . $msg);
    }
}

if (isset($_GET['id']) && $_GET['id'] != ''){
    // require the db connection
    require_once 'includes/db.php';
    $stu_id = $_GET['id'];
    $stu_query = "SELECT * FROM `students` WHERE id='" . $stu_id . "'";
    $stu_res = mysqli_query($conn, $stu_query);
    $results = mysqli_fetch_row($stu_res);
    $first_name = $results[1];
    $last_name = $results[2];
    $gender = $results[3];
    $email = $results[4];
    $course = $results[5];
}else{
    $first_name = "";
    $last_name = "";
    $gender = "";
    $email = "";
    $course = "";
    $stu_id = "";
}
?>
<!DOCTYPE html>
    <html lang="en">
        <?php include 'partial/head.php';?>
    <body>
        <?php include 'partial/nav2.php';?>
        <div class="container">
            <div class="formdiv">
                <div class="info">
                    <img src="images/rubycrud.png" alt="logo" style="margin: 50px 0;">
                </div>
                <form method="POST" action="">
                    
                    <div class="form-group row container-fluid">
                        <label for="first_name" class="col-sm-3 col-form-label"><i class="fa fa-id-card-o" aria-hidden="true"></i> Введите вашего <b>Имя:</b> </label>
                        <div class="col-sm-7">
                            <input required type="text" name="first_name" class="form-control" id="first_name" placeholder="Введите правильно вашего Имя" value="<?php echo $first_name; ?>">
                        </div>
                    </div>

                    <div class="form-group row container-fluid">
                        <label for="last_name" class="col-sm-3 col-form-label"><i class="fa fa-id-card" aria-hidden="true"></i> Введите вашего <b>Фамилия:</b> </label>
                        <div class="col-sm-7">
                            <input required type="text" name="last_name" class="form-control" id="last_name" placeholder="Введите правильно вашего Фамилия" value="<?php echo $last_name; ?>">
                        </div>
                    </div>

                    <div class="form-group row container-fluid">
                        <label for="gender" class="col-sm-3 col-form-label"><i class="fa fa-check-square-o" aria-hidden="true"></i> Выберите вашего <b>Поль:</b> </label>
                        <div class="col-sm-7">
                            <select class="form-control" name="gender" id="gender">
                                <option value="Male" <?php if ($gender == 'Male') {echo "selected";}?>> Мужской </option>
                                <option value="Female" <?php if ($gender == 'Female') {echo "selected";}?>> Женский </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row container-fluid">
                        <label for="email" class="col-sm-3 col-form-label"><i class="fa fa-envelope" aria-hidden="true"></i> Введите вашего <b>E-Mail:</b></label>
                        <div class="col-sm-7">
                            <input required type="email" value="<?php echo $email; ?>" name="email" class="form-control" id="email" placeholder="Введите правильно вашего E-Mail почту">
                        </div>
                    </div>

                    <div class="form-group row container-fluid">
                        <label for="course" class="col-sm-3 col-form-label"><i class="fa fa-language" aria-hidden="true"></i> Выберите вашего <b>Курса:</b> </label>
                        <div class="col-sm-7">
                            <select class="form-control" name="course" id="course">
                                <option value="BCA" <?php if ($course == 'BCA') {echo "selected";}?>> Front-end Developer </option>
                                <option value="MCA" <?php if ($course == 'MCA') {echo "selected";}?>> Back-end Developer </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row container-fluid">
                        <div class="col-sm-10" style="text-align: end;">
                            <input type="hidden" name="student_id" value="<?php echo $stu_id; ?>">
                            <input type="submit" name="submit" class="btn btn-success" value="ОТПРАВИТЬ" />
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
        <?php include 'partial/footer.php';?>
    </body>
</html>