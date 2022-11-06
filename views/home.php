<body class="text-center">
    <div class="container" style="padding:24px">
        <div class = "row">
        <div class = "col-6">
            <?php
                if (isset($_SESSION['is_logged']))
                {   ?>
                    <h2>Bem-vindo ao Sistema de Gestão de Alocação de Salas,
                    <?php
                        echo $_SESSION['user_name'] . "!";
                    ?>
                    </h2>
                <?php
                }
                else
                {   ?>
                    <h2>Bem-vindo ao Sistema de Gestão de Alocação de Salas!</h2>
                    <h4>Cadastre-se ou faça login para utilizar o sistema!</h4>
                <?php
                }
            ?>
        </div>
        <div class = "col-6">
            <?php
                if (!isset($_SESSION['is_logged']))
                {
                    ?>
                    <main class="form-signin w-100 m-auto">
                    <form method="post" id="login_form" action="login_user.php">
                        <br>
                        <h1 class="h3 mb-3 fw-normal">Login</h1>
                        <br>
                        <div class="form-floating">
                        <input type="email" class="form-control" id="floatingInput" name="userEmail" placeholder="name@example.com">
                            <label for="floatingInput">Endereço de E-mail</label>
                        </div>            
                        <hr>
                        <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" name="userPassword" placeholder="Password">
                            <label for="floatingPassword">Senha</label>
                        </div>
                        <hr>
                        <?php 
                        if (isset($_GET['error']) && $_GET['error'] == 1)
                        {
                            echo '<p style="color:#cc3300" id="errorMessage">Credenciais inválidas!</p>';
                        }
                        ?>
                        <button class="w-100 btn btn-lg btn-primary" id="submitButton" type="submit">Fazer Login</button>
                    </form>
                    </main>
                <?php
                }
                ?>
        </div>
        </div>
    </div>
    <script src="../js/sgas/form_validation.js"></script>
</body>