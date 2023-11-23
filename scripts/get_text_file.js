document.addEventListener("DOMContentLoaded", function () {
  // Specify the path to your text file
  const filePath = "./more-info.txt";

  const fileContent = document.getElementById("file-content");
  const toggleButton = document.getElementById("toggleButton");
  const buttonInfo = document.getElementById("buttonInfo");

  // Function to toggle content visibility
  function toggleContent() {
    if (fileContent.style.display === "none") {
      fileContent.style.display = "block";
      buttonInfo.textContent = "Click here to close";
    } else {
      fileContent.style.display = "none";
      buttonInfo.textContent = "Click here to view more information about us";
    }
  }

  // Add click event listener to the button
  toggleButton.addEventListener("click", function () {
    // Make an AJAX request
    const xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        // Display the content on the screen
        fileContent.textContent = xhr.responseText;
        toggleContent();
      }
    };

    xhr.open("GET", filePath, true);
    xhr.send();
  });
});
