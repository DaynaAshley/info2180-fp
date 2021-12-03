window.onload = function(){
    const urlParams = new URLSearchParams(location.search);
    let array=[];
    

    for (const value of urlParams.values()) {
        array.push(value);
    }

    let lstresult=document.querySelector('.results');

            let request = new XMLHttpRequest();
            
            let title=array[0];
            let id=array[1];
            request.onreadystatechange = function() {
                printFunction(request, lstresult);
            }

            request.open('GET', `detailedissue.php?title=${title}&id=${id}`);
            request.send();
    
    
   
    function printFunction(request, lstresult) {
        if (request.readyState === 4) {
            if (request.status === 200) {
                lstresult.innerHTML = request.responseText;
            } else {
                alert('Error Code- Information not found');
            }
        }
    }
}

document.addEventListener('DOMContentLoaded', () => {
    let closed= document.querySelector('.btnclosed');
    closed.addEventListener('click', () => myFunction1());

    let progress= document.querySelector('.btnprogress');
    progress.addEventListener('click', () => myFunction2());

    

    function myFunction1(){

        const urlParams = new URLSearchParams(location.search);
        let array=[];
        
    
        for (const value of urlParams.values()) {
            array.push(value);
        }
    
             
        let title=array[0];
        let id=array[1];
            let request = new XMLHttpRequest();
            let lstresult=document.querySelector('.results');

            request.onreadystatechange = function() {
                printFunction(request, lstresult);
            }

            
            request.open('GET', `detailedissue.php?context=Closed&id=${id}&title=${title}`);
            request.send();
    }
    

    function myFunction2(){
        let request = new XMLHttpRequest();
        let lstresult=document.querySelector('.results');

        const urlParams = new URLSearchParams(location.search);
        let array=[];
        
    
        for (const value of urlParams.values()) {
            array.push(value);
        }
    
             
        let title=array[0];
        let id=array[1];
        request.onreadystatechange = function() {
            printFunction(request, lstresult);
        }

            
        request.open('GET', `detailedissue.php?context=Progress&id=${id}&title=${title}`);
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


});

