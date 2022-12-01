<head>
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
</head>
<body class>
    <?php
        include "utils/list_classrooms.php";
    ?>
    <script>
        $(document).ready(function(){
            $("#classroomsTable").DataTable({
                order: [[1, 'asc']],
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
            <div class = "col-3"></div>
            <div class = "col-6">
                <table class="table table-hover table-striped" id="classroomsTable">
                    <thead>
                        <tr>
                            <th scope="col">Código</th>
                            <th scope="col">Instituto</th>
                            <th scope="col">Capacidade</th>
                            <th scope="col">Alocar</th>
                            <?php
                            if (isManager())
                            {
                                echo '<th scope="col">Alterar</th>';
                                echo '<th scope="col">Apagar</th>';
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            
                            listClassroomTable($connection, isManager());    
                            
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
                    if (isManager())
                    {
                        ?>
                        <button class="btn btn-primary" onclick="location.href='index.php?page=add_classroom'">Adicionar Novas Salas</button>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
