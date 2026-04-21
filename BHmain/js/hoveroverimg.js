function Hover(){
    let kep=document.getElementById("fooldal-latnivalok2Kep");
    let szoveg=document.getElementsByClassName("textonimage_1");    
    szoveg[0].style.visibility="visible";
    kep.style.opacity="0.8";
}




function Hover1(){
    let kep=document.getElementById("fooldal-latnivalok2Kep");
    let szoveg=document.getElementsByClassName("textonimage_1");    
    szoveg[0].style.visibility="visible";
    kep.style.opacity="0.8";
}
function Hover2(){
    let szoveg=document.getElementsByClassName("textonimage_2"); 
    szoveg[0].style.visibility="visible";
    kep.style.opacity="0.8";
}
function Hover3(){
    let szoveg=document.getElementsByClassName("textonimage_3"); 
    szoveg[0].style.visibility="visible";
    kep.style.opacity="0.8";
}
function Hover4(){
    let szoveg=document.getElementsByClassName("textonimage_4"); 
    szoveg[0].style.visibility="visible";
    kep.style.opacity="0.8";
}



document.getElementById("fooldal-latnivalok2Kep").offsetWidth=document.getElementsByClassName("textonimage_1").style.width;

if(document.getElementsByClassName("textonimage_1").style.visbility="visible"){
    document.getElementById("fooldal-latnivalok2Kep").style.width=document.getElementsByClassName("textonimage_1").style.width;
    
}

