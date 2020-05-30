let rows = document.querySelectorAll("#eventRows > tr");
let updateButtons = document.querySelectorAll(".update");
let deleteButtons = document.querySelectorAll(".delete");
let rowsHTML = {};

function deleteEvent() {
    let del = confirm("Are you sure you want to delete this event?");

    if (del) {
        let rowNum = this.dataset.row;
        let event_id = this.parentElement.parentElement.dataset.event_id;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                rows[rowNum].remove();
            }
        };
        xhttp.open("GET", "deleteEvent.php?event_id=" + event_id, true);
        xhttp.send();
    }
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
            let buttonColumn = document.createElement("td");
            buttonColumn.setAttribute("id", "buttons" + rowNum);
            buttonColumn.appendChild(updateButtons[rowNum]);
            buttonColumn.appendChild(deleteButtons[rowNum]);
            rows[rowNum].appendChild(buttonColumn);
            rowsHTML[rowNum] = rows[rowNum].innerHTML;
        }
    };
    xhttp.open("GET", 
    "updateEvent.php?eventname=" + eventNameInput.value +
    "&eventdesc=" + eventDescInput.value +
    "&eventdate=" + eventDateInput.value +
    "&eventhr=" + eventHrInput.value +
    "&eventmin=" + eventMinInput.value +
    "&eventabbriv=" + eventAbbrivInput.value +
    "&event_id=" + event_id +
    "&rownum=" + rowNum, true);
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
    let eventName = row.childNodes[0].textContent;
    let eventDesc = row.childNodes[1].textContent;
    let eventDate = row.childNodes[2].textContent;
    let eventTime = row.childNodes[3].textContent;
    let eventHr = eventTime[0];
    let eventMin = eventTime.slice(2, 3);
    if (eventMin[0] === "0")
        eventMin[0] = 'd';
    eventMin = parseInt(eventMin);
    row.innerHTML = "<form action=\"\" method=\"GET\">" +
    "<td><input type=\"text\" name=\"eventname\" id=\"eventname" + rowNum + "\" value=\"" + eventName + "\"></td>" +
    "<td><input type=\"text\" name=\"eventdesc\" id=\"eventdesc" + rowNum + "\" value=\"" + eventDesc + "\"></td>" +
    "<td><input type=\"date\" name=\"eventdate\" id=\"eventdate" + rowNum + "\" value=\"" + eventDate + "\"></td>" +
    "<td><input type=\"number\" name=\"eventhr\" id=\"eventhr" + rowNum + "\" value=\"" + eventHr + "\" min=\"1\" max=\"12\">" +
    "<input type=\"number\" name=\"eventmin\" id=\"eventmin" + rowNum + "\" value=\"" + eventMin + "\" min=\"0\" max=\"59\">" +
    "<select name=\"eventabbriv\" id=\"eventabbriv" + rowNum + "\"><option value=\"AM\">AM</option><option value=\"PM\">PM</option></select></td>" +
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