/*
JSON request support for older windows web browsers
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
Updates referal code result for user
*/
function displayDetails() {
    if(request.readyState == 4) {
        if(request.status == 200) {
            detaildiv = document.getElementById("cost");
            detaildiv.innerHTML = request.responseText;
            img = document.getElementById("status");
            if(img.title == "Referal successfully applied") {
                document.getElementById("refbtn").disabled = true;
            }
        }
    }
}

/*
Checks for referal code by user input
*/
function checkref() {
    request = makeRequest();
    if(request == null){
        return;
    }
    var url = "checkreferal.php?ref=" + escape(document.getElementById("refcode").value);
    request.open("GET", url, true);
    request.onreadystatechange = displayDetails;
    request.send(null);
}

window.onload = function() {
    document.getElementsByTagName("button").onclick=checkref;
}
