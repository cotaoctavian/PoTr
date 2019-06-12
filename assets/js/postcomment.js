function postComment(URL, comm) {
    let req;
    if (window.XMLHttpRequest) {
        req = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        req = new ActiveXObject("Microsoft.XMLHTTP");
    }
    if (req !== undefined) {
        req.open("POST", URL, true);
        req.send(comm);

        if (req.readyState === XMLHttpRequest.DONE) return req.responseText;
        else return req.status + " " + req.statusText;

    }
}
