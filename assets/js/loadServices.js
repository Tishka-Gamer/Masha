
//функция продукты категории
async function getServicesByType(typeId) {
  //формируем параметр запроса
  let parameter = new URLSearchParams();
  parameter.append("type", JSON.stringify(typeId));

  let services = await getData("/app/tables/products/search.check.php", parameter);
  outOnPange(services);
}

//вывод товаров на странице функция
function outOnPange(arr) {

  arr.forEach((item) => {
    containerProducts.insertAdjacentHTML("beforeend", getOneCard(item));
  });
}

//формирование 1 карточки
function getOneCard({ product_id, product_name, image, country, price }) {
  return `
      <div class="col">
          <div id="${product_id}" class="card" style="width: 18rem;">
              <img src="/upload/${image}" class="card-img-top" alt="${image}">
              <div class="card-body">
                  <h5 class="card-title">${product_name}</h5>
                  <p class="card-text">${price}₽</p>
                  <p class="card-text">страна - ${country}</p>
                  <a href="/app/tables/products/show.php?id=${product_id}" name="btn_show" class="btn btn-primary" >Подробнее</a>   
                  <br>  <br>          
                <p><button data-idproduct="${product_id}" class="btn-primary btn btn-to-basket" id="btn-to-basket-${product_id}">В корзину</button></p>
                  </div>
          </div>
      </div>
      `;
}

document.addEventListener("DOMContentLoaded", () => {
  let type = document.querySelectorAll(".accordion-button");

  document.addEventListener("click", (event) => {
    console.log(event.target)
    if(event.target.classList.contains("accordion-button")){
      let typeId = event.target.value;
      console.log(typeId)
    }
  })

});
