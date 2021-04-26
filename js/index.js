"use strict"
let shch = {};
shch.includeHTML = function (file, showAjax) {
    let showIt = document.querySelector('.' + showAjax);
    let Json;
    if (file) {
        let nghttp;
        nghttp = new XMLHttpRequest();
        nghttp.onreadystatechange = function () {
            if (this.readyState === 4) {
                if (this.status === 200) {
                    Json = JSON.parse(this.responseText);
                    showIt.innerHTML = Json;
                }
                if (this.status === 404) {
                    showIt.innerHTML = "Page not found.";
                }
            }
        }
        nghttp.open("GET", file, true);
        nghttp.send();
        return true;
    }
};

shch.letGo = function () {
    shch.includeHTML('content/index.php', 'menu')
};

window.addEventListener('load', shch.letGo)