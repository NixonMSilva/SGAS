<body class="bg-light">
  <script>

    $(document).ready(function(){
        $('#requestHourStart').timepicker({
          timeFormat: 'HH:mm',
          interval: 30,
          minTime: '06:00',
          maxTime: '21:00',
          defaultTime: '06:00',
          startTime: '06:00',
          dynamic: false,
          dropdown: true,
          scrollbar: true
        });
    });

    $(document).ready(function(){
        $('#requestHourEnd').timepicker({
          timeFormat: 'HH:mm',
          interval: 30,
          minTime: '06:00',
          maxTime: '21:00',
          defaultTime: '06:00',
          startTime: '06:00',
          dynamic: false,
          dropdown: true,
          scrollbar: true
        });
    });

  </script>
  <?php 
    # Listing institutes
    include 'utils/list_institutes.php';
    include 'utils/list_requests.php';

    $isEdit = false;
    $row = null;

    if (isset($_GET['room_code']))
    {
      $roomCode = mysqli_real_escape_string($connection, $_GET['room_code']);
    }  
  ?>
  <div class="container">
    <main>
      <div class="py-5 text-center">
        <?php
        if (!$isEdit) {
          ?><h2>Alocar Sala</h2><?php
        }
        else
        {
          ?><h2>Editar Alocação</h2><?php
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
            <h4 class="mb-3">Informações da Alocação</h4>
            <form method="post" id="request_form" class="needs-validation" novalidate>
              <div class="row g-3">
                
                <div class="col-sm-12">
                  <label for="requestClassroomCode" class="form-label">Código da Sala</label>
                  <input type="text" class="form-control" id="requestClassroomCode" name="requestClassroomCode" placeholder="" value="<?php echo $roomCode; ?>" disabled required>
                  <div class="invalid-feedback">
                    Código de Sala Inválido
                  </div>
                </div>

                <div class="col-sm-4">
                  <label for="requestDate" class="form-label">Data p/ Alocação</label>
                  <input type="text" class="form-control" id="requestDate" name="requestDate" placeholder="Data" value="" required>
                  <script>
                      $( function() {
                        $("#requestDate").datepicker();
                      } );
                  </script>
                  <div class="invalid-feedback">
                    Nome de instituto inválido
                  </div>
                </div>

                <div class="col-sm-4">
                  <label for="requestHourStart" class="form-label">Horário de Início</label>
                  <input type="text" class="form-control" id="requestHourStart" name="requestHourStart" required>
                  <div class="invalid-feedback">
                    Horário maior que início
                  </div>
                </div>

                <div class="col-sm-4">
                  <label for="requestHourEnd" class="form-label">Horário de Término</label>
                  <input type="text" class="form-control" id="requestHourEnd" name="requestHourEnd" required>
                  <div class="invalid-feedback">
                      Horário menor que início
                  </div>
                </div>

              <hr class="my-4">

              <button class="w-100 btn btn-primary btn-lg" type="button" id="submitButton" onclick="submitEditForm('request_form', 'request', false, '<?php echo $_GET['room_code']; ?>')">Enviar Solicitação</button>
            </form>
          </div>
        </div> <?php
      } else { 
        
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

