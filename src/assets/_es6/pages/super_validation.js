/* 
 *  Document   : super_validation.js
 *  Description: JS code for Superadmin Page Forms
 */
//todo: form validation of different dashboards.
// Mask Phone Input
$(function () {
  $("#user-phone").inputmask("254999999999"); //static mask
  //Form Values Validation
  $(".js-validation-user").validate({
    rules: {
      "user-firstname": { required: true },
      "user-lastname": { required: true },
      "user-email": {
        required: true,
        email: true,
      },
      "user-phone": {
        required: true,
      },
      "user-password": {
        required: true,
        minlength: 7,
      },
      "user-password-confirm": {
        required: true,
        equalTo: "#user-password",
      },
    },
    messages: {
      "user-firstname": {
        required: "Please enter the first name",
      },
      "user-lastname": {
        required: "Please enter the last name",
      },
      "user-email": {
        required: "Please enter the email address",
        email: "Please enter a valid email address",
      },
      "user-phone": {
        required: "Please enter the phone number",
      },
      "user-password": {
        required: "Please enter the password",
        minlength: "The password should be more than 7 characters",
      },
      "user-password-confirm": {
        required: "Please re-enter the password",
        equalTo: "Both passwords must be the same",
      },
    },
    submitHandler: function (form) {
      form.submit();
    },
  });
});
