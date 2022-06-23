const form = document.querySelector("form");
const emailInput = form.querySelector('input[name="email"]');
const confirmedPasswordInput = form.querySelector('input[name="confirmPassword"]');
const dateInput = form.querySelector('input[name="datepremiere"]');

function isEmail(email) {
    return /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email);
}

function arePasswordsSame(password, confirmedPassword) {
    return password === confirmedPassword;
}

function correctDate(date) {
    return /^\d{4}-\d{2}-\d{2}$/.test(date);
}

function markValidation(element, condition) {
    !condition ? element.classList.add('no-valid') : element.classList.remove('no-valid');
}

function validateEmail() {
    setTimeout(function () {
            markValidation(emailInput, isEmail(emailInput.value));
        },
        1000
    );
}

function validatePassword() {
    setTimeout(function () {
            const condition = arePasswordsSame(
                confirmedPasswordInput.previousElementSibling.value,
                confirmedPasswordInput.value
            );
            markValidation(confirmedPasswordInput, condition);
        },
        1000
    );
}

function validateDate() {
    setTimeout(function () {
            markValidation(dateInput, correctDate(dateInput.value));
        },
        1000
    );
}

emailInput.addEventListener('keyup', validateEmail);
dateInput.addEventListener('keyup', validateDate); //Tutaj trzeba będzie naprawić
confirmedPasswordInput.addEventListener('keyup', validatePassword);
