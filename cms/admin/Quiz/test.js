var pos = 0, test, test_status, question, choice, choices, chA, chB, chC, correct = 0;
var t = 11;
var ti = 0;
var questions = [
    [ "Who is Iron Man?", "Steve Rogers", "Tony Stark", "Peter Parker", "Tony Stank", "B" ],
	[ "What is the Space Stone also called?", "Orb", "Aether", "Tesseract", "Sceptre", "C" ],
	[ "Who killed Tony's parents?", "Captain America", "Sam Smith", "Nick Fury", "Winter Soldier", "D" ],
	[ "Who is not an Avenger?", "Batman", "Iron Man", "Hulk", "Thor", "A" ],
	[ "What is the name of Tony's wife?","Pepper","Peter","Carter","Potter","A"],
	[ "Who was the First Avenger?","Black Widdow","Captain America","Captain Marvel","Iron Man","B"]
];
function chngQuestion(){
	t=11;
	timer();
	test = document.getElementById("test");
	if(pos >= questions.length){
		clearTimeout(ti);
		document.getElementById("tim").innerHTML = "Time:0";
		test.innerHTML = "<h2>You got "+correct+" of "+questions.length+" questions correct</h2>";
		document.getElementById("main").innerHTML = "Test Completed";
		if(correct >= questions.length/2){
			test.innerHTML += "<h2>You passs!</h2>";
		}
		else{
			test.innerHTML += "<h2>You fail!</h2>";
		}
		
		test.innerHTML += "<button id='re' onclick='retry()'>Retry</button>";
		pos = 0;
		correct = 0;
		return false;
	}
	question = questions[pos][0];
	chA = questions[pos][1];
	chB = questions[pos][2];
	chC = questions[pos][3];
	chD = questions[pos][4];
	test.innerHTML = "<h2>" + "Question "+(pos+1)+" of "+questions.length + "</h2>";
	test.innerHTML += "<h3>"+question+"</h3>";
	test.innerHTML += "<input type='radio' name='choices' value='A'> "+chA+"<br>";
	test.innerHTML += "<input type='radio' name='choices' value='B'> "+chB+"<br>";
	test.innerHTML += "<input type='radio' name='choices' value='C'> "+chC+"<br>";
	test.innerHTML += "<input type='radio' name='choices' value='D'> "+chD+"<br><br>";
	test.innerHTML += "<button id='bt' onclick='checkAnswer()'>Submit Answer</button>";
}
function checkAnswer(){
	choices = document.getElementsByName("choices");
	for(var i=0; i<choices.length; i++){
		if(choices[i].checked){
			choice = choices[i].value;
		}
	}
	if(choice == questions[pos][5]){
		correct++;
	}
	pos++;
	clearTimeout(ti);
	document.getElementById("tim").innerHTML = "Time:10";
	chngQuestion();
}

function retry(){
	document.getElementById("tim").innerHTML = "Time:10";
	document.getElementById("test").innerHTML = "<h3>Get at least 50% of the questions right to Pass or else you Fail!</h3>"+"<h3>Press GO to start the quiz.</h3>"+"<button id='bt1' onclick='chngQuestion()'>GO</button>";
	document.getElementById("test_status").innerHTML = "<h2 id='test_status'>AVENGERS QUIZ!</h2>";
}

function timer(){
	
	ti = setTimeout('timer()',1000);
	t = t-1;
	if(t<10){
		document.getElementById("tim").innerHTML = "Time:" + t;
	}
	if(t<1){
		document.getElementById("tim").innerHTML = "Time:10";
		t=11;
		pos++;
		clearTimeout(ti);
		chngQuestion();
	}
	
}
