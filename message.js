document.getElementById('send-message').addEventListener('click', function() {
    var message = document.getElementById('message-input').value;
  
    // Check if message is not empty
    if (message.trim() === "") {
      alert("Please enter a message.");
      return;
    }
  
    // Create the AJAX request
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'messages.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  
    // Send the message to the server
    xhr.send('message=' + encodeURIComponent(message));
  
    // Handle the response
    xhr.onload = function() {
      if (xhr.status === 200) {
        console.log("Message sent successfully!");
        // Optionally update the UI with the new message, etc.
      } else {
        console.error("Error sending message.");
      }
    };
  });
  