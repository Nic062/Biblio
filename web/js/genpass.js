function generatePassworda(){
    var password = Math.random().toString(36).slice(-10);
    alert(password)
    document.getElementById('fos_user_registration_form_plainPassword_first').value=password;
    document.getElementById('fos_user_registration_form_plainPassword_second').value=password;
}   

function initButton() {
    var btnPass = document.getElementById('generatePassword');
    initEventHandlers(btnPass, 'click', function() {setTimeout("generatePassworda()",100);});
}   

function initEventHandlers(element, event, fx) {
    if (element.addEventListener)
        element.addEventListener(event, fx, false);
    else if (element.attachEvent)
        element.attachEvent('on' + event, fx);
} 
 
initEventHandlers(window, 'load', initButton);