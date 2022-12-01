<body class="text-center">
  <?php

    include 'utils/list_users.php';
    
    $isEdit = false;
    $row = null;

    if (isset($_GET['id']))
    {
      $id = $_GET['id'];
      $isEdit = true;
      $row = listSingleUser($connection, $id);
    }


  ?>
  <div class = "container">
    <div class = "row">
      <div class = "col-3"></div>
      <div class = "col-6">
        <main class="form-signin w-100 m-auto">
          <form method="post" id="signup_form"> <!--action="register_user.php"-->
            <br>
            <?php
            if (!$isEdit) {
              ?><h1 class="h3 mb-3 fw-normal">Cadastro</h1><?php
            }
            else
            {
              ?><h1 class="h3 mb-3 fw-normal">Editar Perfil</h1><?php
            } ?>
            <br>
            <?php
            if (!$isEdit) { ?>
              <!-- REGISTER -->
              <!-- REGISTER -->
              <!-- REGISTER -->
              <div class="form-floating">
                <input type="text" class="form-control" id="username" name = "userName" placeholder="Nome Completo" required maxLenght="128">
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
            <?php
            } else { ?>
              <!-- EDIT -->
              <!-- EDIT -->
              <!-- EDIT -->
              <div class="form-floating">
                <input type="text" class="form-control" id="username" name = "userName" placeholder="Nome Completo" value = "<?php echo $row['name']; ?>" required maxLenght="128">
                <label for="username">Nome Completo</label>
              </div>
              <hr>
              <div class="form-floating">
                <input type="text" minlength="14" maxlength="14" class="form-control" id="cpf" name = "userCPF" value = "<?php echo $row['cpf']; ?>" placeholder="CPF" disabled required>
                <script>
                  $("#cpf").keypress(function() {
                      $(this).mask('000.000.000-00');
                  });
                </script>
                <label for="cpf">CPF</label>
              </div>
              <hr>
              <div class="form-floating">
                <input type="email" class="form-control" id="email" name = "userEmail" value = "<?php echo $row['email']; ?>" placeholder="exemplo@unifei.edu.br" disabled required>
                <label for="email">Endereço de E-mail</label>
              </div>
              <hr>
              <div class="form-floating">
                <input type="tel" class="form-control" id="telephone" name = "userTelephone" value = "<?php echo $row['telephone']; ?>" placeholder="(00) 0 0000-0000">
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
              <button class="w-100 btn btn-lg btn-primary" type="button" id="submitButton" onclick="submitEditForm('signup_form', 'signup', true, <?php echo $id; ?>)">Salvar Perfil</button>
            <?php
            } ?>
            
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


