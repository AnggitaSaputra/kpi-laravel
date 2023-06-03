const sidebar = document.querySelector('#sidebar')
const sidebarBtn = document.querySelector('#sidebar-button')
const sidebarOpen = document.querySelector('#sidebar-open')
const sidebarClose = document.querySelector('#sidebar-close')

sidebarOpen.addEventListener('click', () => {
    sidebarHandler()
})
sidebarClose.addEventListener('click', () => {
    sidebarHandler()
})


const sidebarHandler = () => {
    sidebarOpen.classList.toggle('sidebar-active')
    sidebarClose.classList.toggle('sidebar-active')

    if (sidebarOpen.classList.contains('sidebar-active')) {
        sidebar.style.cssText = ""
        sidebarBtn.style.cssText = ""
        document.querySelector('#main').style.cssText = ""
    }
    if (sidebarClose.classList.contains('sidebar-active')) {
        sidebar.style.cssText = "left: 0px;"
        sidebarBtn.style.cssText = "left: 300px"
        document.querySelector('#main').style.cssText = "margin-left: 290px;"
    }
}