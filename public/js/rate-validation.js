const form = document.querySelector('form');
const typeRateInput = document.querySelectorAll('.rate-error');

function correctRange(typeRate)
{
    return /^[1-9][0-9]?$|^100$/.test(typeRate);
}

function markValidation(element, condition)
{
    !condition ? element.classList.add('no-valid') : element.classList.remove('no-valid');
}

function validateTypeRate(element)
{
    setTimeout(function ()
        {
            markValidation(element, correctRange(element.value));
        },
        1000);
}
typeRateInput.forEach((elem) => {
    elem.addEventListener('keyup', function () {
        validateTypeRate(elem);
    });
})