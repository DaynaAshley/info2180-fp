document.addEventListener('DOMContentLoaded', () => {

    let home= document.querySelector('.hbtn');
    home.addEventListener('click', () => myFunction());

    function myFunction(){
        window.location.href = 'dash_index.php';
    }

    let add= document.querySelector('.abtn');
    add.addEventListener('click', () => myFunction1());

    function myFunction1(){
        window.location.href = 'adduser_index.php';
    }

    let newissue= document.querySelector('.nbtn');
    newissue.addEventListener('click', () => myFunction2());

    function myFunction2(){
        window.location.href = 'issue.php';
    }

    let logout= document.querySelector('.lbtn');
    logout.addEventListener('click', () => myFunction3());

    function myFunction3(){
        window.location.href = 'logout.php';
    }

});