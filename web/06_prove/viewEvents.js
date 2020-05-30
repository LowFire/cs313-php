let rows = document.querySelectorAll("#eventRows > tr");
let updateButtons = document.querySelectorAll(".update");
let deleteButtons = document.querySelectorAll(".delete");
let rowsHTML = {};

function deleteEvent() {
    console.log("delete function has run");
}

function save() {
    console.log("Save function has run");
}

function cancel() {
    console.log("cancel function has run");
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
    "<select><option value=\"AM\">AM</option><option value=\"PM\">PM</option></select></td>" +
    "<td id=\"buttons" + rowNum + "\"></td>" +
    "</form>";

    let buttonColumn = document.querySelector("#buttons" + rowNum);
    let saveButton = document.createElement("button");
    let cancelButton = document.createElement("button");
    saveButton.setAttribute("class", "btn btn-primary");
    cancelButton.setAttribute("class", "btn btn-danger");
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