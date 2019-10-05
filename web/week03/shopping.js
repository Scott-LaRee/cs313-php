function addClearPoint() {
	var color = document.getElementById("cp_color").value;
	var num = parseInt(document.getElementById("cp_quantity").value);
	var page = "clearPoint.php";
	
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

function processResponse(response) {
	var text = response;
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