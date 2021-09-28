const hideScrollNav = document.querySelector('.default')
const openScrollNav = document.querySelector('.scroll')

window.onscroll = () => {
    if (window.pageYOffset > 0) {
        hideScrollNav.classList.add('none')
        openScrollNav.classList.add('open')
    } else {
        hideScrollNav.classList.remove('none')
        openScrollNav.classList.remove('open')
    }
}

// open subnav
const openSubNav = document.querySelector('.onHover');
const SubNav = document.querySelector('.subnav__hover');
const body = document.querySelector('body');
const scrollSubNav = document.querySelector('.scroll-hover');

function showSubNav() {
    SubNav.classList.add('open')
}

function hideSubNav() {
    SubNav.classList.remove('open')
}


openSubNav.onmouseover = showSubNav;
body.addEventListener('click', hideSubNav);
scrollSubNav.onmouseover = showSubNav;
SubNav.addEventListener('click', function(e) {
    e.stopPropagation();
})



// show động cơ điện

const CarsContainer = document.querySelector('.subnav__hover-content');
const ElectricContainer = document.querySelector('.subnav__electric-col');
const ElectricButton = document.querySelector('.electric-button');
const GasButton = document.querySelector('.gas');

function openElectric() {
    CarsContainer.classList.add('none')
    ElectricContainer.classList.add('open')

}

function Switch() {
    ElectricContainer.classList.remove('open')
    CarsContainer.classList.remove('none')
    if (ElectricButton.classList.contains('active')) {
        ElectricButton.classList.remove('active')
    }
}

ElectricButton.addEventListener('click', openElectric);
GasButton.addEventListener('click', Switch);



// show xe máy điện
let motoElectric = document.querySelector('.subnav__electric-hover')
let motoElectricButton = document.querySelector('.onHover-electric')
let scrollMotoElectricButton = document.querySelector('.scrollHover-electric')

function openMotoElectric() {
    motoElectric.classList.add('open')
}

function hideMotoElectric() {
    motoElectric.classList.remove('open')
}

motoElectricButton.onmouseover = openMotoElectric;
body.onclick = hideMotoElectric;
scrollMotoElectricButton.onmouseover = openMotoElectric;
motoElectric.addEventListener('click', function(e) {
    e.stopPropagation();
})

// show Trung cấp , Cao cấp
const $ = document.querySelector.bind(document)
const $$ = document.querySelectorAll.bind(document)
const levels = document.querySelectorAll('.level')
const MotoBodys = document.querySelectorAll('.Subnav-moto-col')

levels.forEach((level, index) => {
    const motoBody = MotoBodys[index]
    level.onclick = function () {
        $('.level.active').classList.remove('active')
        $('.Subnav-moto-col.active').classList.remove('active')

        this.classList.add('active')
        motoBody.classList.add('active')
    }
})

// show Dịch vụ
function OpenService() {
    $('.subnav__service-hover').classList.add('open')
}

function hideService() {
    $('.subnav__service-hover').classList.remove('open')   
}

$('.serviceHover').addEventListener('mouseenter', OpenService)
$('.scroll-ServiceHover').addEventListener('mouseenter', OpenService)
body.addEventListener('click', hideService)
$('.subnav__service-hover').addEventListener('click', function(e) {
    e.stopPropagation();
})

// show công cụ
function openSearch() {
    $('.subnav__search-hover').classList.add('open')
    $('.subnav__search-hover').classList.remove('none')
}

function hideSearch() {
    $('.subnav__search-hover').classList.remove('open')
    $('.subnav__search-hover').classList.add('none')
}

$('.searchHover').addEventListener('mouseenter', openSearch)
$('.scroll-searchHover').addEventListener('mouseenter', openSearch)

body.addEventListener('click', hideSearch)

$('.subnav__search-hover').addEventListener('click', function hehe(e) {
    e.stopPropagation();
})

$('.subnav__search-button').addEventListener('click', function search() {
    const data = 'Vinfast, auto, chạy nhanh, mẫu thiết kế đẹp mắt, đăng thanh'.toLowerCase();
    const location = data.indexOf($('.subnav__search-input').value, 0)

    if (location < 0) {
        alert("Không tìm thấy từ khóa cần tìm")
    } else {
        alert("Từ khóa bạn đang tìm ở: " +location)
    }
})
// chạy slider
const carousel = document.querySelector('.body__banner-carousel')
const ChangeSlider = document.querySelectorAll('.body__banner-img-contain')

let index = 0;

function Run() {
    index++;

    if (index > ChangeSlider.length - 1) {
        index = 0
    }

    carousel.style.transform = `translateX(${-index * 1200}px)`;
}

setInterval(Run, 5000)