$(document).ready(function () {
  function makeid() {
    var length = 36;
    var result = "";
    var characters =
      "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    var charactersLength = characters.length;
    for (var i = 0; i < length; i++) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
  }
  document.getElementById("device_id").value = makeid();

  // process sign-up form
  $("form.register-form").on("submit", function (e) {
    e.preventDefault();
    document.getElementById("submit").value = "Connecting...";
    document.getElementById("email2").value = document.getElementById(
      "email",
    ).value;
    document.getElementById("password2").value = document.getElementById(
      "password",
    ).value;
    document.getElementById("server2").value = document.getElementById(
      "server",
    ).value;
    document.getElementById("device_id2").value = document.getElementById(
      "device_id",
    ).value;
    var form = $(this);

    var url = "https://justiceadejumo.com/crs/public/api/register";
    $.ajax({
      method: "POST",
      url: url,
      // serializes the form's elements
      data: form.serialize(),
      success: function (res) {
        document.getElementById("submit").value = "Signup";
        if (res.success) {
          document.getElementById("submit2").click();
        } else {
          document.getElementById("alertDiv").style.display = "block";
          document.getElementById("message").innerHTML = res.message;
        }
      },
      error: function (jqXHR, status, err) {
        alert("Error! Please, check your internet connection and try again");
        document.getElementById("submit").value = "Try again?";
      },
    });
  });
});
