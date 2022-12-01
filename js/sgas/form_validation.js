var hasErrorMessage = false;
var hasPasswordErrorMessage = false;

const disallowedFormValueReplacement = [ 'password', 'passwordRepat', 'requestEnd', 'requestHourStart', 'requestHourEnd'];

const submitEditForm = (formId, currentPage, repeatPass, itemId) => {
    let form = document.getElementById(formId);

    if (!validateForm(form, repeatPass))
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
    
    switch (currentPage)
    {
        case 'signup':
            form.action = "update_user.php?id=" + itemId; 
            break;
        case 'institute':
            form.action = "update_institute.php?id=" + itemId;
            break;
        case 'classroom':
            form.action = "update_classroom.php?id=" + itemId; 
            break;
        case 'request':
            form.action = "register_request.php?id=" + itemId;
            break;
    }

    form.submit();
}

const submitForm = (formId, currentPage, repeatPass) => {

    let form = document.getElementById(formId);

    if (!validateForm(form, repeatPass))
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
    
    switch (currentPage)
    {
        case 'signup':
            form.action = "register_user.php";
            break;

        case 'login':
            form.action = "login_user.php";
            break;

        case 'classroom':
            form.action = "register_classroom.php"; 
            break;

        case 'institute':
            form.action = "register_institute.php";
            break;
    }

    form.submit();
}

const validateForm = (form, repeatPass) => {

    let isCorrect = true;

    let status = true;

    let formElements = Array.from(form.elements);

    for (let i = 0; i < formElements.length; ++i)
    {
        let elementType = formElements[i].id;

        if (elementType === "submitButton")
            continue;

        //console.log(elementType);

        switch (elementType)
        {
            case "cpf":
                status = validateCpf(formElements[i].value);
                break;
            case "password":
                if (repeatPass)
                    status = validatePassword(formElements[i].value, formElements[(i + 1)].value);
                break;
            case "requestDate":
                status = validateDate(formElements[i].value + " " + formElements[(i + 1)].value + ":00");
                break;
            case 'requestHourStart':
                status = validateHours(formElements[i].value + ":00", formElements[(i + 1)].value + ":00")
                i++;
                break;
            default:
                status = validateEmpty(formElements[i].value);
                break;
        }

        if (!status)
        {
            let errorString = "Error at: " + elementType;
            console.log(errorString);
            isCorrect = false;
            if (!disallowedFormValueReplacement.includes(elementType))
                formElements[i].value = "Valor inválido!";
        }

    }

    return isCorrect;
}

const validateEmpty = (value) => {
    return !(value === "");
}

const validateDate = (date) => {
    var parsedDate = Date.parse(date);
    console.log("Date: " + parsedDate + " | Now: " + Date.now());
    return parsedDate > Date.now();
}

const validateHours = (hourA, hourB) => {
    return hourB > hourA;
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
    if (passwordFirst === passwordRepeat)
        return true;

    if (!hasPasswordErrorMessage)
    {
        let errorMessage = document.getElementById("errorPassword");
        let messageText = document.createTextNode("Senhas não são iguais!");
        errorMessage.appendChild(messageText);
        hasPasswordErrorMessage = true;
    }

    return false;
}