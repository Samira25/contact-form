  $(document).ready(function() {
    $('#contact_form').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            name: {
                validators: {
                        stringLength: {
                        min: 3,
                        message: 'Please enter atleast 3 characters'
                    },
                        notEmpty: {
                        message: 'Please enter your name'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Please enter your email address'
                    },
                    emailAddress: {
                        message: 'Please enter the valid email address'
                    }
                }
            },
            msg: {
                validators: {
                      stringLength: {
                        min: 10,
                        max: 200,
                        message:'Please enter at least 10 characters and no more than 500'
                    },
                    notEmpty: {
                        message: 'Please enter the message'
                    }
                    }
                }
            }
        });
});