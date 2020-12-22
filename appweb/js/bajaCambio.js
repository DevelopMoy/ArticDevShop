function mostrar(){
    let f = document.getElementById("modificar");
    let v = document.getElementById("id");
    let p =document.getElementById("text");
    if(v.value==0 ){
        p.style.visibility='visible';
        p.style.display='block';
    }else{
        p.style.visibility='hidden';
        p.style.display='none';
       f.style.visibility='visible';
       f.style.display='block'; 
    }
}