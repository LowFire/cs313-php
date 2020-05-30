let rows = document.querySelectorAll("#eventRows > tr");
let updateButtons = document.querySelectorAll(".update");
let deleteButtons = document.querySelectorAll(".delete");
let rowsHTML = {};

function deleteEvent() {

}

function cancel() {

}

function update() {
    let rowNum = this.dataset.row;
    let row = rows[rowNum];
    row.innerHTML = "<form action=\"\" method=\"GET\">" +
    "<td><input type=\"text\" name=\"eventname\" id=\"eventname\"></td>" +
    "<td><input type=\"text\" name=\"eventdesc\" id=\"eventdesc\"></td>" +
    "<td><input type=\"date\" name=\"eventdate\" id=\"eventdate\"></td>" +
    "<td><input type=\"number\" name=\"eventhr\" id=\"eventhr\" min=\"1\" max=\"12\">" +
    "<input type=\"number\" name=\"eventmin\" id=\"eventmin\" min=\"0\" max=\"59\">" +
    "<select><option value=\"AM\">AM</option><option value=\"PM\">PM</option></select></td>" +
    "<td><button type=\"submit\" class=\"btn btn-primary\" id=\"save\">Save</button>" +
    "<button class=\"btn btn-danger\" id=\"cancel\">Cancel</button></td>" +
    "</form>";
}

for (let i = 0; i < updateButtons.length; i++) {
    updateButtons[i].addEventListener("click", update);
    deleteButtons[i].addEventListener("click", deleteEvent);
}

for (let i = 0; i < rows.length; i++) {
    rowsHTML[i] = rows[i].innerHTML;
}