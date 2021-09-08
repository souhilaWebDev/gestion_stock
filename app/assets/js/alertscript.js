window.addEventListener('DOMContentLoaded', () => {
    if ( msgSpan = document.getElementById('msg_alert') ) {
        Toastify({
            text: msgSpan.innerText,
            duration: 4000,
            close: true,
            gravity: "top",
            position: "right",
            backgroundColor: "#4fbe87",
            // backgroundColor: "#c20020",
        }).showToast();
    }
});