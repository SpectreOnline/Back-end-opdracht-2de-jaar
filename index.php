<?php 
require 'assets/pages/header.php';

require("assets/php/functions.php");

$list = PrepareStatementCardLists();
?>

<div class='row ml-2'>
  <h1>To Do list</h1>
  <button class="btn btn-light ml-2 float-right" id="addListBtn">Add a new list +</button>
</div>

<div class="card-deck h-75">

<?php foreach ($list as $listItem) {?>
  <span class="card card-body bg-light col-3 h-100 overflow-auto">
        <div class="row ml-1">
          <h5 class="card-title"><?= $listItem['name']?></h5>
          <button type="button" class="btn btn-primary ml-auto mr-3 editListBtn" id="<?=$listItem['id']?>" data-listname="<?=$listItem['name']?>">Edit</button>
          <a href="assets/php/deletelist.php?id=<?=$listItem['id']?>" class="mr-3">
            <button type="button" class="btn btn-danger">Delete</button>
            </a>
        </div>
      <ul class="list-group">

      <?php $card = PrepareStatementCardsByCardListId($listItem['id'], $listItem['orderby'], $listItem['filter']); 
            foreach($card as $cardItem) { ?>
                <li class="list-group-item rounded p-2 mt-2">
                  <a data-toggle="collapse" href="#collapseForCard-<?=$cardItem['id']?>" style="text-decoration: none;">
                    <h5 class="card-text"><?=$cardItem['name'] ?></h5>
                    <p class="card-text">Duration: <?=$cardItem['duration'] ?></p>
                    <p class="card-text">Status: <?=$cardItem['status'] ?></p>
                  </a>
                </li>
                <span class="collapse row" id="collapseForCard-<?=$cardItem['id']?>">
                  <div class="card card-body rounded p-2">
                  <p class="card-text">You are now editing: <?=$cardItem['name'] ?></p>
                  <form action="assets/php/editcard.php?id=<?=$cardItem['id']?>" method="post">
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
                  <div class="row ml-1">
                  <button type="submit" class="btn btn-primary">Update</button>
                  <a href="assets/php/deletecard.php?id=<?=$cardItem['id']?>" class="ml-auto mr-3">
                  <button type="button" class="btn btn-danger">Delete</button>
                  </a>
                  </div>
                  </form>
                  </div>
                </span>
      <?php } ?>

      <button type="button" class="btn btn-light m-1 addCardBtn" value="<?=$listItem['id']?>">Add a new card +</button>
      </ul>
  </span>

<?php }?>

</div>

<?php 
require 'assets/pages/footer.php';
?>