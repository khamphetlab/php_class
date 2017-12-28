$(document).on("click", ".browse", function() {
  var file = $(this)
    .parent()
    .parent()
    .parent()
    .find(".file");

  file.trigger("click");
});

$(document).on("change", ".file", function(e) {
  $(this)
    .parent()
    .find(".form-control")
    .val(
      $(this)
        .val()
        .replace(/C:\\fakepath\\/i, "")
    );

  var path = URL.createObjectURL(e.target.files[0]);

  $(".pf_img").prop("hidden", false);
  $(".pf_img").prop("src", path);

  console.log(
    $(this)
      .parent()
      .find(".form-control")
      .val()
  );
  console.log(
    $(this)
      .parent()
      .parent()
      .parent()
      .find(".file")
      .val()
  );
});
