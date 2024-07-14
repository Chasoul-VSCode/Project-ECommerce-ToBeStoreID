document.addEventListener('DOMContentLoaded', function() {
    const messageForm = document.getElementById('messageForm');
    const messageInput = document.getElementById('messageInput');
    const chatBox = document.getElementById('chatBox');
  
    messageForm.addEventListener('submit', function(event) {
      event.preventDefault();
      
      const messageText = messageInput.value.trim();
      
      if (messageText !== '') {
        appendMessage('You', messageText);
        messageInput.value = '';
      }
    });
  
    function appendMessage(sender, message) {
      const messageElement = document.createElement('div');
      messageElement.classList.add('chat-message');
      messageElement.innerHTML = `
        <span class="chat-time">${formatTime(new Date())}</span>
        <span class="chat-text">${message}</span>
      `;
      chatBox.appendChild(messageElement);
  
      // Auto scroll to bottom
      chatBox.scrollTop = chatBox.scrollHeight;
    }
  
    function formatTime(date) {
      const hours = date.getHours();
      const minutes = date.getMinutes();
      return `${hours}:${minutes < 10 ? '0' + minutes : minutes} ${hours >= 12 ? 'PM' : 'AM'}`;
    }
  });
  