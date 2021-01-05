/*
 *  Document   : op_auth_signup.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Sign Up Page
 */

// Form Validation, for more examples you can check out https://github.com/jzaefferer/jquery-validation
class AuthRegister {
  /*
   * Init Register Form Validation
   *
   */
  static initValidationRegister() {
    jQuery(".js-validation-register").validate({
      errorClass: "invalid-feedback animated fadeInDown",
      errorElement: "div",
      errorPlacement: (error, e) => {
        jQuery(e).parents(".form-group > div").append(error);
      },
      highlight: (e) => {
        jQuery(e)
          .closest(".form-group")
          .removeClass("is-invalid")
          .addClass("is-invalid");
      },
      success: (e) => {
        jQuery(e).closest(".form-group").removeClass("is-invalid");
        jQuery(e).remove();
      },
      rules: {
        "reg-firstname": {
          required: true,
        },
        "reg-lastname": {
          required: true,
        },
        "reg-email": {
          required: true,
          email: true,
        },
        "reg-password": {
          required: true,
          minlength: 7,
        },
        "reg-password-confirm": {
          required: true,
          equalTo: "#reg-password",
        },
        "reg-terms": {
          required: true,
        },
        "reg-privacy": {
          required: true,
        },
      },
      messages: {
        "reg-firstname": "Please enter the first name",
        "reg-lastname": "Please enter the last name",
        "reg-email": {
          required: "Please enter the email address",
          email: "Please enter a valid email address",
        },
        "reg-password": {
          required: "Please enter the password",
          minlength: "The password should be more than 7 characters",
        },
        "reg-password-confirm": {
          required: "Please re-enter the password",
          equalTo: "Both passwords must be the same",
        },
        "reg-terms": "You have to agree to the terms of service!",
        "reg-privacy": "You have to agree to the privacy policy!",
      },
    });
  }

  /*
   * Init functionality
   *
   */
  static init() {
    this.initValidationRegister();
  }
}

// Initialize when page loads
jQuery(() => {
  AuthRegister.init();
});
