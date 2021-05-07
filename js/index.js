"use strict"
let shch = {
    initPathToImg: 'content/Photo/',
    imgDB: {}
};
shch.includeHTML = function (file, showAjax) {
    let showIt = document.querySelector('.' + showAjax);
    if (file) {
        if (self.fetch) {
            fetch(file)
                .then((response) => {
                    return response.text();
                })
                .then((text) => {
                    showIt.innerHTML = text;
                });
        } else {
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
    let pathIt = shch.initPathToImg;
    let srcs = pathIt + this.getAttribute('href');
    let imgs = '<img class="imageCanvas" src="' + srcs + '">';
    // shch.imgDB[srcs] ? alert('Img in db') : shch.imgDB[srcs] = imgs;
    document.querySelector('.waterMark').innerHTML = imgs;

    let fn = srcs.split('=')[1].split('.');
    shch.includeHTML(pathIt + fn[0] + '.html', 'paper');
    let showEL = document.querySelector('.flip-card');
    if (shch['setImg'].turn === this) {
        showEL.classList.toggle('show');
    } else {
        showEL.classList.remove('show');
        this.classList.add('redAct');
        shch['setImg'].turn = this;
    }
};

shch.Read = function () {
    this.heightAllText = 0;
    this.allHeight = 0;
    this.stepMove = 0;
    this.countHeight = function () {
        this.Paper = document.querySelector('.flip-card-back');
        let l = document.querySelectorAll('.paper > *');
        this.firstEl = document.querySelector('.paper h2');
        for (let i = 0; i < l.length; i++) {
            this.allHeight += l[i].offsetHeight;
        }
    }
    this.moveNext = function () {
        if (!this.allHeight) this.countHeight();
        if (this.heightAllText > this.allHeight) return;
        if (this.heightAllText < this.Paper.offsetHeight + this.stepMove) alert(this.heightAllText + ' ' + this.Paper.offsetHeight + ' ' + this.stepMove);
        this.stepMove = this.heightAllText - 25;
        this.heightAllText = this.Paper.offsetHeight + this.stepMove;
        this.firstEl.setAttribute('style', 'margin-top:-' + this.heightAllText + 'px');
    }
    this.moveBack = function () {
        if (!this.allHeight) this.countHeight();
        if (this.heightAllText < this.Paper.offsetHeight + this.stepMove) alert('>')
        this.stepMove = this.heightAllText - 25;
        // this.heightAllText = this.Paper.offsetHeight - this.stepMove;
        alert(this.heightAllText + ' ' + this.Paper.offsetHeight + ' ' + this.stepMove);
        // this.firstEl.setAttribute('style', 'margin-top:-' + this.heightAllText + 'px');
        // console.log(this.heightAllText + ' ' + this.allHeight + ' this.heightAllText > this.allHeight')
        if (this.heightAllText < this.allHeight) return;
    }
};

shch.anim = function (elem) {
    let myVar = setInterval(myTimer, 1000);
    shch.timeCount = 0;

    function myTimer() {
        let d = new Date();
        let t = d.toLocaleTimeString();
        document.querySelector(elem).innerHTML = t;
        document.querySelector(elem).setAttribute('style', 'margin-left:' + shch.timeCount + 'px');
        if (shch.timeCount > 100) myStopFunction();
        shch.timeCount++;
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

shch.MakeIt = function () {
    this.one = 'one';
    this.showOne = function (e) {
        alert(this.one)
        alert(e)
    }
}

shch.letGo = function () {
    shch.includeHTML(window.location.origin + '/content/index.php', 'menu');
    shch.includeHTML(window.location.origin + '/content/Photo/list.php', 'listImages');

    shch.AE = new shch.AddEvents('.listLinks', 'click', '.listLinks', shch.setImg);
    shch.observeIt('.listImages', shch.AE['.listLinks'].adding.bind(shch.AE));

    shch.AE1 = new shch.AddEvents('.waterMark', 'click', '.waterMark', shch.setA);
    shch.AE1['.waterMark'].adding();

    shch.showTextNext = new shch.Read();
    shch.AE2 = new shch.AddEvents('.Read', 'click', '.Read', shch.showTextNext.moveNext.bind(shch.showTextNext));
    shch.AE2['.Read'].adding();

    shch.AE2 = new shch.AddEvents('.backRead', 'click', '.backRead', shch.showTextNext.moveBack.bind(shch.showTextNext));
    shch.AE2['.backRead'].adding();
    // shch.anim('.testAnim');

    // shch.so = new shch.MakeIt();
    // shch.so1 = new shch.MakeIt();
    // shch.so1.showOne();
    // shch.AE2 = new shch.AddEvents('.waterMark', 'click', '.waterMark', shch.so.showOne.bind(shch.so));
    // shch.AE2['.waterMark'].adding();
};

window.addEventListener('load', shch.letGo);
