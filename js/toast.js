function notify(message, type) {
    let backgroundColor;

    switch (type) {
        case 'success':
            backgroundColor = "#4fbe87";
            break;
        case 'error':
            backgroundColor = "#be534f";
            break;
        case 'warning':
            backgroundColor = "#fad35e";
            break;
        default:
            backgroundColor = "#4fbe87";
    }

    Toastify({
        text: message,
        duration: 3000,
        close: true,
        gravity: "top",
        position: "center",
        backgroundColor: backgroundColor,
    }).showToast();
}