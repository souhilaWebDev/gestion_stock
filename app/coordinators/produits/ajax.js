
// var bag = new FormData();
// bag.append("ops", "communesWilaya");
// bag.append("wilaya", 'dfsfsd');

var canal = new XMLHttpRequest();
canal.open('POST', 'www.google.com?ss=dsfsdf', false);
canal.send(bag);
if (canal.readyState == 4 && canal.status == 200) {
    console.log(canal.responseText);
}

// ############################################################

var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    console.log(xhttp.responseText);
};
xhttp.open("GET", "http://127.0.0.1/notaria/utilisateurs/supprimer/6874645", true);
xhttp.send();

//##############################################################

function ajax(bag = null, url, method = 'POST', json = false, async = false)
{
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            if (json) {
                return JSON.parse(this.responseText);
            } else {
                return this.responseText;
            }
        } else {
            console.log('erreur AJAX : ' + this.statusText);
            return false;
        }
    };

    if (bag !== null) {
        var formData = new FormData();
        for (var key in bag) {
            formData.append(key, bag[key]);
        }
    }
    xmlhttp.open(method, url, async);
    xmlhttp.send(formData ?? null);
}

let ss = {
    'nom': 'ilies',
    'adresse': 'France'
}

let response = ajax(ss, 'www.ssss.com/user/add', 'POST', true);