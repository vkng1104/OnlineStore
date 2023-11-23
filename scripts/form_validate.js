function validateForm(type) {
  var username = document.getElementById("username").value;
  var isValid = false;

  // Regular expression to check for a valid email address
  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  var usernameRegex = /^[a-zA-Z0-9_]+$/;

  if (type === "login") {
    if (emailRegex.test(username)) {
      isValid = true;
    } else {
      if (usernameRegex.test(username)) {
        isValid = true;
      }
    }
  } else if (type === "register") {
    var email = document.getElementById("email").value;
    if (usernameRegex.test(username) && emailRegex.test(email)) {
      isValid = true;
    }
  }

  if (!isValid) {
    alert("Please enter a valid email address or username.");
    return false; // Prevent form submission
  }

  return true; // Allow form submission
}
