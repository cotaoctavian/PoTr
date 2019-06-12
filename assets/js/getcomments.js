function getComments(id, titlu, limba) {
    let request;
    if (window.XMLHttpRequest) {
        request = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        request = new ActiveXObject("Microsoft.XMLHTTP");
    }

    request.onreadystatechange = function () {
        if (request.readyState === XMLHttpRequest.DONE) {
            if (request.status === 200) {
                var HTML = document.createElement("html");
                HTML.innerHTML = request.responseText;
                //console.log(HTML.getElementsByClassName("comment-main"));
                document.querySelector("body > div.comment-main").innerHTML = HTML.querySelector("body > div.comment-main").innerHTML;
            } else if (request.status === 400) {
                alert('Eroare!');
            } else {
                alert('Eroare!');
            }
        }
    };

    request.open("GET", "http://potr.lc/poem/poezie/"+id+"/"+titlu+"/"+limba, true);
    request.send();
}

