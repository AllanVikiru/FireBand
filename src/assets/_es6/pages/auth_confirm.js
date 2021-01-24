/*
 *  Document   : auth_confirm.js
 *  Description: JS validation for Confirm Activation Code Page
 */

// Form Validation, for more examples you can check out https://github.com/jzaefferer/jquery-validation
class AuthConfirm {
  /*
   * Init Confirm Activation Code Validation
   *
   */
  static initConfirmActivation() {
    jQuery(".js-validate-activation-code").validate({
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
        "act-code": {
          required: true,
          minlength: 12,
        },
        "new-password": {
          required: true,
          minlength: 7,
        },
        "new-password-confirm": {
          required: true,
          equalTo: "#new-password",
        },
      },
      messages: {
        "act-code": {
          required: "Please enter the activation code.",
          minlength: "The activation code should be 12 characters long.",
        },
        "new-password": {
          required: "Please enter the password",
          minlength: "The password should be more than 7 characters",
        },
        "new-password-confirm": {
          required: "Please re-enter the password",
          equalTo: "Both passwords must be the same",
        },
      },
    });
  }

  /*
   * Init functionality
   *
   */
  static init() {
    this.initConfirmActivation();
  }
}

// Initialize when page loads
jQuery(() => {
  AuthConfirm.init();
});
