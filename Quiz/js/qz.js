var ques0 = {
	content: "Fawkes gave not one feather but two. Who received the wands made from these feathers?",
	A: "Draco and Harry",
	B: "Nevile and Harry",
	C: "Voldemort and Harry",
	Answer: "C"
}

var ques1 = {
	content: "Whose mother gets constantly hidden behind a curtain?",
	A: "Draco Malfoy's mother",
	B: "Sirius Black's mother",
	C: "Ron Weasley's mother",
	Answer: "B"
}

var ques2 = {
	content: "What is the core of Harry's wand?",
	A: "Phoenix feather",
	B: "Dragon heartstring",
	C: "Unicorn hair",
	Answer: "A"
}

var ques3 = {
	content: "What is the spell to make things float?",
	A: "Avada Kedavra",
	B: "Expelliarmus",
	C: "Wingardium Leviosa",
	Answer: "C"
}

var ques4 = {
	content: "Who is the founder of Slytherin?",
	A: "Salazar Slytherin",
	B: "Sue Slytherin",
	C: "Snake Slytherin",
	Answer: "A"
}

var ques5 = {
	content: "Molly Weasley killed who in the last book/movie?",
	A: "Bellatrix Lestrange",
	B: "Voldemort",
	C: "One of the Death Eaters",
	Answer: "A"
}

var listQues = [ ques0, ques1, ques2, ques3, ques4, ques5 ];

var state;
var score = 0;
var count = 1;
var lastScore = 0;
var numberClick = 0;
var MAX_INDEX = 5;

function start() {
	window.location.href = "quiz.html";
}

function resetColor() {
	var reset = document.getElementsByTagName("button");
	for(var i = 0; i < reset.length; i++)
		reset[i].style.color = "black";
}

function changeColor(button) {
	resetColor();
	button.style.color = "#28EB5C";
	opacity: 0.7;
	state = button.id;
}

function mark(st) {
	if(st == listQues[count-1].Answer) score += 1;;
	return score;	
}

function continueAnswer() {
	lastScore = mark(state);
	resetColor();
	numberClick++;
	if(numberClick <= MAX_INDEX) {
		document.getElementById("ques").innerHTML = listQues[count].content;
		document.getElementById("A").innerHTML = listQues[count].A;
		document.getElementById("B").innerHTML = listQues[count].B;
		document.getElementById("C").innerHTML = listQues[count].C;

		if(count == MAX_INDEX)
			document.getElementById("continue").innerHTML = "Result";
		count++;
	}
	else {
		if(lastScore == 6)
			window.location.href = "result.html";
		else window.location.href = "lose.html";
	}
}

function backToStart() {
	window.location.href = "start-page.html";
}