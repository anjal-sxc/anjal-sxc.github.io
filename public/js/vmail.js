$(document).ready(function () {

    $('#layoutAuthentication').on('click', function () {
        say('Welcome to login page');
    });

    // $('#layoutCompose').on('click', function () {
    //     say('Welcome to email compose');
    // });


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



    $('#emailBody').on('focus', function () {
        say('Email Body: ');
        listenEmailBody();
    });

    $('#emailSubject').on('focus', function () {
        say('Email subject ');
        listenEmailSubject();
    });

    $('#emailTo').on('focus', function () {
        say('Email to ');
        listenEmailTo();
    });

    $('#emailSend').on('focus', function () {
        say('Send email');
    });

    $('.btn.btn-danger').on('focus', function () {
       say('Delete email');
    });

    $('.btn.btn-success').on('focus', function () {
        say('Restore email');
    });

    $('#sentEmailLayout').on('click', function () {
       let email = $('.card-body').text();
       say(email);
    });




});
