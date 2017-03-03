$(document).ready(function(){
	$('#create').click(function(e){
		e.preventDefault();
	});
	$('#dropdown-notif').click(function(event) {
		/* Act on the event */
		event.preventDefault();
		$(this).parents('li').find('.caretup2, .caretup, .dropdown-container').toggleClass('active');
		$('#create').parents('li').find('.caretup2, .caretup, .dropdown-container').removeClass('active');
	});
	$('#create').click(function(event) {
		/* Act on the event */
		event.preventDefault();
		$(this).parents('li').find('.caretup2, .caretup, .dropdown-container').toggleClass('active');
		$('#dropdown-notif').parents('li').find('.caretup2, .caretup, .dropdown-container').removeClass('active');
	});

	$('.caretup2').click(function(){
		$('.dropdown-container, .caretup2, .caretup').removeClass('active');
	})

	// $('.editor').materialnote({
	// 	height: 400,
	// 	minHeight: 100,
	// 	defaultBackColor: '#e0e0e0'
	// });

	// $('.chips').material_chip({
	// 	placeholder: '+ more label',
	// 	secondaryPlaceholder: 'ex: news, story, etc'
	// });

	tinymce.init({
		selector: '#tinymce',
		height: 265,
		plugins: "image"
	});

});















