function typing_text(text_to_type, element_id) {
    let currentText = '';
    let currentIndex = 0;
    const typingTextElement = document.querySelector("#" + element_id);

    function updateText() {
        if (currentIndex < text_to_type.length) {
            currentText += text_to_type[currentIndex];
            typingTextElement.textContent = currentText;
            currentIndex++;
            setTimeout(updateText, 100); // Typing speed (adjust as needed)
        }
    }

    // Start the typing animation
    updateText();
}