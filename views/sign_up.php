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
              <input type="text" class="form-control" id="username" name = "userName" placeholder="Nome Completo" required maxLenght="64">
              <label for="username">Nome Completo</label>
            </div>
            <hr>
            <div class="form-floating">
              <input type="text" minlength="14" maxlength="14" class="form-control" id="cpf" name = "userCPF" placeholder="CPF" required>
              <script>
                $("#cpf").keypress(function() {
                    $(this).mask('000.000.000-00');
                });
              </script>
              <label for="cpf">CPF</label>
            </div>
            <hr>
            <div class="form-floating">
              <input type="email" class="form-control" id="email" name = "userEmail" placeholder="exemplo@unifei.edu.br" required>
              <label for="email">Endereço de E-mail</label>
            </div>
            <hr>
            <div class="form-floating">
              <input type="tel" class="form-control" id="telephone" name = "userTelephone" placeholder="(00) 0 0000-0000">
              <script>
                $( "#telephone" ).keypress(function() {
                    $(this).mask('(00) 0 0000-0000');
                });
              </script>
              <label for="telephone">Telefone de Contato</label>
            </div>
            <hr>
            <div class="form-floating">
              <input type="password" class="form-control" id="password" name = "userPassword" placeholder="Senha" required>
              <label for="password">Senha</label>
            </div>
            <hr>
            <div class="form-floating">
              <input type="password" class="form-control" id="passwordRepeat" name = "userPasswordRepeat" placeholder="Senha" required>
              <label for="passwordRepeat">Repita a senha</label>
            </div>
            <p style="color:#cc3300" id="errorPassword"></p>
            <hr>
            <button class="w-100 btn btn-lg btn-primary" type="button" id="submitButton" onclick="submitForm('signup_form', 'signup', true)">Cadastrar</button>
          </form>
        </main>
        <br>
        <div id="errorText" style="color:#cc3300"></div>
      </div>
      <div class = "col-3"></div>
    </div>
  </div>
  <script src="../js/sgas/form_validation.js"></script>
</body>


