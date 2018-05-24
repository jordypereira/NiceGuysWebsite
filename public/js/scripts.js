
function getElPos(e) {
    let animEls = document.getElementsByClassName('animated');

    for (let i = 0, ilen = animEls.length; i < ilen; i++) {
        let elRect = animEls[i].getBoundingClientRect();
        if (elRect.top > 0 && elRect.top < window.innerHeight ||
            elRect.bottom > 0 && elRect.bottom < window.innerHeight) {
            animEls[i].classList.remove('invisible');
            animEls[i].classList.add('visible');
            animEls[i].classList.add('slideInUp');
        }
    }
}

function scrollToTop(e) {
    window.scrollTo(0,0);
}

function bindEvents() {
    window.addEventListener('load', getElPos);
    window.addEventListener('scroll', getElPos);

    let footerBtn = document.getElementById("footer-button");
    footerBtn.addEventListener('click', scrollToTop);
}
bindEvents();