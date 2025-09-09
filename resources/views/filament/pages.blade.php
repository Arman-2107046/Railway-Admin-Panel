<script>
    window.addEventListener('copy-to-clipboard', event => {
        const text = event.detail.text;
        navigator.clipboard.writeText(text).then(() => {
            console.log("Copied to clipboard:", text);
        }).catch(err => {
            console.error("Failed to copy:", err);
        });
    });
</script>
