function cookieES() {
    document.cookie = 'lang=ES';
    const cookies = document.cookie.split(';');
    console.log(cookies[0].substring(5))
}

function cookieEN() {
    document.cookie = 'lang=EN';
    console.log(document.cookie)
}