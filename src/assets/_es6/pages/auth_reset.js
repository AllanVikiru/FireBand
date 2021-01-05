/*
 *  Document   : op_auth_signup.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Sign Up Page
 */

// Form Validation, for more examples you can check out https://github.com/jzaefferer/jquery-validation
class AuthReset {
  /*
   * Init Password Reset Validation
   *
   */
  static initValidationReset() {
    jQuery(".js-validation-reset").validate({
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
        "reset-email": {
          required: true,
          email: true,
        },
      },
      messages: {
        "log-email": {
          required: "Please enter the email address",
          email: "Please enter a valid email address",
        },
      },
    });
  }

  /*
   * Init functionality
   *
   */
  static init() {
    this.initValidationReset();
  }
}

// Initialize when page loads
jQuery(() => {
  AuthReset.init();
});
