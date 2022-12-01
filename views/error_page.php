<?php

function printErrorDependency ($returnUrl)
{
    printErrorMessage("Erro! Um ou mais itens dependem deste e portanto não pode ser removido!");
    printReturnButton($returnUrl);
}

function printErrorAccessDenied ($returnUrl)
{
    printErrorMessage("Erro! Permissões insuficientes!");
    printReturnButton($returnUrl);
}

function printErrorRequestConflict ()
{
    printErrorMessage("Erro! Uma sala já está alocada neste horário!");
    printReturnButton("index.php?page=requests");
}

function printErrorRequestExpired ()
{
    printErrorMessage("Erro! Esta requisição de sala já teve seu prazo expirado!");
    printReturnButton("index.php?page=requests");
}

function printErrorMessage ($error)
{
    echo 
    '<body>
        <br>
        <div class="container">
            <div class="alert alert-danger">' . $error . '</div>
    ';
} 

function printReturnButton ($returnUrl)
{
    echo 
    '<div class="col-lg-3">
            <button onclick="location.href=`' . $returnUrl . '`" class="w-100 btn btn-primary btn-lg" type="button">Retornar</button>
        </div></div>
    </body>';
}
