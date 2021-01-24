/*
 *  Document   : auth_login.js
 *  Description: JS validation for Login Page
 */

// Form Validation, for more examples you can check out https://github.com/jzaefferer/jquery-validation
class AuthLogin {
  /*
   * Init Login Form Validation
   *
   */
  static initValidationLogin() {
    jQuery(".js-validation-login").validate({
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
        "log-email": {
          required: true,
          email: true,
        },
        "log-password": {
          required: true,
          minlength: 7,
        },
      },
      messages: {
        "log-email": {
          required: "Please enter the email address",
          email: "Please enter a valid email address",
        },
        "log-password": {
          required: "Please enter the password",
          minlength: "The password should be more than 7 characters",
        },
      },
    });
  }

  /*
   * Init functionality
   *
   */
  static init() {
    this.initValidationLogin();
  }
}

// Initialize when page loads
jQuery(() => {
  AuthLogin.init();
});
