<?php 
require 'assets/pages/header.php';

?>

<p>Here's some content</p>

<div class="card bg-light col-3">
    <div class="card-body bg-rounded p-0">
        <h4 class="card-title">Title</h4>
        <p class="card-text">Text</p>
    </div>
    <ul class="list-group">
        <li class="list-group-item rounded p-2 mt-2" data-toggle="modal" data-target="#exampleModalScrollable">
            <img class="card-img-top" src="holder.js/100x180/" alt="" hidden>
            <p class="card-text">Text</p>
        </li>
    </ul>
    <a href="assets/pages/homePage.php"><button type="button" class="btn btn-light">Add a new card +</button></a>
</div>


<!-- (PHP / JS) function call voor elke keer dat op een kaartje geklikt wordt past de modal zichzelf automatisch
Aan de opgeslagen details van een kaart waarop geklikt wordt
-->
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