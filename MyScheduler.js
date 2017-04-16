
// function for filling table information
// function fillTable {

	// var table = document.getElementById("myTable");

	// window.alert("var table is" + table);


	// var start_time = 8;
	// var row = null;
	// var cell1 = null;

	// window.alert("var table is" + start_time);

	// for( i = 0 ; i < start_time ; i++ ) {
	// 	window.alert("loop" + i);
	// 	row = table.insertRow(i);
	// 	cell1 = row.insertCell(0);
	// 	cell1.innerHTML = (i+start_time) + ":00 - " + (i+start_time+1) + ":00";
	// }
    // var row = table.insertRow(0);
    // var cell1 = row.insertCell(0);
    // var cell2 = row.insertCell(1);
    // cell1.innerHTML = "NEW CELL1";
    // cell2.innerHTML = "NEW CELL2";
// }

 //    var table = document.getElementById("myTable");
 //    var row = table.insertRow(0);
 //    var cell1 = row.insertCell(0);
 //    var cell2 = row.insertCell(1);
 //    cell1.innerHTML = "NEW CELL1";
 //    cell2.innerHTML = "NEW CELL2";




 //    // for hovering
 //    $(document).ready(function(){
 //    $('[data-toggle="tooltip"]').tooltip();   
	// });




// ------------------------------------------  TABLE TIME  -----------------------------------------

// Define table head (from start time to stop time)  

function drawTableTime() {
	//earliest start time --------------------------------- write code to achive it later
	var earliest_start_time = "8:00";
	//last finish time
	var last_finish_time = "17:30";


	// find start and end hour

		// start hour
		var start_hour = earliest_start_time.substring(0,earliest_start_time.indexOf(":"));
		start_hour = parseInt(start_hour)

		// end hour
		// if end time is between 18:01-18:59 then end hour is 19:00
		var end_hour = last_finish_time.substring(0,last_finish_time.indexOf(":"));
		end_hour = parseInt(end_hour)
		var end_min = parseInt(last_finish_time.slice(last_finish_time.indexOf(":")+1))
		if(end_min > 0) {end_hour = end_hour +1;}

	// get thead parent id 
	var thead_parent = document.getElementById("thead_parent");

	// first col
	var thead_child1 = document.getElementById("thead_child1");
	var th = document.createElement("th");
	th.colSpan = "2";
	// var node = document.createTextNode(start_hour + "-" + (start_hour+1));
	// var node = document.createTextNode(start_hour);
	// th.appendChild(node);
	// thead_parent.replaceChild(th,thead_child1);
	// thead_parent.replaceChild(node,thead_child1);

	// loop for other col
	for (var i = start_hour; i < end_hour; i++) {
	// var i = start_hour+1;

		// var tempchild = document.getElementById("thead_child1");
		var tempEle = document.createElement("th");
		tempEle.colSpan = "2";
		console.log(tempEle);
		// time
		// var tempnode = document.createTextNode(i + "-" + (i+1));
		var tempnode = document.createTextNode(i);
		tempEle.appendChild(tempnode);
		thead_parent.appendChild(tempEle);
		// thead_parent.replaceChild(tempth,thead_child1)
	}

	console.log(i);
	console.log(start_hour);

		// i = i+1;	
		// var tempEle = document.createElement("th");
		// var tempnode = document.createTextNode(i + "-" + (i+1));
		// tempEle.appendChild(tempnode);
		// thead_parent.appendChild(tempEle)

		// for(var i = 0; i<3; i++){
		// 	console.log(i);
		// }

}

console.log(i);


// for grade planner page

// function for show subjects and grades to be selected
function writeSubjectandGrade(){

	//receive subject name
	subj_name = "Ergonomics";
	// recieve grade estimated last time
	current_grade_estimated = "A";


	// get thead parent id 
	var subject_parent = document.getElementById("subject_parent");

	console.log(subject_parent);
	// first col
	var subject_child = document.getElementById("subject_child");

	// write
	var td = document.createElement("td");
	var node = document.createTextNode(subj_name);
	td.appendChild(node);
	subject_parent.appendChild(td);
	console.log(td);
}




// <!DOCTYPE html>
// <html>
// <body>

// <div id="div1">
// <p id="p1">This is a paragraph.</p>
// <p id="p2">This is another paragraph.</p>
// </div>

// <script>
// var para = document.createElement("p");
// var node = document.createTextNode("This is new.");
// para.appendChild(node);
// var element = document.getElementById("div1");
// element.appendChild(para);
// </script>

// </body>
// </html>

// ---------------------------------------------------------------------------------------------------




