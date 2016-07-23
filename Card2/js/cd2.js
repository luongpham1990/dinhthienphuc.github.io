$(document).ready( function() {
	document.getElementById('bg-music').play();

	//Whenever reload page, shuffle cards
	var arr = [];
	var box = $('.front');
	for(var i = 0; i < box.length; i++) {
		arr.push(box[i].innerHTML);
	}

	var newArr = shuffle(arr);
	for(var i = 0; i < newArr.length; i++) {
		$('.front')[i].innerHTML = newArr[i];
	}
	
	//Create animation rotate card when clicking on them
	var obj;
	var state = "";
	var count = 0;	
	$('.card').click( function() {
		var card = this;
		var address = $(this).children('.front').html();

		if(state != "") {
			flipUp(card);
			if(address == state) {		
				setTimeout( function() {
					$(card).css({'opacity': '0', 'animation': 'zoomIn 0.5s linear'});
					$(obj).css({'opacity': '0', 'animation': 'zoomIn 0.5s linear'});
					state = "";
				}, 1000);
			} else {
				setTimeout( function() {
					flipDown(card);
					flipDown(obj);
					state = "";
				}, 1000);
			}
		} else {
			flipUp(card);
			state = address;
			obj = card;
		}
	});
});