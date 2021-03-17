var addCardButtons = document.querySelectorAll(".addCardBtn");
var addListButton = document.getElementById("addListBtn");
var listContainer = document.querySelectorAll(".card-deck");

startWebpage();

function startWebpage() {
    /*
    addCardButtons.forEach(button => {
        button.onclick = function () {
            generate a form to create a new card
            generate an input field append it to the card list
            also generate a submit button to submit the form
        }
    });
    */
    addListButton.onclick = function () {
        prepareListForm();
    }
}

function prepareListForm() {
    addListButton.hidden = true;

    var newInputForm = document.createElement("form");
    newInputForm.setAttribute("action", "assets/php/createlist.php");
    newInputForm.setAttribute("method", "post");

    var newTextInput = document.createElement("input");
    newTextInput.setAttribute("type", "text");
    newTextInput.setAttribute("name", "list_name");
    newInputForm.append(newTextInput);

    var newSubmitBtn = document.createElement("input");
    newSubmitBtn.setAttribute("type", "submit");
    newSubmitBtn.setAttribute("class", "btn btn-success");
    newSubmitBtn.innerHTML = "Add new list";
    newInputForm.append(newSubmitBtn);

    listContainer.forEach(element => {
        element.append(newInputForm);
    });


}