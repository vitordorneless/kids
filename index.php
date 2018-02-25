<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Main CSS-->
        <link rel="stylesheet" type="text/css" href="app/View/css/vali-admin-master/docs/css/main.css">
        <!-- Font-icon css-->
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Kids</title>
    </head>
    <body>
        <section class="material-half-bg">
            <div class="cover"></div>
        </section>
        <section class="login-content">
            <div class="logo">
                <h1>Vítor Dorneles</h1>
            </div>
            <div class="login-box">
                <form id="signupForm" method="post" class="login-form" action="">
                    <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Logar</h3>
                    <div class="form-group">
                        <label class="control-label">Usuário</label>
                        <input class="form-control" id="user" name="user" type="text" autofocus />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Senha</label>
                        <input class="form-control" id="pass" name="pass" type="password" placeholder="Password" />
                    </div>
                    <div class="form-group btn-container">
                        <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>Acessar</button>
                    </div>
                    <div class="form-group">
                        <div id="message"></div>
                    </div>
                </form>
            </div>
        </section>
    </body>
    <!-- Essential javascripts for application to work-->
    <script src="app/View/js/validator/lib/jquery-1.11.1.js"></script>
    <script src="app/View/css/vali-admin-master/docs/js/popper.min.js"></script>
    <script src="app/View/css/vali-admin-master/docs/js/bootstrap.min.js"></script>
    <script src="app/View/css/vali-admin-master/docs/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="app/View/css/vali-admin-master/docs/js/plugins/pace.min.js"></script>
    <script type="text/javascript" src="app/View/js/validator/dist/jquery.validate.js"></script>
</html>

<script type="text/javascript">
    $(document).ready(function () {

        $.validator.setDefaults({
            submitHandler: function () {

                $("#message").empty();
                var user = $("#user").val();
                var pass = $("#pass").val();

                $.ajax({
                    type: "POST",
                    dataType: "HTML",
                    url: "app/Controller/login.php",
                    data: "user=" + user + "&pass=" + pass,
                    beforeSend: function () {
                        $("#message").html("<img src='app/View/img/loading/Spinner-1s-200px.gif'>");
                    },
                    success: function (response) {
                        if (response === '1') {
                            window.location.href = "app/View/index.php";
                        } else {
                            $("#message").html('Tente novamente, Usuário ou Senha incorretos!'), $("#form")[0].reset();
                        }
                    },
                    error: function () {
                        alert("Ocorreu um erro durante a requisição");
                    }
                });
            }
        });

        $("#signupForm").validate({
            rules: {
                user: {
                    required: true,
                    minlength: 5
                },
                pass: {
                    required: true,
                    minlength: 5
                }
            },
            messages: {
                user: {
                    required: "Informe Login",
                    minlength: "Login não pode possuir 2 letras"
                },
                pass: {
                    required: "Informe Senha",
                    minlength: "Menor que 5 caracteres não pode"
                }
            },
            errorElement: "em",
            errorPlacement: function (error, element) {
                // Add the `help-block` class to the error element
                error.addClass("help-block");

                if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.parent("label"));
                } else {
                    error.insertAfter(element);
                }
            },
            highlight: function (element, errorClass, validClass) {
                $(element).parents(".col-sm-5").addClass("has-error").removeClass("has-success");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parents(".col-sm-5").addClass("has-success").removeClass("has-error");
            }
        });
    });
</script>
<script type="text/javascript">
    // Login Page Flipbox control
    $('.login-content [data-toggle="flip"]').click(function () {
        $('.login-box').toggleClass('flipped');
        return false;
    });
</script>