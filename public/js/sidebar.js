const sidebar = document.getElementById('sidebar');
const toggleBtn = document.querySelector('.toggle-btn');
const closeBtn = document.querySelector('.close-btn');
const linksText = document.querySelectorAll('.links-text');
const dropdownToggle = document.querySelectorAll('.dropdown-toggle');
const dashBody = document.querySelector('.dash-body');
const gapToggle = document.getElementById('gap-toggle');
let sidebarOpen = false;
toggleBtn.addEventListener('click', () => {
    if(sidebar){
        sidebar.classList.toggle('active');
    }
    if(dashBody){
        dashBody.classList.toggle('active');
    }
    if(gapToggle){
        gapToggle.classList.toggle('active');
    }
    if(linksText){
        for (let i = 0; i < linksText.length; i++) {
            if(sidebarOpen) {
                linksText[i].style.display = 'none';
            } else {
                linksText[i].style.display = 'inline';
            }
        }
    }
    if(dropdownToggle){
        for (let i = 0; i < dropdownToggle.length; i++) {
            if(sidebarOpen) {
                dropdownToggle[i].classList.remove('toggle');
            } else {
                dropdownToggle[i].classList.add('toggle');
            }
        }
    }
    sidebarOpen = !sidebarOpen;
});