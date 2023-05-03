document.addEventListener("DOMContentLoaded", () => {
   
    let confirmeds = document.querySelectorAll("[name = confirmed]");

document.addEventListener("click", (event) => {
    console.log(event.target)
    if(event.target.classList.contains("confirmed")){
        let conf = event.target.value;
        let usId = event.target.dataset.userId;
        createConfirmedUser(conf, usId)
    }
})
    async function createConfirmedUser(conf, userId) {
      //формируем параметр запроса
      let parameter = new URLSearchParams();
      parameter.append("conf", JSON.stringify(conf));
      parameter.append("user_id", JSON.stringify(userId));
      console.log(parameter)
      let data = await getData(
        "/app/admins/tables/users/check.php",
        parameter
      );
    
    }

    
  
    
})