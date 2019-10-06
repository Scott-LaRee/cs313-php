function addClearPoint() {
	var elem = document.getElementById("cp_color");
	var color = elem.options[elem.selectedIndex].value;
	var num = parseInt(document.getElementById("cp_quantity").value);
	var page = "clearPoint.php";
	var data = [color,num];
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
	var page = "clearPointElite.php";
	
	var xml = new XMLHttpRequest();
    xml.onreadystatechange = function () {
       if(this.readyState == 4 && this.status == 200) {
		  response = this.responseText;
		  processResponse(response);
	   }
	};
	
	xml.open("GET", page, true);
	xml.send(color,num);
}

function addErasers() {
	var num = parseInt(document.getElementById("eraser_quantity").value);
	var page = "erasers.php";
	
	var xml = new XMLHttpRequest();
    xml.onreadystatechange = function () {
       if(this.readyState == 4 && this.status == 200) {
		  response = this.responseText;
		  processResponse(response);
	   }
	};
	
	xml.open("GET", page, true);
	xml.send(num);
}

function remove(item) {
	
}