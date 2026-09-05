/**
 * Copies plain text to the clipboard using the browser's
 * Clipboard API, then briefly changes the button label to
 * "Copied!" before restoring it.
 */
function copyText(button, text) {
    navigator.clipboard.writeText(text).then(() => {
        const original = button.textContent;
        button.textContent = 'Copied!';
        button.disabled = true;

        setTimeout(() => {
            button.textContent = original;
            button.disabled = false;
        }, 1500);
    }).catch(() => {
        alert('Could not copy automatically. Please copy it manually.');
    });
}

/**
 * Used on the homepage result box, where the short URL
 * lives inside a readonly <input> rather than being passed
 * directly as a string.
 */
function copyShortUrl(button) {
    const input = document.getElementById('shortUrlInput');
    copyText(button, input.value);
}
