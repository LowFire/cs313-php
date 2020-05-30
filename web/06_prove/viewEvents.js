let rows = document.querySelectorAll("#eventRows > tr");
let updateButtons = document.querySelectorAll(".update");
let deleteButtons = document.querySelectorAll(".delete");

function deleteEvent() {

}

function cancel() {

}

function update() {
    this.textContent = "Save";
    deleteButtons[this.dataset.row].textContent = "Cancel"
    deleteButtons[this.dataset.row].addEventListener("click", cancel);
    deleteButtons[this.dataset.row].removeEventListener("click", deleteEvent);
}

for (let i = 0; i < updateButtons.length; i++) {
    updateButtons[i].addEventListener("click", update);
    deleteButtons[i].addEventListener("click", deleteEvent);
}