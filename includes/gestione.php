<?php
include ('user_prenotation.php')
?>

<br><br>
<div class="row">
    <div class="col-lg-12">
      <h4>Gestione Prenotazioni</h4>
      <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal">
        Aggiungi Prenotazioni
      </button>

      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
      <br><br>
    </div>
</div>
