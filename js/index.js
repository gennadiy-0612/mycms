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
                    showIt.innerHTML = "<p>Page not found.</p>";
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
            for (let i = 0; i < counts; i++) {
                if (!this[selectors + i]) this[selectors + i] = listLinks[i];
                this[selectors + i].addEventListener(event, cb);
            }
        }
    }
}

shch.setImg = function (e) {
    e.preventDefault();
    let pathIt = 'content/Photo/';
    let srcs = pathIt + this.getAttribute('href');
    let imgs = '<img class="imageCanvas" src="' + srcs + '">';
    document.querySelector('.waterMark').innerHTML = imgs;

    let fn = srcs.split('=')[1].split('.');
    shch.includeHTML(pathIt + fn[0] + '.html', 'paper');
    let showEL = document.querySelector('.flip-card');
    if (shch['shch.setImg'] === this) {
        showEL.classList.toggle('show');
    } else {
        showEL.classList.remove('show');
        shch['shch.setImg'] = this
    }
};

shch.NextRead = function () {
    this.heightAllText = 0;
    this.allHeight = 0;
    this.countHeight = function () {
        let l = document.querySelectorAll('.paper > *');
        for (let i = 0; i < l.length; i++) {
            this.allHeight += l[i].offsetHeight;
        }
    }
    this.moveNext = function () {
        this.countHeight();
        if (this.heightAllText > this.allHeight) return;
        this.Paper = document.querySelector('.flip-card-back');
        this.heightAllText = this.Paper.offsetHeight + this.heightAllText - 25;
        this.firstEl = document.querySelector('.paper h2');
        this.Paper.classList.toggle('move1');
        this.firstEl.setAttribute('style', 'margin-top:-' + this.heightAllText + 'px');
        console.log(this.heightAllText + ' ' + this.allHeight + ' this.heightAllText > this.allHeight')
    }
    this.moveBack = function () {
        alert('pp')
    }
};
shch.anim = function (elem) {
    var myVar = setInterval(myTimer, 1000);

    function myTimer() {
        var d = new Date();
        var t = d.toLocaleTimeString();
        document.querySelector(elem).innerHTML = t;
    }

    function myStopFunction() {
        clearInterval(myVar);
    }
}
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
    shch.AE1['.waterMark'].adding();

    shch.showTextNext = new shch.NextRead();
    shch.AE2 = new shch.AddEvents('.nextRead', 'click', '.nextRead', shch.showTextNext.moveNext.bind(shch.showTextNext));
    shch.AE2['.nextRead'].adding();

    // shch.AE2 = new shch.AddEvents('.backRead', 'click', '.backRead', shch.showTextNext.moveBack.bind(shch.showTextNext));
    // shch.AE2['.backRead'].adding();
};

window.addEventListener('load', shch.letGo);