$(document).ready(function () {
  $("#customersDetailsForm").submit(function (e) {
    e.preventDefault();
    $.ajax({
      method: "POST",
      url: "./action.php",
      data: $("#customersDetailsForm").serialize() + "&action=submit",
      success: function (data) {
        if (data == "success") {
          alert("Thankyou! we have received your details", "success");
          $("#customersDetailsForm")[0].reset();
        } else {
          alert(" Something went wrong!! please contact your developer.");
        }
      },
    });
  });
});
