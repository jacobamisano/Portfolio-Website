document.getElementById("feedback-form").addEventListener("submit", function(e) {
  e.preventDefault(); // prevent page redirect

  const form = document.getElementById("feedback-form");
  const formData = new FormData(form);

  const xhr = new XMLHttpRequest();
  xhr.open("POST", "send-email.php", true);

  xhr.onload = function () {
    if (xhr.status === 200) {
      alert("Server says: " + xhr.responseText);
    } else {
      alert("Request failed. Status: " + xhr.status);
    }
  };

  xhr.onerror = function () {
    alert("An error occurred during the request.");
  };

  xhr.send(formData);
});
