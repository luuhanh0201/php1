var $ = document.querySelector.bind(document)
var $$ = document.querySelectorAll.bind(document)
const items = $$('.menu-item')
const contents = $$('.tab-content')
const line = $('.line')
const lineActive = $('.menu-item.active')
console.log(lineActive)
line.style.width = lineActive.offsetWidth + 'px'
line.style.left = lineActive.offsetLeft + 'px'

items.forEach((item, index) => {
    const content = contents[index]

    item.onclick = function () {
        $('.menu-item.active').classList.remove('active')
        $('.tab-content.active').classList.remove('active')

        line.style.width = this.offsetWidth + 'px'
        line.style.left = this.offsetLeft + 'px'

        this.classList.add('active')
        content.classList.add('active')
    }
})

function openSocial(link) {
    return window.open(link)
}


