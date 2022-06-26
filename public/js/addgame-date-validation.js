const form = document.querySelector('form');
const dateInput = form.querySelector('input[name="datepremiere"]');

function correctDate(date)
{
    return /^\d{4}-\d{2}-\d{2}$/.test(date);
}

function markValidation(element, condition)
{
    !condition ? element.classList.add('no-valid') : element.classList.remove('no-valid');
}

function validateDate()
{
    setTimeout(function ()
        {
            markValidation(dateInput, correctDate(dateInput.value));
        },
        1000);
}

dateInput.addEventListener('keyup', validateDate);
