window.onload = function(){
    idbtn1 = document.querySelectorAll('.btnpanier');
    for (var i = 0; i < idbtn1.length; i++) {
        idbtn1[i].addEventListener('click',function(e) {
            idbtn2 = document.querySelectorAll('.cacher');
            for (var j = 0; j < idbtn2.length; j++) {
                if (idbtn2[j].getAttribute('class')==='cacher'){
                    idbtn2[j].classList.remove('cacher');
                }
                break;
            }
        }, false);
    }
}


