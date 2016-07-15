var num1 = "";
var num2 = "";
var str;
var symbol = "";
var result;
var count = 0;

var text = document.getElementById("in");

function reset() {
	text.value = "";
	num1 = "";
	num2 = "";
	symbol = "";
	count = 0;
	result = "";
	str = "";

}

function press(button) {
	if(button.id == 'ac') {
		reset();
		return;
	}

	if(button.id == 'radic') {
		symbol = button.value;
	}
	
	text.value += button.value;
	
	if(symbol == "")
		str = text.value;
	else str = text.value.slice(1);
	
}

function pressEqual() {
	splitNumberAndSymbol();

	num1 = Number(num1);
	num2 = Number(num2);

	calculate(num1, num2, symbol);

	text.value = " = " + result;
}

function splitNumberAndSymbol() {
	for(var i = 0; i < str.length; i++) {
		switch(str.charAt(i)) {
			case "+":
				assignSymbol("+");
				break;
			case "-":
				assignSymbol("-");
				break;
			case "*":
				assignSymbol("*");
				break;
			case "/":
				assignSymbol("/");
				break;
			case "%":
				assignSymbol("%");
				break;
			case "!":
				assignSymbol("!");
				break;
			case "^":
				assignSymbol("^");
				break;
			default:
				assignNumber(str.charAt(i));
				break;
		}
	}
}

function assignNumber(ch) {
	if(count == 0) num1 = num1.concat(ch);
	else num2 = num2.concat(ch);
}

function assignSymbol(ch) {
	symbol = ch;
	count++;
}

function calculate(n1, n2, s) {
	switch(s) {
		case "+":
			result = n1 + n2;
			break;
		case "-":
			result = n1 - n2;
			break;
		case "*":
			result = n1 * n2;
			break;
		case "/":
			result = n1 / n2;
			break;
		case "%":
			result = n1 % n2;
			break;
		case "!":
			result = factorial(n1);
			break;
		case "^":
			result = Math.pow(n1, 2);
			break;
		default:
			result = Math.sqrt(n1);
			break;
	}
}

function factorial(x) {
	var fact = 1;
	for(var i = 2; i <= x; i++)
		fact *= i;
	return fact;
}