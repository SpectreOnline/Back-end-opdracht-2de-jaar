<?php 
require 'assets/pages/header.php';

require("assets/php/functions.php");

$list = PrepareStatementCardLists();
?>

<h1>To Do list</h1>

<div class="card-deck">
<?php foreach ($list as $listItem) {?>
  <span class="card bg-light col-3 overflow-auto">
      <div class="card-body bg-rounded p-1">
          <h5 class="card-title"><?= $listItem['name']?></h5>
      </div>
      <ul class="list-group">
      <!--(PHP) foreach loop which shall loop through the cards associated with the cardlist in the database -->
          <li class="list-group-item rounded p-2 mt-2" data-toggle="modal" data-target="#exampleModalScrollable">
              <img class="card-img-top" src="" alt="" hidden>
              <p class="card-text">Text</p>
          </li>

        <!--(JS) write function to generate a text input field
        When the add a new card button was pressed-->
          
      <!--End of nested loop -->
      <button type="button" class="btn btn-light m-1 addCardBtn" value="<?=$listItem['id']?>">Add a new card +</button>
      </ul>
  </span>

<?php }?>

<button class="btn btn-secondary ml-4" id="addListBtn">Add a new list +</button>
</div>

<!-- (PHP / JS) function call for when a card has been clicked to show all the detailed information of the specified
card in the database -->
<div class="modal" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenteredLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<?php 
require 'assets/pages/footer.php';
?>