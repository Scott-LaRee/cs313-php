function buttonClicked() {
	alert("Clicked!");
}

function changeColor() {
	var color = document.getElementById("newColor").value;
	
	document.getElementById('firstDiv').style.color = color;
}

function changeColorjQuery() {
	var div2 = $("#secondDiv");
	var textBox = $("#jQueryColor");
	
	var color = textBox.text();
	
	div2.css("color", color);
	
}

function toggleOpacity() {
	div3 = document.getElementById("thirdDiv");
	if (div3.style.opacity == 1)
		vanishText();
	else 
		appearText();
}

function vanishText() {
	var div3 = document.getElementById("thirdDiv");
	var opacity = div3.style.opacity;
	var time = setInterval(frame, 5);
	
	function frame() {
        if (opacity == 0){
			clearInterval(time);
		} else {	
            opacity -= .1;
            div3.style.opacity = opacity;	
        }			
	}
	var button = document.getElementById("toggle").innerHTML = "Appear!";
}

function appearText() {
	var div3 = document.getElementById("thirdDiv");
	var opacity = div3.style.opacity;
	var time = setInterval(frame, 5);
	
	function frame() {
        if (opacity == 1){
			clearInterval(time);
		} else {	
            opacity += .1;
            div3.style.opacity = opacity;			
	    }
	}
	var button = document.getElementById("toggle").innerHTML = "Vanish!";
}