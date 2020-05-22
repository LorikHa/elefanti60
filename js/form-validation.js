// Wait for the DOM to be ready
$(function() {


  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='contactForm']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      name: {
         minlength: 2,
         required: true
      },
      lastName: {
         minlength: 2,
         required: true
      },
      email: {
        required: true,
        // Specify that email should be validated
        // by the built-in "email" rule
        email: true
      },
      birthDate: {
        date: true,
        required: true
      },
      rateUs: {
        required: true
      }
    },
    // Specify validation error messages
    messages: {
      name: {
           required: "Please enter your name",
           minlength: "At least 2 characters are necessary"
       },
       lastName: {
             required: "Please enter your last name",
             minlength: "At least 2 characters are necessary"
      },
      email: {
             required: "Please enter your email",
             email: "Please enter a valid email address"
      },
      
      birthDate: {
        required: "Please provide a birth date"
      },
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});