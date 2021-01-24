/*
 *  Document   : db_forms.js
 *  Description: Custom JS code used in Validating Dashboard Forms
 */
class DashboardForms {
  static initConfirmHealthProfile() {
    jQuery(".js-validate-health-profile").validate({
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
        "js-datepicker": {
          required: true,
        },
        "weight": {
          required: true,
        },
        "height": {
          required: true,
        },
      },
      messages: {
        "js-datepicker": {
          required: "Please enter the date of birth.",
        },
        "weight": {
          required: "Please enter the weight in kg",
        },
        "height": {
          required: "Please enter the height in cm",
        },
      },
    });
  }
  static initMyProfile() {
    jQuery(".js-validate-my-profile").validate({
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
        "my-name": {
          required: true,
        },
        "my-email": {
          required: true,
          email:true
        },
      },
      messages: {
        "my-name": {
          required: "Please enter the full name.",
        },
        "my-email": {
          required: "Please enter the email address",
          email: "Please enter a valid email address"
        },
      },
    });
  }
  static initV02Calculator() {
    jQuery(".js-validate-vo2-calculator").validate({
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
        "user-runtime": {
          required: true,
        },
        "user-heartrate": {
          required: true,
        },
      },
      messages: {
        "user-runtime": {
          required: "Please enter the runtime in minutes.",
        },
        "user-heartrate": {
          required: "Please enter the heartrate in bpm.",
        },
      },
    });
  }
  static initUserPWReset() {
    jQuery(".js-validate-reset-user-pw").validate({
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
        "old-password": {
          required: true,
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
        "old-password": {
          required: "Please enter the old password",
        },
        "new-password": {
          required: "Please enter the new password",
          minlength: "The password should be more than 7 characters",
        },
        "new-password-confirm": {
          required: "Please re-enter the password",
          equalTo: "Both passwords must be the same",
        },
      },
    });
  }
  static initUserProfile() {
    jQuery(".js-validate-user-profile").validate({
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
        "user-name": {
          required: true,
        },
        "user-email": {
          required: true,
          email:true
        },
      },
      messages: {
        "user-name": {
          required: "Please enter the full name.",
        },
        "user-email": {
          required: "Please enter the email address",
          email: "Please enter a valid email address"
        },
      },
    });
  }
  static initNewUser() {
    jQuery(".js-validation-new-user").validate({
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
        "new-username": {
          required: true,
        },
        "new-email": {
          required: true,
          email:true
        },
      },
      messages: {
        "new-username": {
          required: "Please enter the full name.",
        },
        "new-email": {
          required: "Please enter the email address",
          email: "Please enter a valid email address"
        },
      },
    });
  }
  static initThingspeakUser() {
    jQuery(".js-validation-thingspeak-user").validate({
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
        "user-channel": {
          required: true,
        },
        "user-key": {
          required: true,
        },
        "user-location": {
          required: true,
        },
      },
      messages: {
        "user-channel": {
          required: "Please enter the full name.",
        },
        "user-key": {
          required: "Please enter the full name.",
        },
        "user-location": {
          required: "Please enter the full name.",
        },
      },
    });
  }
  
  static init() {
    this.initConfirmHealthProfile();
    this.initMyProfile();
    this.initV02Calculator();
    this.initUserPWReset();
    this.initUserProfile();
    this.initNewUser();
    this.initThingspeakUser();
  }
}

// Initialize when page loads
jQuery(() => {
  DashboardForms.init();
});
