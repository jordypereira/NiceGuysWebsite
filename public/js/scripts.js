
function showOrders(e) {
    let orderBtn = document.querySelector("#order-btn");
    let orderDeclineBtn = document.querySelector("#order-decline-btn");

    if(orderBtn.classList.contains('invisible')) {
        orderBtn.classList.remove("invisible");
        orderBtn.classList.add("visible");
    }

    if(orderDeclineBtn.classList.contains('invisible')) {
        orderDeclineBtn.classList.remove("invisible");
        orderDeclineBtn.classList.add("visible");
    }
}
function removeOrders(e) {
    let orderBtn = document.querySelector("#order-btn");
    let orderDeclineBtn = document.querySelector("#order-decline-btn");

    if(orderBtn.classList.contains('visible')) {
        orderBtn.classList.remove("visible");
        orderBtn.classList.add("invisible");
    }

    if(orderDeclineBtn.classList.contains('visible')) {
        orderDeclineBtn.classList.remove("visible");
        orderDeclineBtn.classList.add("invisible");
    }
}

function getElPos(e) {
    let animEls = document.querySelectorAll('.animated');

    for (let i = 0, ilen = animEls.length; i < ilen; i++) {
        let elRect = animEls[i].getBoundingClientRect();
        if (elRect.top > 0 && elRect.top < window.innerHeight ||
            elRect.bottom > 0 && elRect.bottom < window.innerHeight) {
            animEls[i].classList.remove('invisible');
            animEls[i].classList.add('slideInLeft');
            setTimeout(function(){ animEls[i].classList.add('visible'); }, 500);

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

    let orderItems = document.querySelectorAll(".order-input");
    if (orderItems.length > 0) {
        for (let i = 0, len = orderItems.length; i < len; i++) {
            orderItems[i].addEventListener('change', showOrders);
        }
    }
    let orderDeclineBtn = document.getElementById("order-decline-btn");
    if (orderDeclineBtn) {
        orderDeclineBtn.addEventListener('click', removeOrders);
    }
}
bindEvents();