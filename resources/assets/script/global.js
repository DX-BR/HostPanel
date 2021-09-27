function screen_resize() {
    var w = parseInt(window.innerWidth);
    var table = document.querySelectorAll('.table');
    var ar,table2;
    for (ar = 0; ar < table.length; ar++) {
        table2=table.item(ar);
        if (w >= 0 && w <= 599) {
            if (table2.classList.length === 1) {
                table2.classList.add('show-thin');
            }
        } else if (w >= 600) {
            if (table2.classList.length === 2) {
                table2.classList.remove('show-thin');
            }
        }
    }
}

function displayWindowSize(){
    var w = document.documentElement.clientWidth;
    var h = document.documentElement.clientHeight;
    document.getElementById("result").innerHTML = "Width: " + w + ", " + "Height: " + h;
}
window.addEventListener("resize", screen_resize);

function pop(btn) {
    var m_name = btn.getAttribute('data-target');
    var m_action = btn.getAttribute('data-action');
    var m_data = btn.getAttribute('data-value');
    var m = document.getElementById(m_name);
    if(m_action==="show"){
        if (m_data){
            var m_name2 = btn.getAttribute('data-name');
            document.getElementById(m_name2).setAttribute('value', m_data);
        }
        m.style.display = "block";
    }else if(m_action==="hide"){
        m.style.display = "none";
    }
    window.onclick = function(event) {
        if (event.target == m) {
            m.style.display = "none";
        }
    }
}