$(document).ready(function () {
  // process login form
  $("form.login-form").on("submit", function (e) {
    e.preventDefault();
    document.getElementById("submit").value = "Connecting...";
    document.getElementById("email2").value = document.getElementById(
      "email",
    ).value;
    document.getElementById("password2").value = document.getElementById(
      "password",
    ).value;
    document.getElementById("device_id2").value = document.getElementById(
      "device_id",
    ).value;
    var password = document.getElementById("password").value;
    var device_id = document.getElementById("device_id").value;
    var form = $(this);

    var url = "https://justiceadejumo.com/crs/public/api/login";
    $.ajax({
      method: "POST",
      url: url,
      // serializes the form's elements
      data: form.serialize(),
      success: function (res) {
        document.getElementById("submit").value = "Login";
        if (res.success) {
          var db_password = res.data.password;
          var db_device_id = res.data.device_id;
          if (password != db_password) {
            document.getElementById("alertDiv").style.display = "block";
            document.getElementById("message").innerHTML = "Wrong password";
          } else {
            if (device_id != db_device_id) {
              document.getElementById("alertDiv").style.display = "block";
              document.getElementById("message").innerHTML =
                "Please login with the device you registered with";
            } else {
              document.getElementById("submit2").click();
            }
          }
        } else {
          document.getElementById("alertDiv").style.display = "block";
          document.getElementById("message").innerHTML = res.message;
        }

        // document.getElementById("submit").value = "Signup";
        // if (res.success) {
        //   document.getElementById("submit2").click();
        // } else {
        //   document.getElementById("alertDiv").style.display = "block";
        //   document.getElementById("message").innerHTML = res.message;
        // }
      },
      error: function (jqXHR, status, err) {
        alert("Error! Please, check your internet connection and try again");
        document.getElementById("submit").value = "Try again?";
      },
    });
  });
});
