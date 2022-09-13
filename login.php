<!DOCTYPE html>
    <html lang="en">
        <?php include 'partial/head.php';?>
    <body>
        <?php include 'partial/nav2.php';?>
        <div class="info">
                    <img src="images/rubycrud.png" alt="logo" style="margin: 50px 0;display: block;margin-left: auto;margin-right: auto;width: 30%;">
                </div>
        <div class="container-fluid d-flex align-items-center justify-content-center">
            <div class="row bg-light border border-primary" style="border-radius: 6px;border-color: #ec1622!important;">
                <div class="col mt-5 col-xs-12 col-md-12 col-lg-12">
                    
                    <form action="/login_check" method="post">
                        <div class="form-group">
                            <h6><i class="fa fa-user-circle-o" aria-hidden="true"></i> Введите вашего логин:</h6>
                            <input type="text" class="form-control" id="username" name="username" value="" placeholder="Введите вашего логин" required="required" />
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                        <div class="form-group">
                            <h6><i class="fa fa-key" aria-hidden="true"></i> Введите вашего пароль:</h6>
                            <input type="password" class="form-control" id="password" name="_password" placeholder="Введите вашего пароль" required="required" />
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                    </form>

                </div>
                <div class="col col-xs-12 col-md-12 col-lg-12 mt-1 mb-5">
                    <a class="btn btn-danger btn-block" href="/register/"> Войти <i class="fa fa-sign-in" aria-hidden="true"></i> </a>
                </div>
            </div>
        </div>
        <?php include 'partial/footer.php';?>
    </body>
</html>