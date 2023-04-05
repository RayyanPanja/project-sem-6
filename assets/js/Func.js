function goTo(url){
    window.location.assign(url);
}

function goToHome(bool = false){
    if(bool === false){
        window.location.assign("../../../index.php")
    }else{
        window.location.assign("../../../home.php")
    }
}

function retry(){
    window.location.assign("../index.php");
}