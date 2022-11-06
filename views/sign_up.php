<head>
  <script src="../js/sgas/form_validation.js"></script>
  <style>
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }

  .b-example-divider {
    height: 3rem;
    background-color: rgba(0, 0, 0, .1);
    border: solid rgba(0, 0, 0, .15);
    border-width: 1px 0;
    box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
  }

  .b-example-vr {
    flex-shrink: 0;
    width: 1.5rem;
    height: 100vh;
  }

  .bi {
    vertical-align: -.125em;
    fill: currentColor;
  }

  .nav-scroller {
    position: relative;
    z-index: 2;
    height: 2.75rem;
    overflow-y: hidden;
  }

  .nav-scroller .nav {
    display: flex;
    flex-wrap: nowrap;
    padding-bottom: 1rem;
    margin-top: -1px;
    overflow-x: auto;
    text-align: center;
    white-space: nowrap;
    -webkit-overflow-scrolling: touch;
  }
  </style>
</head>

<body class="text-center">
  <div class = "container">
    <div class = "row">
      <div class = "col-3"></div>
      <div class = "col-6">
        <main class="form-signin w-100 m-auto">
          <form method="post" id="signup_form"> <!--action="register_user.php"-->
            <br>
            <h1 class="h3 mb-3 fw-normal">Cadastro</h1>
            <br>
            <div class="form-floating">
              <input type="text" class="form-control" id="floatingName" name = "userName" placeholder="Nome Completo" required maxLenght="64">
              <label for="floatingName">Nome Completo</label>
            </div>
            <hr>
            <div class="form-floating">
              <input type="text" minlength="14" maxlength="14" class="form-control" id="floatingCpf" name = "userCPF" placeholder="CPF" required>
              <script>
                $("#floatingCpf").keypress(function() {
                    $(this).mask('000.000.000-00');
                });
              </script>
              <label for="floatingCPF">CPF</label>
            </div>
            <hr>
            <div class="form-floating">
              <input type="email" class="form-control" id="floatingEmail" name = "userEmail" placeholder="exemplo@unifei.edu.br" required>
              <label for="floatingEmail">Endereço de E-mail</label>
            </div>
            <hr>
            <div class="form-floating">
              <input type="tel" class="form-control" id="floatingTelephone" name = "userTelephone" placeholder="(00) 0 0000-0000">
              <script>
                $( "#floatingTelephone" ).keypress(function() {
                    $(this).mask('(00) 0 0000-0000');
                });
              </script>
              <label for="floatingTel">Telefone de Contato</label>
            </div>
            <hr>
            <div class="form-floating">
              <input type="password" class="form-control" id="floatingPassword" name = "userPassword" placeholder="Senha" required>
              <label for="floatingPassword">Senha</label>
            </div>
            <hr>
            <div class="form-floating">
              <input type="password" class="form-control" id="floatingPasswordRepeat" name = "userPasswordRepeat" placeholder="Senha" required>
              <label for="floatingPassword">Repita a senha</label>
            </div>
            <p style="color:#cc3300" id="errorPassword"></p>
            <hr>
            <button class="w-100 btn btn-lg btn-primary" type="button" onclick="submitForm()">Cadastrar</button>
          </form>
        </main>
        <br>
        <div id="errorText"></div>
      </div>
      <div class = "col-3"></div>
    </div>
  </div>
</body>


