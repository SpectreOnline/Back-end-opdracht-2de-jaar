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
      <?php $card = PrepareStatementCardsByCardListId($listItem['id']); 
            foreach($card as $cardItem) { ?>
                <li class="list-group-item rounded p-2 mt-2">
                  <a data-toggle="collapse" href="#collapseForCard-<?=$cardItem['id']?>" style="text-decoration: none;">
                    <img class="card-img-top" src="" alt="" hidden>
                    <h5 class="card-text"><?=$cardItem['name'] ?></h5>
                    <p class="card-text">Duration: <?=$cardItem['duration'] ?></p>
                    <p class="card-text">Status: <?=$cardItem['status'] ?></p>
                  </a>
                </li>
          <span class="collapse row" id="collapseForCard-<?=$cardItem['id']?>">
            <div class="card card-body rounded p-2">
            <p class="card-text">You are now editing: <?=$cardItem['name'] ?></p>
            <form action="assets/php/editcard.php" method="post">
            <div class="form-group">
              <label for="new_card_name">Name:</label>
              <input type="text" class="form-control" name="new_card_name" id="" aria-describedby="helpId" value="<?=$cardItem["name"]?>">
            </div>
            <div class="form-group">
              <label for="new_card_duration">Duration:</label>
              <input type="number" class="form-control" name="new_card_duration" id="" aria-describedby="helpId" value="<?=$cardItem["duration"]?>">
            </div>
            <div class="form-group"> 
              <div class="form-group">
                <label for="new_card_status">Status</label>
                <select class="form-control" name="new_card_status" id="">
                  <option value="To Do">To Do</option>
                  <option value="Working On">Working On</option>
                  <option value="On Hold">On Hold</option>
                  <option value="Finished">Finished</option>
                </select>
              </div>
            </div>
            </form>
            </div>
          </span>
      <?php } ?>
      <button type="button" class="btn btn-light m-1 addCardBtn" value="<?=$listItem['id']?>">Add a new card +</button>
      </ul>
  </span>

<?php }?>

<button class="btn btn-secondary ml-4" id="addListBtn">Add a new list +</button>
</div>

<?php 
require 'assets/pages/footer.php';
?>