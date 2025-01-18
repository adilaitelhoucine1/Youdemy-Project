let  Allbtn = document.querySelectorAll(".btn");
Allbtn.forEach(btn => {
    btn.addEventListener("click", ()=>{
        location.href="../public/login.php";
    })
    
});