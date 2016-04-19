var NewsEdit = function () {
    // advance validation
    var handleValidation = function () {
        // for more info visit the official plugin documentation: 
        // http://docs.jquery.com/Plugins/Validation

        var adminForm = $('#admin_form');
        var error3 = $('.alert-danger', adminForm);
        var success3 = $('.alert-success', adminForm);

        //IMPORTANT: update CKEDITOR textarea with actual content before submit
        adminForm.on('submit', function () {
            //  for(var instanceName in CKEDITOR.instances) {
            //CKEDITOR.instances[instanceName].updateElement();
            //}
        });

        adminForm.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            rules: {
            	title: {
                    required: true,
                    maxlength: 255,
                },
                category: {
                    required: true,
                },
                image: {
                	required: true,
                	accept: "image/jpeg, image/jpg, image/png, image/gif"
                },
            },
            messages: {// custom messages for radio buttons and checkboxes
            	title: {
            		required: "Hãy nhập tên tiêu đề."
            	},
            	category: {
                    required: "Hãy chọn danh mục tin.",
                },
            	image: {
            		required: "Hãy chọn ảnh đại diện cho danh mục.",
                	accept: "Hãy chọn định dạng là ảnh."
                }
            },
            errorPlacement: function (error, element) { // render error placement for each input type
                if (element.parent(".input-group").size() > 0) {
                    error.insertAfter(element.parent(".input-group"));
                } else if (element.attr("data-error-container")) {
                    error.appendTo(element.attr("data-error-container"));
                } else if (element.parents('.radio-list').size() > 0) {
                    error.appendTo(element.parents('.radio-list').attr("data-error-container"));
                } else if (element.parents('.radio-inline').size() > 0) {
                    error.appendTo(element.parents('.radio-inline').attr("data-error-container"));
                } else if (element.parents('.checkbox-list').size() > 0) {
                    error.appendTo(element.parents('.checkbox-list').attr("data-error-container"));
                } else if (element.parents('.checkbox-inline').size() > 0) {
                    error.appendTo(element.parents('.checkbox-inline').attr("data-error-container"));
                } else {
                    error.insertAfter(element); // for other inputs, just perform default behavior
                }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit   
                success3.hide();
                error3.show();
                Metronic.scrollTo(error3, -200);
            },
            highlight: function (element) { // hightlight error inputs
                $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
            },
            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },
            success: function (label) {
                label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },
            submitHandler: function (form) {
                success3.show();
                error3.hide();
                form[0].submit(); // submit the form
            }

        });
       $('#remove_image1').click(function(){
        	$(this).remove();
        	$('#image_preview1').remove();
        	$('#input_remove_image1').val(1);
        	
        });
        $('#remove_image2').click(function(){
        	$(this).remove();
        	$('#image_preview2').remove();
        	$('#input_remove_image2').val(1);
        	
        });
        $('#save').click(function(){
        	$('#access_redirect').val('save');
        });
        $('#save_and_close').click(function(){
        	$('#access_redirect').val('save_and_close');
        });
        $('#btn_cancel').click(function(){
        	window.location.href = $(this).attr('data-url');
        });
        //apply validation on select2 dropdown value change, this only needed for chosen dropdown integration.
        $('.select2me', adminForm).change(function () {
            adminForm.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
        });

        // initialize select2 tags
        $("#select2_tags").change(function () {
            adminForm.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input 
        }).select2({
            tags: ["red", "green", "blue", "yellow", "pink"]
        });

        //initialize datepicker
        $('.date-picker').datepicker({
            rtl: Metronic.isRTL(),
            autoclose: true
        });
        $('.date-picker .form-control').change(function () {
            adminForm.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input 
        });
    };

    var handleWysihtml5 = function () {
        if (!jQuery().wysihtml5) {
            return;
        }

        if ($('.wysihtml5').size() > 0) {
            $('.wysihtml5').wysihtml5({
                "stylesheets": ["../../assets/global/plugins/bootstrap-wysihtml5/wysiwyg-color.css"]
            });
        }
    }

    var handleSelect2 = function () {
        $('#course_technology').select2({
            placeholder: "Select a State",
            allowClear: true
        });

    }

    return {
        //main function to initiate the module
        init: function () {

            //handleWysihtml5();            
            handleValidation();
            handleSelect2();

        }

    };

}();
$(document).ready(function () {
    Metronic.init(); // init metronic core components
    NewsEdit.init();
});