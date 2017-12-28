function clear_edit_form() {
  $("#empno_edit").val();
  $("#name_edit").val();
  $("[name=gender_edit][value='M']").prop("checked", true);
  $("#department_edit option[value='NULL']").prop(
    "selected",
    true
  );
  $("#salary_edit option[value=1]").prop("selected", true);
  $("#incentive_edit").val();
}

$(document).on("click", "#edit_btn", function() {
  clear_edit_form()
  var empno = $(this).data("id");
  // $(".modal-body #empno_edit").val(empno);
  $.ajax({
    url: "request.php",
    data: "empno=" + empno,
    type: "GET"
  })
    .done(function(data) {
      var d = JSON.parse(data);
      $("#empno_edit").val(d.empno);
      $("#name_edit").val(d.name);
      $("[name=gender_edit][value='" + d.gender + "']").prop("checked", true);
      $("#department_edit option[value=" + d.deptno + "]").prop(
        "selected",
        true
      );
      $("#salary_edit option[value=" + d.grade + "]").prop("selected", true);
      if (d.incentive == null) {
        $("#incentive_edit")
          .val("")
          .prop("placeholder", "ບໍ່ມີເງິນສະໜັບສະໜູນ");
      } else {
        $("#incentive_edit").val(d.incentive);
      }
    })
    .fail(function() {
      $("#empno_edit").val("Error! try again later.");
    });
});

$(document).on("click", "#submit_edit_form_btn", function() {
  $.post(
        "request.php",
        $("#form_edit").serialize(),
        function(data) {
          if (data == 'success') {
            $("#modal_edit").modal("hide");
            $("#edit_success_modal").modal("show");
          } else {
            $("#modal_edit").modal("hide");
            $("#edit_fail_modal").modal("show");
          }
        }
    )
});

$(document).on("click", "#delete_btn", function() {
  var empno = $(this).data("id");
  $("#empno_delete").val(empno);
  console.log(empno);
});


$(document).on("click", "#submit_delete_btn", function() {
  var empno = $("#empno_delete").val();
  console.log(empno);
  $.ajax({
    url: "request.php",
    data: "empno_delete=" + empno,
    type: "GET"
  }).done(function(data) {
    
    if (data == 'delete_success') {
      $("#modal_delete").modal("hide");
      $("#delete_success_modal").modal("show");
    } else {
      $("#modal_delete").modal("hide");
      $("#delete_fail_modal").modal("show");
    }

  })

});

$(document).on("click", "#add_btn", function() {
  $("#id_error_alert").hide();

});

$(document).on("click", "#submit_add_form_btn", function() {
  $.post("request.php", $("#form_add").serialize(), function(data) {
    if (data == "success") {
      $("#modal_add").modal("hide");
      $("#add_success_modal").modal("show");
    } 
    if (data == 'duplicate_id') {
      $("#id_error_alert").show();  
    } 
    if (data == 'error') {
      $("#modal_add").modal("hide");
      $("#add_fail_modal").modal("show");
    }
  });
});

$("#modal_add").on("hide.bs.modal", function() {
  $("#form_add")[0].reset();
})