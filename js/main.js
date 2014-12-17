/**
 * Application JS
 */
(function() {


	// var form = new ReptileForm('form');

	// // Do something before validation starts
	// form.on('beforeValidation', function() {
	// 	$('body').append('<p>Before Validation</p>');
	// });

	// // Do something when errors are detected.
	// form.on('validationError', function(e, err) {
	// 	$('body').append('<p>Errors: ' + JSON.stringify(err) + '</p>');
	// });

	// // Do something after validation is successful, but before the form submits.

	// form.on('beforeSubmit', function() {
	// 	$('body').append('<p>Sending Values: ' + JSON.stringify(this.getValues()) + '</p>');
	// });

	// // Do something when the AJAX request has returned in success
	// form.on('xhrSuccess', function(e, data) {
	// 	$('body').append('<p>Received Data: ' + JSON.stringify(data) + '</p>');
	// });

	// // Do something when the AJAX request has returned with an error
	// form.on('xhrError', function(e, xhr, settings, thrownError) {
	// 	$('body').append('<p>Submittion Error</p>');
	// });

		//converts form to array 
	var formToArray = function (form) {
		var formData = [];

		$.each(form.serializeArray(), function (){
			formData.push(this.value);
		});
		return formData;
	};

	//form to object:
	var formToObject = function (form) {
        var formData = {};
        $.each(form.serializeArray(), function() {
            formData[this.name] = this.value;
        });
        return formData;
    }

	//ajax defaults:
	$.ajaxSetup({
		type: 'POST',
		dataType: 'json',
		cache: false
	});

	//ajax form for create user:
	$('.create-user').on('submit', 'form', function(e){
		e.preventDefault();
		var form = $(this);

		$.ajax({
			url: '/api/process_user', 
			data: formToObject(form)
				
			
		}).success(function(returnData){
			if (returnData.ERROR) {
				console.log('error creating account: ' + returnData.ERROR);
				$('.create_user_error_message').addClass('active');
			}else {
				console.log('success')
				location.href = '/dashboard';
				// form.submit();
				
			}
			
		})
	});	

	// Login popup
	$(".button").click(function(e) {
        $("body").append(''); $(".popup").show(); 
        $(".close").click(function(e) { 
            $(".popup, .overlay").hide(); 
        }); 
    }); 

    // Carousel
   $('.carousel').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  autoplay: true,
	  autoplaySpeed: 2000
	});


	// $('.no-notification').click(function(){
	// 	$(this).toggleClass('new-notification');
	// });









})();