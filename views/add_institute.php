<body class="bg-light">
  <?php 
    # Listing institutes
    include 'utils/list_institutes.php';

    $isEdit = false;
    $row = null;

    if (isset($_GET['id']))
    {
      $id = $_GET['id'];
      $isEdit = true;
      $row = listSingleInstitute($connection, $id);
    }
        
  ?>
  <div class="container">
    <main>
      <div class="py-5 text-center">
        <?php
        if (!$isEdit) {
          ?><h2>Adicionar Instituto</h2><?php
        }
        else
        {
          ?><h2>Alterar Instituto</h2><?php
        } ?>
      </div>
      <?php
      if (!$isEdit) { ?>
        <!-- CREATE -->
        <!-- CREATE -->
        <!-- CREATE -->
        <div class="row mb-3">
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <h4 class="mb-3">Informações da Instituto</h4>
            <form method="post" id="institute_form" class="needs-validation" novalidate>
              <div class="row g-3">
                
                <div class="col-sm-12">
                  <label for="instituteCode" class="form-label">Sigla do Instituto</label>
                  <input type="text" class="form-control" id="classroomCode" name="instituteCode" placeholder="Sigla" value="" required>
                  <div class="invalid-feedback">
                    Código de instituto inválido
                  </div>
                </div>

                <div class="col-sm-12">
                  <label for="instituteName" class="form-label">Nome do Instituto</label>
                  <input type="text" class="form-control" id="classroomInstituteId" name="instituteName" placeholder="Nome" value="" required>
                  <div class="invalid-feedback">
                    Nome de instituto inválido
                  </div>
                </div>

              <hr class="my-4">

              <button class="w-100 btn btn-primary btn-lg" type="button" id="submitButton" onclick="submitForm('institute_form', 'institute', false)">Cadastrar Instituto</button>
            </form>
          </div>
        </div> <?php
      } else { ?>
        <!-- EDIT -->
        <!-- EDIT -->
        <!-- EDIT -->
        <div class="row mb-3">
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <h4 class="mb-3">Informações da Instituto</h4>
            <form method="post" id="institute_form" class="needs-validation" novalidate>
              <div class="row g-3">
                
                <div class="col-sm-12">
                  <label for="instituteCode" class="form-label">Sigla do Instituto</label>
                  <input type="text" class="form-control" id="classroomCode" name="instituteCode" placeholder="Sigla" value="<?php echo $row['acronym']; ?>" required>
                  <div class="invalid-feedback">
                    Código de instituto inválido
                  </div>
                </div>

                <div class="col-sm-12">
                  <label for="instituteName" class="form-label">Nome do Instituto</label>
                  <input type="text" class="form-control" id="classroomInstituteId" name="instituteName" placeholder="Nome" value="<?php echo $row['name']; ?>" required>
                  <div class="invalid-feedback">
                    Nome de instituto inválido
                  </div>
                </div>

              <hr class="my-4">

              <button class="w-100 btn btn-primary btn-lg" type="button" id="submitButton" onclick="submitEditForm('institute_form', 'institute', false, <?php echo $row['id']; ?>)">Atualizar Instituto</button>
            </form>
          </div>
        </div> <?php
      } ?>
      
      
    </main>
    <div class="row mb-3">
      <div class="col-md-3"></div>
      <div class="col-md-6" id="errorText" style="text-align:center; color:#cc3300"></div>
      <div class="col-md-3"></div>
    </div>
  </div>
  <script src="../js/sgas/form_validation.js"></script>
</body>

