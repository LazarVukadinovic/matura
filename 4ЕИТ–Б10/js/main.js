// DODELJIVANJE DOGADJAJA 'CHANGE'
document.getElementById('izbor').addEventListener('change', function() {
    // KREIRANJE POTREBNIG PROMENLJIVIH
    let e = document.getElementById("izbor");
    console.log(e.value);

    // SETOVANJE NA PRAZAN STRING
    document.getElementById('srp').value = "";
    document.getElementById('eng').value = "";
    document.getElementById('opis').value = "";

    // ZAVISNO OD IZBORA IZ COMBOBOX-A ODREDJENI ELEMENTI SE POSTAVLJAJU NA 'READONLY'
    if(e.value == "engleski")
    {
        document.getElementById('srp').setAttribute('readonly', true);
        document.getElementById('eng').removeAttribute('readonly');
        document.getElementById('eng').focus();
    }
    if(e.value == "srpski")
    {
        document.getElementById('eng').setAttribute('readonly', true);
        document.getElementById('srp').removeAttribute('readonly');
        document.getElementById('srp').focus();
    }
    
    // VRACANJE NA DEFAULT -> OBA POLJA SU 'READONLY'
    if(e.value == "default")
    {
        document.getElementById('eng').setAttribute('readonly', true);
        document.getElementById('srp').setAttribute('readonly', true);
    }
});