function closeNotication(){
    let notifi = document.getElementById('notifi');
    // notifi.style.display = 'none';
    notifi.className = 'notication dropdown-menu dropdown-menu-right';
    
}

function openNotication(){
    let notifi = document.getElementById('notifi');
    // notifi.style.display = 'block';
    notifi.className = 'notication dropdown-menu dropdown-menu-right show';
    
}