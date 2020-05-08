
let buttonAlert = document.querySelector("button");
buttonAlert.addEventListener("click", function () {
    alert("Clicked!");
});

let buttonColor = document.querySelector("#colorButton");
buttonColor.addEventListener("click", function () {
    let input = document.querySelector("input");
    let firstDiv = document.querySelector("div");
    firstDiv.style.background = input.value;
});