const pass = document.getElementById('password');
const icon = document.getElementById('eye');

function show(){
    if(pass.type=== 'password'){
        pass.setAttribute('type','text');
        icon.classList.add('hide')
    }else{
        pass.setAttribute('type','password');
        icon.classList.remove('hide')
    }
}