

/**
 * This method checks the registration form for whether the input is valid or not.
 * If it isn't we'll show the user what is the first thing he'll have to fix.
 *
 * @returns {boolean} whether the form is to submit or not
 */
function validateRegistration() {
    var username = document.forms["registrationform"]["username"].value;
    var email = document.forms["registrationform"]["email"].value;
    var pw1 = document.forms["registrationform"]["pw1"].value;
    var pw2 = document.forms["registrationform"]["pw2"].value;
    var acceptstos = document.forms["registrationform"]["acceptstos"].checked;

    var password_error_msg = {
        errormsg: "",
        flags: validatePasswords(pw1, pw2),
        valid: true
    };

    if(username == "") {
        // username is empty
        if(password_error_msg.errormsg !== "") {
            password_error_msg.errormsg += "<br/>\n"
        }
        password_error_msg.errormsg += "Your username is empty.";
        password_error_msg.valid = false;
    }

    if(!validateEmail(email)) {
        // email is invalid
        if(password_error_msg.errormsg !== "") {
            password_error_msg.errormsg += "<br/>\n"
        }
        password_error_msg.errormsg += "You have to give a valid email.";
        password_error_msg.valid = false;
    }

    if(password_error_msg.flags != ERROR_PASSWORDS_VALID) {
        if(password_error_msg.errormsg !== "") {
            password_error_msg.errormsg += "<br/>\n"
        }
        password_error_msg.errormsg += "The passwords given  don't comply to following requirements:<br/>\n";

        checkFlag(
            password_error_msg,
            ERROR_PASSWORDS_NOT_MATCHING,
            "- The passwords have to match"
        );
        checkFlag(
            password_error_msg,
            ERROR_PASSWORDS_TOO_SHORT,
            "- The password has to be at least 8 characters long"
        );
        checkFlag(
            password_error_msg,
            ERROR_PASSWORDS_NO_LOWERCASE,
            "- The password has to contain at least one lowercase character"
        );
        checkFlag(
            password_error_msg,
            ERROR_PASSWORDS_NO_UPPERCASE,
            "- The password has to contain at least one uppercase character"
        );
        checkFlag(
            password_error_msg,
            ERROR_PASSWORDS_NO_NUMBER,
            "- The password has to contain at least one digit"
        );
        checkFlag(
            password_error_msg,
            ERROR_PASSWORDS_NO_SYMBOL,
            "- The password has to contain at least one special character"
        );

        password_error_msg.valid = false;
    }

    if(!acceptstos) {
        // show that you have to accept tos
        if(password_error_msg.errormsg !== "") {
            password_error_msg.errormsg += "<br/>\n"
        }
        password_error_msg.errormsg += "You have to accept the Terms of service.";
        password_error_msg.valid = false;
    }

    if(!password_error_msg.valid) {
        document.getElementById("register-error").innerHTML = password_error_msg.errormsg;
    }

    return password_error_msg.valid;
}

/**
 * This method checks a given email adress for validity
 *
 * @param {string} email - the adress to check for validity
 * @returns {boolean} whether this adress is valid or not
 */
function validateEmail(email) {
    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}

var ERROR_PASSWORDS_VALID = 0;
var ERROR_PASSWORDS_NOT_MATCHING = 1;
var ERROR_PASSWORDS_TOO_SHORT = 2;
var ERROR_PASSWORDS_NO_LOWERCASE = 4;
var ERROR_PASSWORDS_NO_UPPERCASE = 8;
var ERROR_PASSWORDS_NO_NUMBER = 16;
var ERROR_PASSWORDS_NO_SYMBOL = 32;

/**
 * This method checks the given passwords for their validity and returns a number with the 
 * flags set where the passwords don't comply.
 *
 * @param {string} pw1 - The first password given
 * @param {string} pw2 - The second password given
 * @returns {number} the number with the error flags set
 */
function validatePasswords(pw1, pw2) {
    var error = ERROR_PASSWORDS_VALID;

    if(pw1 !== pw2) {
        error |= ERROR_PASSWORDS_NOT_MATCHING;
    }

    if(pw1.length < 8) {
        error |= ERROR_PASSWORDS_TOO_SHORT;
    }

    if(pw1.toUpperCase() === pw1) {
        error |= ERROR_PASSWORDS_NO_LOWERCASE;
    }

    if(pw1.toLowerCase() === pw1) {
        error |= ERROR_PASSWORDS_NO_UPPERCASE;
    }

    if(!/\d/.test(pw1)){
        error |= ERROR_PASSWORDS_NO_NUMBER;
    }

    if(!/[~`!#$%\^&*+=\-\[\]\\';,/{}|\\":<>\?]/g.test(pw1)) {
        error |= ERROR_PASSWORDS_NO_SYMBOL;
    }

    return error;
}

/**
 * This method cheks the flag of the given object, and (if the flag is set) adds the
 * given message to the errormessage of the object.
 * Thus the given object is expected to have the properties flags of type number (the flags as
 * defined by validatePasswords(pw1, pw2)) and errormsg of type string.
 * The given flags will definitely be deleted afterwards, and if there are more flags set
 * a linebreak after the message will be added.
 *
 * @param {object} errorflagobject - the errorflagobject as defined in the description
 * @param {number} flag - the flag to check
 * @param {string} msg - the message to append if the flag is set
 */
function checkFlag(errorflagobject, flag, msg) {
    // if the flag is set
    if((errorflagobject.flags & flag) > 0) {
        // we add the message
        errorflagobject.errormsg += msg;
        // delete the flag
        errorflagobject.flags &= ~flag;

        // if there are more flags we'll add a linebreak
        if(errorflagobject.flags > 0) {
            errorflagobject.errormsg += "<br/>\n";
        }
    }
}
