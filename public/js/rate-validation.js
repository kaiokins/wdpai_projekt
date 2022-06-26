const form = document.querySelector('form');
const typeRateInput = form.querySelector('input[name="user-rate"]');

function correctRange(typeRate)
{
    return /^[1-9][0-9]?$|^100$/.test(typeRate);
}

function markValidation(element, condition)
{
    !condition ? element.classList.add('no-valid') : element.classList.remove('no-valid');
}

function validateTypeRate()
{
    setTimeout(function ()
        {
            markValidation(typeRateInput, correctRange(typeRateInput.value));
        },
        1000);
}

typeRateInput.addEventListener('keyup', validateTypeRate);