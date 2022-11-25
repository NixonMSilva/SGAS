<head>
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
</head>
<body class>
    <?php
        include "utils/list_institutes.php";
    ?>
    <script>
        $(document).ready(function(){
            $("#institutesTable").DataTable();
        });
    </script>
    <br>
    <div class ="container">
        <div class ="row">
            <div class = "col-3"></div>
            <div class = "col-6">
                <table class="table table-hover table-striped" id="institutesTable">
                    <thead>
                        <tr>
                            <th scope="col">Sigla</th>
                            <th scope="col">Nome</th>
                            <?php
                            if (isAdmin($_SESSION['user_type']))
                            {
                                echo '<th scope="col">Alterar</th>';
                                echo '<th scope="col">Apagar</th>';
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            listInstituteTable($connection);
                        ?>
                    </tbody>
                </table>
            </div>
            <div class = "col-3"></div>
            <br>
            <div class = "row">
                <div class = "col-3"></div>
                <div class = "col-3">
                    <?php
                    if (isAdmin($_SESSION['user_type']))
                    {
                        ?>
                        <button class="btn btn-primary" onclick="location.href='index.php?page=add_institute'">Adicionar Novo Instituto</button>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
