$(document).ready(function () {

    $('#layoutAuthentication').on('click', function () {
        say('Welcome to login page');
    });

    $('#layoutCompose').on('click', function () {
        say('Welcome to email compose');
    });


    $('#inputEmailAddress').on('focus', function () {
        say('Speak out your email address.');
    });

    $('#inputPassword').on('focus', function () {
        say('Speak out your password.');
    });

    $('#loginButton').on('focus', function () {
        say('Login button.');
    });

    $('#signUp').on('focus', function () {
        say('Sign up.');
    });



    $('#composeMessage').on('focus', function () {
        say('Speak out your message. ')
        dictate();
    });




});
