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

function flipUp(st) {
	$(st).children('.back').css('transform', 'rotateY(180deg)');
	$(st).children('.front').css('transform', 'rotateY(0deg)');
}

function flipDown(st) {
	$(st).children('.back').css('transform', 'rotateY(0deg)');
	$(st).children('.front').css('transform', 'rotateY(180deg)');
}