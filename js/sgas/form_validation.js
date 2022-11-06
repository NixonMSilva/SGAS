var hasErrorMessage = false;
var hasPasswordErrorMessage = false;

const submitForm = () => {

    let form = document.getElementById("signup_form");

    if (!formValidate(form))
    {
        if (!hasErrorMessage)
        {
            let errorMessage = document.getElementById("errorText");
            let messageParagraph = document.createElement("p");
            let messageText = document.createTextNode("Há um ou mais campos com erros! Corrija-os todos antes de submeter!");
            messageParagraph.appendChild(messageText);
            errorMessage.appendChild(messageParagraph);

            hasErrorMessage = true;
        }
        
        return;
    }
    
    form.method = "post";
    form.action = "register_user.php";

    form.submit();
}

const formValidate = (form) => {
    let isFalse = false;

    if (form.elements[0].value === "")
    {
        let nameField = document.getElementById("floatingName");
        nameField.value = "Nome vazio!";
        isFalse = true;
    }

    if (!validateCpf(form.elements[1].value))
    {
        let cpfField = document.getElementById("floatingCpf");
        cpfField.value = "CPF Inválido!";
        isFalse = true;
    }

    if (form.elements[2].value === "")
    {
        let emailField = document.getElementById("floatingEmail");
        emailField.value = "E-mail vazio!";
        isFalse = true;
    }
    
    if (!validatePassword(form.elements[4].value, form.elements[5].value))
    {
        if (!hasPasswordErrorMessage)
        {
            let errorMessage = document.getElementById("errorPassword");
            let messageText = document.createTextNode("Senhas não são iguais!");
            errorMessage.appendChild(messageText);
            hasPasswordErrorMessage = true;
        }
        
        isFalse = true;
    }

    return !(isFalse);
}

const validateCpf = (cpfString) => {

    // String trimming
    let cpfMinusDot = cpfString.replaceAll(".", '');
    let cpfNormalized = cpfMinusDot.replace("-", '');

    // Auxiliary variables
    let sum = 0;
    let remainder = 0;

    // First Digit Verification
    for (let i = 0; i < 9; ++i)
    {
        sum += (cpfNormalized[i] - '0') * (10 - i);
    }

    sum *= 10;
    remainder = (sum % 11) % 10;

    if (!(remainder === (cpfNormalized[9] - '0')))
        return false;

    // Second Digit Verification
    sum = 0;
    remainder = 0;

    for (let i = 0; i < 10; ++i)
    {
        sum += (cpfNormalized[i] - '0') * (11 - i);
    }

    sum *= 10;
    remainder = (sum % 11) % 10;

    if (!(remainder === (cpfNormalized[10] - '0')))
        return false;

    // End of verification
    return true;
}

const validatePassword = (passwordFirst, passwordRepeat) => {
    return (passwordFirst === passwordRepeat);
}