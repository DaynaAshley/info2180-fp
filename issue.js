document.addEventListener('DOMContentLoaded', () => {
    let submit = document.querySelector('#submit');

    submit.addEventListener('click', () => submitButton());

    let lstresult = document.querySelector('.dropdown');
    let request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        printFunction(request, lstresult);
    }

    request.open('GET', `issue_info.php`);
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

    function submitButton() {

        let title = document.querySelector('#title').value;
      
        let description = document.querySelector('#description').value;
        let assigned = document.querySelector('#name').value;
        let type = document.querySelector('#type').value;
        let priority = document.querySelector('#priority').value;

        if (title=="") {
            alert("The Title field is required!");
        }
        if (description=="") {
            alert("The Description field is required!");
           
        }
        if (assigned=="") {
            alert("The Assigned By field is required!");
          
        }
        if (type=="") {
            alert("The Type field is required!");

        }
        if (priority=="") {
            alert("The Priority field is required!");
        }

        if (title!=""&&description!=""&&assigned!=""&&type!=""&&priority!=""){

            title=title.trim();
            title=sanitize(title);

            description=description.trim();
            description=sanitize(description);

            assigned=assigned.trim();
            assigned=sanitize(assigned);

            console.log(assigned);

            type=type.trim();
            type=sanitize(type);

            priority=priority.trim();
            priority=sanitize(priority);

            let xhr = new XMLHttpRequest();

           
            xhr.open('GET', `issue_info.php?title=${title}&description=${description}&assigned=${assigned}&type=${type}&priority=${priority}&context=submit`);

            
            xhr.send();
            alert("Issue Successfully Added!!");


            document.querySelector('#title').value="";
            document.querySelector('#description').value="";

        }

    }

    function sanitize(string) {
        let map = {'&': '','<': '', '>': '', '"': '',"'": '',"/": ''};
        let reg = /[&<>"'/]/ig;
        return string.replace(reg, (match)=>(map[match]));
      }


});