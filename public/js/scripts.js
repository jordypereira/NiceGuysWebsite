
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
    // let orderBtn = document.querySelector("#order-btn");
    // let orderDeclineBtn = document.querySelector("#order-decline-btn");
    //
    // if(orderBtn.classList.contains('visible')) {
    //     orderBtn.classList.remove("visible");
    //     orderBtn.classList.add("invisible");
    // }
    //
    // if(orderDeclineBtn.classList.contains('visible')) {
    //     orderDeclineBtn.classList.remove("visible");
    //     orderDeclineBtn.classList.add("invisible");
    // }
    location.reload();
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

function scrollToY(e) {
    let yHeight = get('y');
    if (yHeight) {
        window.scrollTo(0,yHeight);
    }
}

function setYValue(e) {
    e.preventDefault();

    let yInput = e.path[2][2];
    let yHeight = window.scrollY;
    let form = e.path[2];
    yInput.setAttribute('value', yHeight);
    form.submit();


}

function animateCounter(e) {
    let counterEl = document.getElementById("count-value");
    let range = counterEl.innerHTML;
    let count = 0;
    console.log(range / 133.4);
    let timer = setInterval(function() {
        count++;
        counterEl.innerHTML = count;
        if (count == range) {
            clearInterval(timer);
        }
    }, 1);
}

function get(name){
    if(name=(new RegExp('[?&]'+encodeURIComponent(name)+'=([^&]*)')).exec(location.search))
        return decodeURIComponent(name[1]);
}

function bindEvents() {
    window.addEventListener('scroll', getElPos);
    window.addEventListener('load', getElPos);
    window.addEventListener('load', scrollToY);
    window.addEventListener('load', animateCounter);

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
    let counterBtns = document.querySelectorAll('.counter-btn');
    if (counterBtns.length > 0) {
        for (let b = 0, blen = counterBtns.length; b < blen; b++) {
            counterBtns[b].addEventListener('click', setYValue);
        }
    }
}
bindEvents();