// KONSTANTA SA NAZIVIMA DRZAVA
const drzave = ['Srbija', 'Madjarska', 'Rumunija', 'Bugarska', 'Makedonija', 'Albanija', 'Crna Gora', 'Bosna', 'Hrvatska'];

// PETLJA ZA DODAVANJE CLICK LISTENER-A -> OTVARANJE NOVOG PROZORA
for(let i=0; i<9; i++)
{
    document.getElementById('p'+(i+1)).addEventListener('click', function(){
        window.open('./pages/info/' + drzave[i] +'.html','name','width=500, height=500')
    });
}

// POSTAVLJANJE DOGADJAJA ZA FOKUS NA ELEMENT I IZLAZAK IZ FOKUSA ELEMENTA -> REPRODUKOVANJE ZVUKA
for(let i=0; i<9; i++)
{
    document.getElementById('img'+(i+1)).addEventListener('mouseover', function() {
        PlaySound('audio'+(i+1));
    });

    document.getElementById('img'+(i+1)).addEventListener('mouseout', function() {
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