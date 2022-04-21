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
Updates input form data based on JSON request response.
*/
function showDetails() {
    if(request.readyState == 4) {
        if(request.status == 200) {
            detaildiv = document.getElementById("formstate");
            detaildiv.innerHTML = request.responseText;
        }
    }
}

/*
Checks if user ID exists
*/
function checkusr() {
    request = makeRequest();
    if(request == null) {
        return;
    }
    var url = 'checkdet.php?type=' + escape(this.name) + '&val=' + escape(this.value);
    request.open("GET", url, true);
    request.onreadystatechange = showDetails;
    request.send(null);
}

/*
Display Signin button
*/
function showsin() {
    sindiv = document.getElementById("signin");
    supdiv = document.getElementById("signup");
    supdiv.style.display = "none";
    sindiv.style.display = "block";
}

/*
Display Signup button
*/
function showsup() {
    supdiv = document.getElementById("signup");
    sindiv = document.getElementById("signin");
    supdiv.style.display = "block";
    sindiv.style.display = "none";
}

/*
Confirms if same password has been entered twice
*/
function checkpwd() {
    pd2 = document.getElementById("pwd2");
    pd = document.getElementById("pwd");
    if(pd.value == pd2.value) {
        document.getElementById("submt").disabled = false;
    }
    else {
        document.getElementById("submt").disabled = true;
    }
}

/*
Initializes certain elements when page has loaded
*/
window.onload = function() {
    inp = document.getElementById("check").getElementsByTagName("input");
    document.getElementById("sin").onclick = showsin;
    document.getElementById("sup").onclick = showsup;
    document.getElementById("pwd").onblur = checkpwd;
    document.getElementById("pwd2").onblur = checkpwd;
    for (var i=0; i<inp.length; i++) {
        inp[i].onblur=checkusr;
    }
}
