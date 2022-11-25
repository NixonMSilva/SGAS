<head>
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
</head>
<body class>
    <?php
        include "utils/list_users.php";
    ?>
    <script>
        $(document).ready(function(){
            $("#usersTable").DataTable();
        });
    </script>
    <br>
    <div class ="container">
        <div class ="row">
            <div class = "col-2"></div>
            <div class = "col-8">
                <table class="table table-hover table-striped" id="usersTable">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">CPF</th>
                            <th scope="col">E-Mail</th>
                            <th scope="col">Telefone</th>
                            <?php
                            if (isAdmin($_SESSION['user_type']))
                            {
                                echo '<th scope="col">Listar Alocações</th>';
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            listUserTable($connection);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
