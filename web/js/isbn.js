function createXhrObject(){
    if (window.XMLHttpRequest)
        return new XMLHttpRequest();
 
    if (window.ActiveXObject){  
        var names = [ "Msxml2.XMLHTTP", "Microsoft.XMLHTTP",
                      "Msxml2.XMLHTTP.6.0", "Msxml2.XMLHTTP.3.0"];
        for(var i in names){
            try{ return new ActiveXObject(names[i]); }
            catch(e){}
        }
    }
    window.alert("pas de prise en charge de XMLHTTPRequest.");
    return null; // non supporte
} 
 
function recupInfosLivre(isbn) { 
	var googleAPI = "https://www.googleapis.com/books/v1/volumes?q=isbn:"+isbn;
	$.getJSON( googleAPI, {tagmode: "any", format: "json"})
	.done(function( data ) {
		if (data["items"]){
			document.getElementById('form_titre').value=data["items"][0]["volumeInfo"]["title"];
			document.getElementById('form_resume').value=data["items"][0]["volumeInfo"]["description"];
		}
		else {alert("Aucune info disponible")};
	})
}

function initISBN() {
    var isbn = document.getElementById('form_isbn').value;
	var nb=isbn.length;
	if (nb==10 || nb==13)
		recupInfosLivre(isbn)
		//alert("Format OK")
	else alert ("Format ISBN incorrect !")
}    

function initButton() {
    var btnISBN = document.getElementById('form_searchisbn');
	initEventHandlers(btnISBN, 'click', function() {setTimeout("initISBN()",100);});
}   

function initEventHandlers(element, event, fx) {
    if (element.addEventListener)
        element.addEventListener(event, fx, false);
    else if (element.attachEvent)
        element.attachEvent('on' + event, fx);
} 
 
initEventHandlers(window, 'load', initButton);