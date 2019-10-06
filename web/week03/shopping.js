function addClearPoint() {
	var elem = document.getElementById("cp_color");
	var color = elem.options[elem.selectedIndex].value;
	var num = parseInt(document.getElementById("cp_quantity").value);
	
	var data = {clr: color , qty: num};
	var json = JSON.stringify(data);
	
	var xml = new XMLHttpRequest();
    xml.onreadystatechange = function () {
       if(this.readyState == 4 && this.status == 200) {
		  response = this.responseText;
		  processResponse(response);
	   }
	};
	
	xml.open("POST", "clearPoint.php", true);
	xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xml.send("data=" + json);
	
}

function processResponse(response) {
	document.getElementById("response").innerHTML = response;
}

function addClearPointElite() {
	var color = document.getElementById("cpe_color").value;
	var num = parseInt(document.getElementById("cpe_quantity").value);
	var data = {clr: color, qty: num};
	var json = JSON.stringify(data);
	
	var xml = new XMLHttpRequest();
    xml.onreadystatechange = function () {
       if(this.readyState == 4 && this.status == 200) {
		  response = this.responseText;
		  processResponse(response);
	   }
	};
	
	xml.open("Post", "clearPointElite.php", true);
	xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xml.send("data=" + json);
}

function addErasers() {
	var num = parseInt(document.getElementById("eraser_quantity").value);
	var page = "erasers.php";
	var data = {qty: num};
	var json = JSON.stringify(data);
	
	var xml = new XMLHttpRequest();
    xml.onreadystatechange = function () {
       if(this.readyState == 4 && this.status == 200) {
		  response = this.responseText;
		  processResponse(response);
	   }
	};
	
	xml.open("POST", page, true);
	xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xml.send("data=" + json);
}

function remove() {
	var boxes = document.getElementsByName("items");
	
	for (var iBox = 0; iBox < boxes.length; iBox++) {
		removeItem(boxes[iBox].value);
		removeDiv(boxes[iBox].value);
	}
}

function removeItem(item) {
	var data = {type: item};
	var json = JSON.stringify(data);
	
	var xml = new XMLHttpRequest();
    xml.onreadystatechange = function () {
       if(this.readyState == 4 && this.status == 200) {
		  response = this.responseText;
		  processResponse(response);
	   }
	};
	
	xml.open("POST", "remove.php", true);
	xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xml.send("data=" + json);
}

function removeDiv(item) {
	var div = document.getElementById(item + "Div");
	div.parentNode.removeChild(div);
}