document.addEventListener("DOMContentLoaded", function() {
    // Attend que le document soit complètement chargé
    createbtn();
});

const createbtn = () =>{
    const $btnCreate = document.getElementById("create");
    const $divSign = document.getElementById("sign");
    const $divLog = document.getElementById("log");
    const $createPara = document.getElementById("createPara");
    const  $logPara = document.getElementById("logPara");
    const $loginBtn = document.getElementById("login");

    $loginBtn.addEventListener("click", () => {
        $divSign.classList.toggle("active");
        $divLog.classList.toggle("active");
        
        $logPara.classList.toggle("no_activedPara");
        $logPara.classList.toggle("activedPara");
        $createPara.classList.toggle("no_activedPara");
    })

    $btnCreate.addEventListener('click', (e) => {
        e.preventDefault();
        console.log("Bouton cliqué");
        
        if ($divSign) {
            console.log("$divSign existe");
        } else {
            console.log("$divSign n'existe pas");
        }
        if ($divLog) {
            console.log("$divLog affiché");
        } else {
            console.log("$divLog n'est pas affiche");
        }

        $divSign.classList.toggle("active");
        $divLog.classList.toggle("active");
        
        $logPara.classList.toggle("no_activedPara");
        $logPara.classList.toggle("activedPara");
        $createPara.classList.toggle("no_activedPara");

    //     if ($divSign.classList.contains("active")) {
        //     $logPara.classList.add("actived");
        // } else {
        //     $logPara.classList.remove("actived");
        // }
        // $createPara.classList.toggle("activedPara");
        // $logPara.classList.toggle("no_activedPara");
    });
}

// const btnLog = () => {
    
// }
