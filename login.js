document.addEventListener('DOMContentLoaded', () => {

    let login= document.querySelector('.login');
    login.addEventListener('click', () => myFunction());

    let see= document.querySelector('#see');
    see.addEventListener('click', () => myFunction1());

    function myFunction1(){
        let password= document.querySelector('#password');
        if (password==""){
            pass.innerHTML="Please enter a password!";
        }
        else{
        password.type = "text";
        }

    }

    function myFunction(){
        let password= document.querySelector('#password').value;
        let email= document.querySelector('#email').value;

        let pass=document.querySelector('.password');
        let em=document.querySelector('.email');
        if (password==""){
            pass.innerHTML="Please enter a password!";
        }
        if(email==""){
            em.innerHTML="Please enter a email!";
        }

        if (email!=""&&password!=""){
            password=password.trim();
            password=sanitize(password);

            email=email.trim();
            email=sanitize(email);

            let request = new XMLHttpRequest();
            
            request.onreadystatechange = function() {
                if (request.readyState === 4) {
                    if (request.status === 200) {
                   
                        let validate = request.responseText;
                        
                        if (validate){
                            window.location.href = 'dash_index.php';
                        }
                        else{
                            alert("Password or email is INVALID!!");
                        }
                    } else {
                        alert('Error Code- Information not found');
                    }
                }
            }

            request.open('GET', `login.php?password=${password}&email=${email}`);
            request.send(); 
        }
    }

    function sanitize(string) {
        let map = {'&': '','<': '', '>': '', '"': '',"'": '',"/": ''};
        let reg = /[&<>"'/]/ig;
        return string.replace(reg, (match)=>(map[match]));
      }
});