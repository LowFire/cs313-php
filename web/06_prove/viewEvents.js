let rows = document.querySelectorAll("#eventRows > tr");
let updateButtons = document.querySelectorAll(".update");
let deleteButtons = document.querySelectorAll(".delete");

function deleteEvent() {

}

function cancel() {

}

function update() {
    this.textContent = "Save";
    let rowNum = this.dataset.row;
    deleteButtons[rowNum].textContent = "Cancel"
    deleteButtons[rowNum].addEventListener("click", cancel);
    deleteButtons[rowNum].removeEventListener("click", deleteEvent);
    let row = document.querySelector("#eventRows tr:nth-of-type(" + (rowNum + 1) + ")");
    row.innerHTML = "<form action=\"\" method=\"GET\">" +
    "<td><input type=\"text\" name=\"eventname\" id=\"eventname\"></td>" +
    "<td><input type=\"text\" name=\"eventdesc\" id=\"eventdesc\"></td>" +
    "<td><input type=\"date\" name=\"eventdate\" id=\"eventdate\"></td>" +
    "<td><input type=\"number\" name=\"eventhr\" id=\"eventhr\" min=\"1\" max=\"12\"></td>" +
    "<td><input type=\"number\" name=\"eventmin\" id=\"eventmin\" min=\"0\" max=\"59\"></td>" +
    "<td><select><option value=\"AM\">AM</option><option value=\"PM\">PM</option></select></td>" +
    "</form>";
}

for (let i = 0; i < updateButtons.length; i++) {
    updateButtons[i].addEventListener("click", update);
    deleteButtons[i].addEventListener("click", deleteEvent);
}