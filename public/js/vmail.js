$(document).ready(function () {

    $('#layoutAuthentication').on('click', function () {
        say('Welcome to login page');
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




});
