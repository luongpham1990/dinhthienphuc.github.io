$(document).ready( function() {
	$('#click').click( function() {
		window.location.href = "quiz.html";
	});

	$('button').click( function changeTheme() {
		$('h1, button').addClass('changeFont');
		$('button').addClass('changeTheme');
	});
});