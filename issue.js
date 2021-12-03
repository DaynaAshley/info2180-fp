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
        console.log(title);
        let description = document.querySelector('#description').value;
        let assigned = document.querySelector('#assigned').value;
        let type = document.querySelector('#type').value;
        console.log(type);
        let priority = document.querySelector('#priority').value;

        if (title.length == 0) {
            alert("The Title field is required!");

            return false;
        }
        if (description.length == 0) {
            alert("The Description field is required!");
            return false;
        }
        if (assigned.length == 0) {
            alert("The Assigned By field is required!");
            return false;
        }
        if (type.length == 0) {
            alert("The Type field is required!");
            return false;
        }
        if (priority.length == 0) {
            alert("The Priority field is required!");
            return false;
        }


        let xhr = new XMLHttpRequest();
        xhr.open('GET', `issue_info.php?title=${title}&description=${description}&assigned=${assigned}&type=${type}&priority=${priority}`);

        xhr.send();
    }



});