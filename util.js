window.onload = createLinks;

/*
Send JSON request based on user input for branch name element.
*/
function createLinks() {
    links = document.getElementsByClassName("branchname");
    for (var i=0; i<links.length; i++) {
        link = links[i];
        link.onclick = function () {
            sendRequest(this.innerHTML);
        }
    }
}

/*
Makes JSON requests compatible for old windows browsers.
*/
function makeRequest() {
    try {
        request = new XMLHttpRequest();
    }
    catch(tryMS) {
        try {
            request = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch(otherMS) {
            try {
                request = new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch(failed) {
                request = null;
            }
        }
    }
    return request;
}

/*
Send JSON request based on user input for branch and college name.
*/
function sendRequest(subbranch) {
    request = makeRequest();
    if(request == null){
        return;
    }
    var url = "createpage.php?branch=" + escape(subbranch) + "&college=" + escape(document.getElementById("collegename").innerHTML);
    request.open("GET", url, true);
    request.onreadystatechange = displayDetails;
    request.send(null);
}

/*
Send JSON request based on user input for branch and college name and semester.
*/
function semRequest(semester) {
    request = makeRequest();
    if(request == null){
        return;
    }
    var url = "createpage.php?branch=" + escape(document.getElementById("branchtitle").innerHTML) + "&college=" + escape(document.getElementById("collegename").innerHTML) + "&sem=" + semester;
    request.open("GET", url, true);
    request.onreadystatechange = semDetails;
    request.send(null);
}

/*
Display semester data obtained from JSON request
*/
function displayDetails() {
    if(request.readyState == 4) {
        if(request.status == 200) {
            detaildiv = document.getElementById("sem-list");
            detaildiv.innerHTML = request.responseText;
        }
    }
}

/*
Display books data obtained from JSON request
*/
function semDetails() {
    if(request.readyState == 4) {
        if(request.status == 200) {
            detaildiv = document.getElementById("book-list");
            detaildiv.innerHTML = request.responseText;
        }
    }
}

/*
Adds selected books to cart for future checkout
*/
function selectBook(subject,bookname) {
    request = makeRequest();
    if(request == null){
        return;
    }
    var url = "createsession.php?bname=" + escape(bookname) + "&sub=" + escape(subject);
    request.open("GET", url, true);
    request.send(null);
    tarclass=document.getElementsByClassName("product-selected");
    for(var i=0; i<tarclass.size; i++) {
        if(tarclass[i].id==subject) {
            tarclass[i].className='product-box';
        }
    }
    chkbox = document.getElementById("the" + escape(subject));
    chkbox.checked = true;
}
