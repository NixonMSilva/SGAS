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
            $("#requestsTable").DataTable();
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
                            <th scope="col">Início</th>
                            <th scope="col">Término</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Horário de Solicitação</th>
                            <?php
                            if (isManager($_SESSION['user_type']))
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
                                listRequestByUserTable($connection, isManager($_SESSION['user_type']), $userId);
                            }
                            else if ($isByRoom)
                            {
                                listRequestByRoomTable($connection, isManager($_SESSION['user_type']), $roomCode);
                            }
                            else
                            {
                                listRequestTable($connection, isManager($_SESSION['user_type']));
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class = "col-3"></div>
        </div>
    </div>
</body>
