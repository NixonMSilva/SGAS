<body class="bg-light">
  <?php 
    # Listing institutes
    include 'utils/list_institutes.php';
  ?>
  <div class="container">
    <main>
      <div class="py-5 text-center">
        <h2>Adicionar Sala</h2>
      </div>
      <div class="row mb-3">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <h4 class="mb-3">Informações da Sala</h4>
          <form method="post" id="classroom_form" class="needs-validation" novalidate>
            <div class="row g-3">
              
              <div class="col-sm-6">
                <label for="classroomCode" class="form-label">Código da Sala</label>
                <input type="text" class="form-control" id="classroomCode" name="classroomCode" placeholder="Código" value="" required>
                <div class="invalid-feedback">
                  Código da sala inválido
                </div>
              </div>
              
              <div class="col-sm-6">
                <label for="classroomCap" class="form-label">Capacidade</label>
                <input type="text" class="form-control" id="classroomCapacity" name="classroomCapacity" placeholder="50" value="" required>
                <div class="invalid-feedback">
                  Capacidade da sala inválida
                </div>
              </div>

              <div class="col-sm-12">
                <label for="classroomInstitute" class="form-label">Instituto</label>
                <select class="form-select" id="classroomInstituteId" name="classroomInstituteId" required>
                  <option value="">Escolher...</option>
                  <?php
                    listInstituteOptions($connection);
                  ?>
                </select>
                <div class="invalid-feedback">
                  Por favor selecione um instituto válido.
                </div>
              </div>

            <hr class="my-4">

            <button class="w-100 btn btn-primary btn-lg" type="button" id="submitButton" onclick="submitForm('classroom_form', 'classroom', false)">Cadastrar Sala</button>
          </form>
        </div>
      </div>
      
    </main>
    <div class="row mb-3">
      <div class="col-md-3"></div>
      <div class="col-md-6" id="errorText" style="text-align:center; color:#cc3300"></div>
      <div class="col-md-3"></div>
    </div>
  </div>
  <script src="../js/sgas/form_validation.js"></script>
</body>

