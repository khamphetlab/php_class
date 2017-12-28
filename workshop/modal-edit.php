<?php
    error_reporting(0);
    include 'connect-db.php';

    $departmentQuery = "SELECT dno, name FROM dept ORDER BY name ASC;";
    $resultDept = mysqli_query($link, $departmentQuery);

    $salaryQuery = "SELECT grade FROM salary ORDER BY grade ASC;";
    $resultSalary = mysqli_query($link, $salaryQuery);

?>

<!-- Modal -->
<div id="modal_edit" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #337ab7; color: white">
        <button type="button" class="close" data-dismiss="modal" style="color: white">&times;</button>
        <h4 class="modal-title">ຟອມແກ້ໄຂຂໍ້ມູນ</h4>
      </div>
      <div class="modal-body">
        <form id="form_edit" method="post" class="form-horizontal">
            <div class="form-group">
                <label class="control-label col-sm-3">ລະຫັດພະນັກງານ:</label>
                <div class="col-sm-9">
                    <input type="text" id="empno_edit" name="empno_edit" class="form-control" placeholder="ລະຫັດພະນັກງານ" readonly="true" required >
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">ຊື່ພະນັກງານ:</label>
                <div class="col-sm-9">
                    <input type="text" id="name_edit" name="name_edit" class="form-control" placeholder="ປ້ອນຊື່ພະນັກງານ" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">ເພດ:</label>
                <div class="col-sm-9">
                    <label class="radio-inline">
                        <input type="radio" id="gender_edit" name="gender_edit" value="M">
                        ຊາຍ
                    </label>
                    <label class="radio-inline">
                        <input type="radio" id="gender_edit" name="gender_edit" value="F">
                        ຍິງ
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">ພະແນກ:</label>
                <div class="col-sm-9">
                    <select id="department_edit" name="department_edit" class="form-control">
                        <option value="NULL">ເລືອກພະແນກ</option>

                        <?php while ($row = mysqli_fetch_assoc($resultDept)) { ?>
                            <option value="<?= $row['dno'] ?>"><?= $row['name'] ?></option>
                        <?php } ?>
                      
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">ຂັ້ນເງິນເດືອນ:</label>
                <div class="col-sm-9">
                    <select id="salary_edit" name="salary_edit" class="form-control">
                        <option value="1">ເລືອກຂັ້ນເງິນເດືອນ</option>

                        <?php while ($row = mysqli_fetch_assoc($resultSalary)) { ?>
                            <option value="<?= $row['grade'] ?>"><?= $row['grade'] ?></option>
                        <?php } ?>

                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">ເງິນອຸດໜຸນ:</label>
                <div class="col-sm-9">
                    <input type="number" id="incentive_edit" name="incentive_edit" class="form-control" placeholder="ປ້ອນເງິນອຸດໜຸນ">
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button id="submit_edit_form_btn" name="submit_edit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved"></span> ແກ້ໄຂຂໍ້ມູນ</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> ຍົກເລີກ</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="edit_success_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #337ab7; color: white">
        <button type="button" class="close" data-dismiss="modal" style="color: white">&times;</button>
        <h4 class="modal-title">ສຳເລັດ</h4>
      </div>
      <div class="modal-body">
        <p>ແກ້ໄຂຂໍ້ມູນ ສຳເລັດ!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="window.location.reload()"><span class="glyphicon glyphicon-ok"></span> ປິດ</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="edit_fail_modal" class="modal fade" role="dialog">
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