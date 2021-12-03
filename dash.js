document.addEventListener('DOMContentLoaded', () => {

    let create= document.querySelector('.new_btn');
    create.addEventListener('click', () => myFunction());

    function myFunction(){
        window.location.href = '#';
    }
    
    let all= document.querySelector('.all_btn');
    all.addEventListener('click', () => myFunction1());

    let open= document.querySelector('.open_btn');
    open.addEventListener('click', () => myFunction2());

    let ticket= document.querySelector('.ticket_btn');
    ticket.addEventListener('click', () => myFunction3());


    function myFunction1(){
        ticket.className="button";
        open.className="button";
        all.className="clicked";
        let lstresult=document.querySelector('#tables');
            let request = new XMLHttpRequest();
            
            request.onreadystatechange = function() {
                printFunction(request, lstresult);
            }

            request.open('GET', `dashboard.php?context=all`);
            request.send();
    }
    
   
    function printFunction(request, lstresult) {
        if (request.readyState === 4) {
            if (request.status === 200) {
                lstresult.innerHTML = request.responseText;
            } else {
                alert('Error Code- Information not found');
            }
        }
    }

   

    function myFunction2(){
        all.className="button";
        ticket.className="button";
        open.className="clicked";
        let lstresult=document.querySelector('#tables');
        let request = new XMLHttpRequest();
        
        request.onreadystatechange = function() {
            printFunction(request, lstresult);
        }
        request.open('GET', `dashboard.php?context=open`);
        request.send();
}

    
    function myFunction3(){
        all.className="button";
        open.className="button";
        ticket.className="clicked";
        let lstresult=document.querySelector('#tables');
        let request = new XMLHttpRequest();
        
        request.onreadystatechange = function() {
            printFunction(request, lstresult);
        }
        request.open('GET', `dashboard.php?context=my_ticket`);
        request.send();
}
});