var addCardButtons = document.querySelectorAll(".addCardBtn");
var addListButton = document.getElementById("addListBtn");
var listContainer = document.querySelectorAll(".card-deck");
var editListButtons = document.querySelectorAll(".editListBtn");

var statusList = [
    "To do",
    "Working on",
    "On hold",
    "Finished"
];

var orderList = [
    "id",
    "name",
    "duration"
];

startWebpage();

function startWebpage() {
    /*
    generate a form to create a new card
    generate an input field append it to the card list
    also generate a submit button to submit the form
    */

    addCardButtons.forEach(button => {
        button.onclick = function () {
            prepareCardForm(button);
        }
    });

    editListButtons.forEach(button => {
        button.onclick = function () {
            prepareEditListForm(button);
        }
    });

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

function prepareCardForm(button) {

    button.hidden = true;
    var parentId = button.value;

    var newInputForm = document.createElement("form");
    newInputForm.setAttribute("action", "assets/php/createcard.php");
    newInputForm.setAttribute("method", "post");

    var newTextInput = document.createElement("input");
    newTextInput.setAttribute("type", "text");
    newTextInput.setAttribute("name", "card_name");
    newInputForm.append(newTextInput);

    var newNumberInput = document.createElement("input");
    newNumberInput.setAttribute("type", "number");
    newNumberInput.setAttribute("name", "card_duration");
    newInputForm.append(newNumberInput);

    var newSelectList = document.createElement("select");
    newSelectList.setAttribute("name", "card_status");
    statusList.forEach(item => {
        var newOption = document.createElement("option");
        newOption.value = item;
        newOption.innerHTML = item;
        newSelectList.append(newOption);
        newOption = null;
    });
    newInputForm.append(newSelectList);

    var parentIdHolder = document.createElement("input");
    parentIdHolder.setAttribute("name", "card_listid");
    parentIdHolder.setAttribute("type", "hidden");
    parentIdHolder.value = parentId;
    newInputForm.append(parentIdHolder);

    var newSubmitBtn = document.createElement("input");
    newSubmitBtn.setAttribute("type", "submit");
    newSubmitBtn.setAttribute("class", "btn btn-success");
    newSubmitBtn.innerHTML = "Submit card";
    newInputForm.append(newSubmitBtn);

    button.parentElement.append(newInputForm);
}

function prepareEditListForm(button) {
    button.hidden = true;
    console.log(button.id);
    var newInputForm = document.createElement("form");
    newInputForm.setAttribute("action", `assets/php/editlist.php?id=${button.id}`);
    newInputForm.setAttribute("method", "post");

    var newTextInput = document.createElement("input");
    newTextInput.setAttribute("type", "text");
    newTextInput.setAttribute("name", "new_list_name");
    newInputForm.append(newTextInput);

    var newSelectList = document.createElement("select");
    newSelectList.setAttribute("name", "new_list_orderby");
    orderList.forEach(item => {
        var newOption = document.createElement("option");
        newOption.value = item;
        newOption.innerHTML = item;
        newSelectList.append(newOption);
        newOption = null;
    });
    newInputForm.append(newSelectList);

    var newSubmitBtn = document.createElement("input");
    newSubmitBtn.setAttribute("type", "submit");
    newSubmitBtn.setAttribute("class", "btn btn-primary");
    newSubmitBtn.innerHTML = "Update";
    newInputForm.append(newSubmitBtn);

    button.parentElement.append(newInputForm);
}