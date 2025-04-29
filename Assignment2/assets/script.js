const signUp = document.getElementById('sign-up'),
    signIn = document.getElementById('sign-in'),
    signInForgot = document.getElementById('sign-in-forgot'),
    forgot = document.getElementById('forgot'),
    loginIn = document.getElementById('login-in'),
    loginUp = document.getElementById('login-up'),
    loginForgot = document.getElementById('login-fr');

signUp.addEventListener('click', () => {
    loginIn.classList.add('none');
    loginUp.classList.remove('none');
    loginForgot.classList.add('none');
});

signIn.addEventListener('click', () => {
    loginIn.classList.remove('none');
    loginUp.classList.add('none');
    loginForgot.classList.add('none');
});

signInForgot.addEventListener('click', () => {
    loginIn.classList.remove('none');
    loginUp.classList.add('none');
    loginForgot.classList.add('none');
});

forgot.addEventListener('click', () => {
    loginIn.classList.add('none');
    loginUp.classList.add('none');
    loginForgot.classList.remove('none');
});


document.addEventListener("DOMContentLoaded", function ()
{
    const inputs = {
        usernameLogIn: document.getElementById("username-login"),
        passwordLogIn: document.getElementById("password-login"),
        usernameSignUp: document.getElementById("username-signup"),
        passwordSignUp: document.getElementById("password-signup"),
        emailSignUp: document.getElementById("email-signup"),
        emailForgot: document.getElementById("email-forgot"),
    };

    const errors = {
        usernameLogIn: document.getElementById("username-login-error"),
        passwordLogIn: document.getElementById("password-login-error"),
        usernameSignUp: document.getElementById("username-signup-error"),
        passwordSignUp: document.getElementById("password-signup-error"),
        emailSignUp: document.getElementById("email-signup-error"),
        emailForgot: document.getElementById("email-forgot-error"),
    };

    function validateEmail(input, error)
    {
        const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        input.addEventListener("input", function ()
        {
            if (input.value.trim() === "")
            {
                input.classList.remove("invalid");
                error.style.display = "none";
            }
            else if (!emailPattern.test(input.value))
            {
                input.classList.add("invalid");
                error.style.display = "flex";
            }
            else
            {
                input.classList.remove("invalid");
                error.style.display = "none";
            }
        });
    }

    function validateUsername(input, error)
    {
        input.addEventListener("input", function ()
        {
            if (input.value.trim() === "" || input.value.length < 4)
            {
                input.classList.add("invalid");
                error.style.display = "flex";
            }
            else
            {
                input.classList.remove("invalid");
                error.style.display = "none";
            }
        });
    }

    function validatePassword(input, error)
    {
        input.addEventListener("input", function ()
        {
            if (input.value.trim() === "" || input.value.length < 8)
            {
                input.classList.add("invalid");
                error.style.display = "flex";
            }
            else
            {
                input.classList.remove("invalid");
                error.style.display = "none";
            }
        });
    }

    validateUsername(inputs.usernameLogIn, errors.usernameLogIn);
    validatePassword(inputs.passwordLogIn, errors.passwordLogIn);
    validateUsername(inputs.usernameSignUp, errors.usernameSignUp);
    validatePassword(inputs.passwordSignUp, errors.passwordSignUp);
    validateEmail(inputs.emailSignUp, errors.emailSignUp);
    validateEmail(inputs.emailForgot, errors.emailForgot);
});