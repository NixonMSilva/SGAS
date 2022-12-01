<head>
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
</head>
<body class>
    <?php
        include "utils/list_requests.php";
        $isByUser = false;
        $isByRoom = false;
        if (isset($_GET['userId']))
        {
            $isByUser = true;
            $userId = mysqli_real_escape_string($connection, $_GET['userId']);
        }
        else if (isset($_GET['room_code']))
        {
            $isByRoom = true;
            $roomCode = mysqli_real_escape_string($connection, $_GET['room_code']);
        }
    ?>
    <script>
        $(document).ready(function(){
            $("#requestsTable").DataTable({
                order: [[6, 'desc']],
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json',
                },
                stateSave: true,
            });
        });
    </script>
    <br>
    <div class ="container">
        <div class ="row">
            <div class = "col-12">
                <table class="table table-hover table-striped" id="requestsTable">
                    <thead>
                        <tr>
                            <th scope="col">Código da Sala</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Data</th>
                            <th scope="col">Início</th>
                            <th scope="col">Término</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Solicitado Em</th>
                            <?php
                            if (isManager())
                            {
                                echo "<th></th>";
                                echo "<th></th>";
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            if ($isByUser)
                            {
                                listRequestByUserTable($connection, isManager(), $userId);
                            }
                            else if ($isByRoom)
                            {
                                listRequestByRoomTable($connection, isManager(), $roomCode);
                            }
                            else
                            {
                                listRequestTable($connection, isManager());
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class = "col-lg-3">
            
            <?php 
            if ($isByRoom)
            { ?>

                <button class="w-100 btn btn-primary btn-lg" type="button" id="submitButton" onclick="location.href='index.php?page=add_request&room_code=<?php echo $roomCode ?>'">Requisitar Sala</button>

                <?php
            } ?>
                
        </div>
    </div>
</body>
