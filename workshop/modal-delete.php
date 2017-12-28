
<!-- Modal -->
<div id="modal_delete" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #337ab7; color: white">
        <button type="button" class="close" data-dismiss="modal" style="color: white">&times;</button>
        <h4 class="modal-title">ລຶບຂໍ້ມູນ</h4>
      </div>
      <div class="modal-body">
        <p>ຕ້ອງການລຶບຂໍ້ມູນນີ້?</p>
        <input type="hidden" name="empno_delete" id="empno_delete">
      </div>
      <div class="modal-footer">
        <button id="submit_delete_btn" name="submit_delete" class="btn btn-danger"><span class="glyphicon glyphicon-trash" data-id="" ></span> ລຶບ</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> ຍົກເລີກ</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="delete_success_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #337ab7; color: white">
        <button type="button" class="close" data-dismiss="modal" style="color: white">&times;</button>
        <h4 class="modal-title">ສຳເລັດ</h4>
      </div>
      <div class="modal-body">
        <p>ລຶບຂໍ້ມູນ ສຳເລັດ!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="window.location.reload()"><span class="glyphicon glyphicon-ok"></span> ປິດ</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="delete_fail_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #c9302c; color: white">
        <button type="button" class="close" data-dismiss="modal" style="color: white">&times;</button>
        <h4 class="modal-title">ຜິດພາດ</h4>
      </div>
      <div class="modal-body">
        <p>ຜິດພາດ! ລອງໃໝ່ພາຍຫຼັງ.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> ປິດ</button>
      </div>
    </div>

  </div>
</div>