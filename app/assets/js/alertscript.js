window.addEventListener('DOMContentLoaded', () => {
    var msgT = document.getElementById('msg_alert').textContent;
    console.log(msgT);
    // if ( msgT !== null) {
        Toastify({
            text: msgT,
            duration: 4000,
            close:true,
            gravity:"top",
            position: "right",
            backgroundColor: "#4fbe87",
            // backgroundColor: "#c20020",
        }).showToast();
    // }
    });