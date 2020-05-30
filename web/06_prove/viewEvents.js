let rows = document.querySelectorAll("#eventRows > tr");
let updateButtons = document.querySelectorAll(".update");
let deleteButtons = document.querySelectorAll(".delete");
let rowsHTML = {};

function deleteEvent() {
    console.log("delete function has run");
}

function save() {
    let rowNum = this.dataset.row;
    let eventNameInput = document.querySelector("#eventname" + rowNum);
    let eventDescInput = document.querySelector("#eventdesc" + rowNum);
    let eventDateInput = document.querySelector("#eventdate" + rowNum);
    let eventHrInput = document.querySelector("#eventhr" + rowNum);
    let eventMinInput = document.querySelector("#eventmin" + rowNum);
    let eventAbbrivInput = document.querySelector("#eventabbriv" + rowNum);
    let event_id = this.parentElement.parentElement.dataset.event_id;
    
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            rows[rowNum].innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", 
    "updateEvent.php?eventname=" + eventNameInput.getAttribute("value") +
    "&eventdesc=" + eventDescInput.getAttribute("value") +
    "&eventdate=" + eventDateInput.getAttribute("value") +
    "&eventhr=" + eventHrInput.getAttribute("value") +
    "&eventmin=" + eventMinInput.getAttribute("value") +
    "&eventabbriv=" + eventAbbrivInput.getAttribute("value") +
    "&event_id=" + event_id, true);
    xhttp.send();
}

function cancel() {
    rowNum = this.dataset.row
    rows[rowNum].innerHTML = rowsHTML[rowNum];
    let buttons = document.querySelector("#buttons" + rowNum);
    let length = buttons.childNodes.length;
    for (let i = 0; i < length; i++)
        buttons.removeChild(buttons.childNodes[0]);
    buttons.appendChild(updateButtons[rowNum]);
    buttons.appendChild(deleteButtons[rowNum]);
}

function update() {
    let rowNum = this.dataset.row;
    let row = rows[rowNum];
    row.innerHTML = "<form action=\"\" method=\"GET\">" +
    "<td><input type=\"text\" name=\"eventname\" id=\"eventname" + rowNum + "\"></td>" +
    "<td><input type=\"text\" name=\"eventdesc\" id=\"eventdesc" + rowNum + "\"></td>" +
    "<td><input type=\"date\" name=\"eventdate\" id=\"eventdate" + rowNum + "\"></td>" +
    "<td><input type=\"number\" name=\"eventhr\" id=\"eventhr" + rowNum + "\" min=\"1\" max=\"12\">" +
    "<input type=\"number\" name=\"eventmin\" id=\"eventmin" + rowNum + "\" min=\"0\" max=\"59\">" +
    "<select name=\"eventabbriv" + rowNum + "\"><option value=\"AM\">AM</option><option value=\"PM\">PM</option></select></td>" +
    "<td id=\"buttons" + rowNum + "\"></td>" +
    "</form>";

    let buttonColumn = document.querySelector("#buttons" + rowNum);
    let saveButton = document.createElement("button");
    let cancelButton = document.createElement("button");
    saveButton.setAttribute("class", "btn btn-primary");
    saveButton.setAttribute("data-row", rowNum);
    cancelButton.setAttribute("data-row", rowNum);
    cancelButton.setAttribute("class", "btn btn-danger");
    saveButton.addEventListener("click", save);
    cancelButton.addEventListener("click", cancel);

    let saveText = document.createTextNode("Save");
    let cancelText = document.createTextNode("Cancel");
    saveButton.appendChild(saveText);
    cancelButton.appendChild(cancelText);
    buttonColumn.appendChild(saveButton);
    buttonColumn.appendChild(cancelButton);
}

for (let i = 0; i < updateButtons.length; i++) {
    updateButtons[i].addEventListener("click", update);
    deleteButtons[i].addEventListener("click", deleteEvent);
}

for (let i = 0; i < rows.length; i++) {
    rowsHTML[i] = rows[i].innerHTML;
}