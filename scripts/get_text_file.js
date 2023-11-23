document.addEventListener("DOMContentLoaded", function () {
  // Specify the path to your text file
  const filePath = "./more-info.txt";

  const fileContent = document.getElementById("file-content");
  const toggleButton = document.getElementById("toggleButton");

  // Function to toggle content visibility
  function toggleContent() {
    if (fileContent.style.display === "none") {
      fileContent.style.display = "block";
    } else {
      fileContent.style.display = "none";
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
