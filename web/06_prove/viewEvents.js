let rows = document.querySelectorAll("#eventRows > tr");
let updateButtons = document.querySelectorAll(".update");
let deleteButtons = document.querySelectorAll("delete");

function update() {
    this.textContent = "Save";
    deleteButtons[this.getAttribute("data-row")].textContent = "Cancel";
}

for (let i = 0; i < updateButtons.length; i++) {
    updateButtons[i].addEventListener("onclick", update);
}