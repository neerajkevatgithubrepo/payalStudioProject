
let printBtn = document.getElementById('print-btn');
 printBtn.addEventListener('click',() => {
    let a4sheet = document.querySelectorAll('.a4sheet').innerHTML;
    let bodi = document.getElementById('page-body') = a4sheet;
    window.print()
});