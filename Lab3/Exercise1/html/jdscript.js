function message()
{
    document.getElementById("message").style.display = "inline-block";
}
function checkPass()
{
    var password = document.getElementById('password2');
    var confirm = document.getElementById('confirm2');
    var message = document.getElementById('confirm-message2');
    var good_color = "#66cc66";
    var bad_color = "#ff6666";

    if (password.value == confirm.value)
    {
      if(password.value.length >= 8)
      {
        confirm.style.backgroundColor = good_color;
        message.style.color = good_color;
        message.innerHTML = "Passwords Match!";
        document.getElementById("img").src = "images/shaq.gif";
      }
      else
      {
        confirm.style.backgroundColor = bad_color;
        message.style.color = bad_color;
        message.innerHTML = "Password must contain at least 8 characters.";
        document.getElementById("img").src = "images/erroneous.gif";
      }
    }
    else
    {
        confirm.style.backgroundColor = bad_color;
        message.style.color = bad_color;
        message.innerHTML = "Passwords do not match. Please re-enter your password.";
        document.getElementById("img").src = "images/erroneous.gif";
    }
}
