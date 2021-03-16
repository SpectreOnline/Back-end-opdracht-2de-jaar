var addCardButtons = document.querySelectorAll(".addCardBtn");
var addListButton = document.getElementById("addListBtn");
var listContainer = document.querySelectorAll(".card-deck");

startWebpage();

function startWebpage() {
    /*
    addCardButtons.forEach(button => {
        button.onclick = function () {
            //The code here shall create a text input element where the user
            //Can input the name of the card along with a form element
            //Around it with a submit button to send the create command
            //To the database

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