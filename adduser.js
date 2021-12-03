document.addEventListener('DOMContentLoaded', () => {

    let submit= document.querySelector('.sbtn');
    submit.addEventListener('click', () => myFunction());


    function myFunction(){
        let password= document.querySelector('#password').value;
        let email= document.querySelector('#email').value;

        let lastname= document.querySelector('#lname').value;
        
        let firstname= document.querySelector('#fname').value;

        let pass=document.querySelector('.password');
        let em=document.querySelector('.email');
        let fn=document.querySelector('.firstname');
        let ln=document.querySelector('.laststname');

        if (password==""){
            pass.innerHTML="Please enter a password!";
        }
        if(email==""){
            em.innerHTML="Please enter a email!";
        }

        if(firstname==""){
            fn.innerHTML="Please enter a first name!";
        }

        if(lastname==""){
            ln.innerHTML="Please enter a last name!";
        }

        let regex=/^(?=.*\d)(?=.*[A-Z])(?!.*[^a-zA-Z0-9])(.{8,})$/;

        let valid;
        if (regex.test(password)){
            valid=true;
        }
        else{
            pass.innerHTML="Password needs atleast 1 Capital Letter, 1 Number, 1 letter, 8 character minimum length";
        }

        if (email!=""&&valid&&firstname!=""&&lastname!=""){
            password=password.trim();
            password=sanitize(password);

            email=email.trim();
            email=sanitize(email);

            firstname=firstname.trim();
            firstname=sanitize(firstname);

            lastname=lastname.trim();
            lastname=sanitize(lastname);


            let request = new XMLHttpRequest();
            
            request.onreadystatechange = function() {
                if (request.readyState === 4) {
                    if (request.status === 200) {
                       
                        alert("User Successfully Added!!");
                        window.location.href = 'dash_index.php';
                    } else {
                        alert('Error Code- Information not found');
                    }
                }
            }

            request.open('GET', `adduser.php?password=${password}&email=${email}&firstname=${firstname}&lastname=${lastname}`);
            request.send(); 
        }
    }

    function sanitize(string) {
        let map = {'&': '','<': '', '>': '', '"': '',"'": '',"/": ''};
        let reg = /[&<>"'/]/ig;
        return string.replace(reg, (match)=>(map[match]));
      }

});