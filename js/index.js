"use strict"
let shch = {};
shch.includeHTML = function (file, showAjax) {
    let showIt = document.querySelector('.' + showAjax);
    if (file) {
        let nghttp;
        nghttp = new XMLHttpRequest();
        nghttp.onreadystatechange = function () {
            if (this.readyState === 4) {
                if (this.status === 200) {
                    showIt.innerHTML = this.responseText;
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

shch.AddEvents = function (newProp, event, selectors, cb) {
    this[newProp] = {
        adding: function () {
            const listLinks = document.querySelectorAll(selectors);
            let counts = listLinks.length;
            if (listLinks.length === 1) {
                counts = 1;
                console.log(listLinks[0])
            }
            for (let i = 0; i < counts; i++) {
                if (!this[selectors + i]) this[selectors + i] = listLinks[i];
                this[selectors + i].addEventListener(event, cb);
                console.clear()
                console.log(this)
            }
        }
    }
}

shch.setImg = function (e) {
    e.preventDefault();
    console.log(this.getAttribute('href'))
};

shch.setA = function (e) {
    console.log(this)
};

shch.observeIt = function (selector, callback) {
    const target = document.querySelector(selector);
    const config = {
        childList: true,
        attributes: true,
        subtree: false
    }
    const observer = new MutationObserver(callback);
    observer.observe(target, config);
}

shch.letGo = function () {
    shch.includeHTML('content/index.php', 'menu');
    shch.includeHTML('content/Photo/list.php', 'listImages');
    shch.AE = new shch.AddEvents('.listLinks', 'click', '.listLinks', shch.setImg);
    shch.observeIt('.listImages', shch.AE['.listLinks'].adding.bind(shch.AE));
    shch.AE1 = new shch.AddEvents('.waterMark', 'click', '.waterMark', shch.setA);
    shch.observeIt('.waterMark', shch.AE1['.waterMark'].adding.bind(shch.AE1));
};

window.addEventListener('load', shch.letGo);