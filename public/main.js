if(window.history.replaceState){
  window.history.replaceState(null, null, window.location.href);
}

let button = document.getElementById('button');
let file = document.getElementById('file');
let form = document.getElementById('form');
let clipboards = document.getElementsByClassName('copy');

button.addEventListener('click', () => file.click());
file.addEventListener('change', () => form.submit());

function copy(input){
  input.select();
  input.setSelectionRange(0, 99999);
    
  if(navigator.clipboard){
    navigator.clipboard.writeText(input.value);
  }
  else{
    document.execCommand('copy');
  }
}

for(let i = 0; i < clipboards.length; i++){
  clipboards[i].addEventListener('click', () => copy(clipboards[i].previousElementSibling));
}