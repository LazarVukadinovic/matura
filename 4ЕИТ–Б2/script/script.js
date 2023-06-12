// KONSTANTA SA NAZIVIMA ZIVOTINJA
const zivotinja = ['pas', 'patka', 'macka', 'pile', 'krava'];

// PETLJA ZA POSTAVLJANJE CLICK DOGADJAJA -> OTVARANJE ODGOVARAJUCE STRANE
for(let i=0; i<5; i++)
{
    document.getElementById('animal'+(i+1)).addEventListener('click', function(){
        window.open('./pages/zivotinje/' + zivotinja[i] +'.html','name','width=500, height=500')
    });
}

// POSTAVLJANJE DOGADJAJA ZA FOKUS NA ELEMENT I IZLAZAK IZ FOKUSA ELEMENTA -> REPRODUKOVANJE ZVUKA
for(let i=0; i<5; i++)
{
    document.getElementById('animal'+(i+1)).addEventListener('mouseover', function() {
        PlaySound('audio'+(i+1));
    });

    document.getElementById('animal'+(i+1)).addEventListener('mouseout', function() {
        StopSound('audio'+(i+1));
    });
}

// FUNKCIJA ZA REPRODUKOVANJE AUDIO ZAPISA
function PlaySound(soundobj) {
    var thissound=document.getElementById(soundobj);
    thissound.play();
}

// FUNKCIJA ZA ZAUSTAVLJANJE REPRODUKCIJE AUDIO ZAPISA
function StopSound(soundobj) {
    var thissound=document.getElementById(soundobj);
    thissound.pause();
    thissound.currentTime = 0;
}