$(document).ready( function() {
	function shuffle(array) {
    var currentIndex = array.length, temporaryValue, randomIndex;

    	// While there remain elements to shuffle...
	    while (0 !== currentIndex) {

	        // Pick a remaining element...
	        randomIndex = Math.floor(Math.random() * currentIndex);
	        currentIndex -= 1;

	        // And swap it with the current element.
	        temporaryValue = array[currentIndex];
	        array[currentIndex] = array[randomIndex];
	        array[randomIndex] = temporaryValue;
	  	}
	return array;
	}

	function newArray() {
		var arr = [];
		var box = $('.front');

		for(var i = 0; i < box.length; i++) {
			arr.push(box[i].innerHTML);
		}
		return arr;		
	}

	$('button').click( function() {
		var newArr = shuffle(newArray());
		for(var i = 0; i < newArr.length; i++) {
			$('.front')[i].innerHTML = newArr[i];
		}
	});

	$('.card').click( function() {
		$(this).children('.back').css('transform', 'rotateY(180deg)');
		$(this).children('.front').css('transform', 'rotateY(0deg)');	
	});

});