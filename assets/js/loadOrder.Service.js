document.addEventListener("DOMContentLoaded", () => {
  let selectTime = document.querySelector("#time");
  let petCheck = document.querySelector("[name = pet]");
  getPet(petCheck.value);

  petCheck.addEventListener("change", () => {
    getPet(petCheck.value);
  });

  async function getPet(petId) {
    //формируем параметр запроса
    let parameter = new URLSearchParams();
    parameter.append("pet_id", JSON.stringify(petId));

    let pet = await getData("/app/tables/orders/search.check.php", parameter);

    document.querySelector(".pet-order-div-img").innerHTML = "";
    document.querySelector(".pet-order-div-img").innerHTML = petImg(pet);
  }

  function petImg({ id, image }) {
    return `
  <img class="pet-order-img" src="/uploads/users/${image}" alt="pet-${id}">
  `;
  }

  //-----------------------------------------------------------------------------------------------------------------------
  let specs = document.querySelector("#spec");
  console.log(specs);

  //функция спецы по услуге
  async function getServicesBySpec(servId) {
    //формируем параметр запроса
    let parameter = new URLSearchParams();
    parameter.append("serv_id", JSON.stringify(servId));

    let services = await getData(
      "/app/tables/orders/search.check.php",
      parameter
    );

    outOnPange(services);
    selectSpec = document.querySelector("[name=spec]");
    console.log(selectSpec);
    selectSpec.addEventListener("change", async (e) => {
      console.log("SPEC");
      await getDatesBySpec(selectSpec.value);
    });
  }

  //вывод спецов на странице функция
  function outOnPange(arr) {
    specs.innerHTML = "";
    arr.forEach((item) => {
      specs.insertAdjacentHTML("beforeend", getOneCard(item));
    });
  }

  //формирование 1 карточки
  function getOneCard({ id, fio, price }) {
    return `
    <option value="${id}">${fio}</option>
        `;
  }

  let service = document.querySelector("#service");
  service.addEventListener("change", async () => {
    console.log(service.value);
    let serv_id = service.value;

    await getServicesBySpec(serv_id);

    let spec_id = specs.value;
    await getDatesBySpec(spec_id);
  });

  selectSpec = document.querySelector("[name=spec]");
  console.log(selectSpec);
  selectSpec.addEventListener("change", async (e) => {
    console.log("SPEC");
    await getDatesBySpec(selectSpec.value);
  });

  //-----------------------------------------------------------------------------------------------------------------------------------
  doctor = specs.value;
  console.log(doctor);

  getDatesBySpec(doctor);

  let btns = document.querySelectorAll(".btn-calendar");

  btns.forEach((btn) => {
    btn.addEventListener("click", () => {
      doctor = specs.value;
      console.log("ggg");
      getDatesBySpec(doctor);
    });
  });

  async function getDatesBySpec(specId) {
    //формируем параметр запроса
    let parameter = new URLSearchParams();
    parameter.append("spec_id", JSON.stringify(specId));

    let dates = await getData("/app/tables/orders/search.check.php", parameter);

    console.log(specId);
    console.log(dates);

    let radioDate = document.querySelectorAll("[name = date]");
    console.log(radioDate);

    dates.forEach((e) => {
      radioDate.forEach((r) => {
        if (e.date == r.value) {
          r.disabled = false;
          // r.style.borderColor = "red"
          console.log(r);
        }
      });
    });

    let inputsDate = document.querySelectorAll("[name = date]");
    let freeInputs = [];
    console.log(inputsDate);
    inputsDate.forEach((e) => {
      if (e.disabled == false) {
        freeInputs.push(e);
      }
    });
    console.log(freeInputs);
    freeInputs[0].checked = true;
    OutTimes();
  }

  //---------------------------------------------------------------------------------------------

  async function getTimeBySpecDate(specId, date) {
    //формируем параметр запроса
    let parameter = new URLSearchParams();
    parameter.append("spec_id", JSON.stringify(specId));
    parameter.append("date", JSON.stringify(date));

    let times = await getData("/app/tables/orders/search.check.php", parameter);
    return times;
  }

  async function OutTimes() {
    // document.querySelectorAll("[name = date]").forEach((btn) => {
    // console.log("aaaaaaaaaaaa");
    // console.log(btn);

    // btn.addEventListener("click", async () => {
    let doctor = specs.value;
    let date = document.querySelector("[name = date]:checked").value;
    let arr = await getTimeBySpecDate(doctor, date);
    console.log("aaaaaaaaaaaa");
    tableTimes(arr.free);
    // document.querySelector(".times").innerHTML = ""
    // document.querySelector(".times").innerHTML = table;
    console.log(arr);
    let close = arr.close;
    // let times = document.querySelectorAll("[name = time]");

    // times.forEach(time => {
    //   if(close.includes(time.value)){
    //     time.disabled = true;
    //   }

    // })
    //   });
    // });
    let arrTimes = document.querySelectorAll(".option-times");
    console.log(arrTimes);
    close.forEach((element) => {
      console.log(element.time);
    });
    close.forEach((b) => {
      arrTimes.forEach((e) => {
        if (b.time == e.value) {
          e.disabled = true;
        }
      });
    });

    let freeArrTimes = [];
    arrTimes.forEach((e) => {
      if (e.disabled == false) {
        freeArrTimes.push(e);
      }
    });
    freeArrTimes[0].selected = true;
  }

  // document.addEventListener("click", async () => {
  //   document.querySelectorAll("[name = date]").forEach((btn) => {
  //     console.log("aaaaaaaaaaaa");
  //     console.log(btn);
  //     btn.addEventListener("click", async () => {
  //       let doctor = specs.value;
  //       let date = document.querySelector("[name = date]:checked").value;
  //       let arr = await getTimeBySpecDate(doctor, date);
  //       console.log("aaaaaaaaaaaa");
  //      tableTimes(arr.free);
  //       // document.querySelector(".times").innerHTML = ""
  //       // document.querySelector(".times").innerHTML = table;
  //       console.log(arr)
  //       let close = arr.close
  //       let times = document.querySelectorAll("[name = time]");
  //       times.forEach(time => {
  //         if(close.includes(time.value)){
  //           time.disabled = true;
  //         }

  //       })
  //     });
  //   });

  // })

  function tableTimes(arrTimeMinMax) {
    let timeStart = arrTimeMinMax.time_start_work;
    let timeEnd = arrTimeMinMax.time_end_work;
    let times = [];
    let t = new Date(`2023-05-10T${timeStart}`);
    console.log(t.toLocaleTimeString());
    // t2 = t
    // t2.setMinutes(t2.getMinutes() + 30);
    // console.log(t2)
    let timesValues = [];
    while (times.length < 16) {
      let t2 = new Date(t);
      t2.setMinutes(t2.getMinutes() + 30);
      let time = `${t.toLocaleTimeString()} - ${t2.toLocaleTimeString()}`;
      times.push(time);
      timesValues.push(t.toLocaleTimeString());
      t.setMinutes(t.getMinutes() + 30);
    }

    console.log(times);
    console.log(timesValues);
    selectTime.innerHTML = "";
    // timesValues.forEach(e => {
    //   selectTime.insertAdjacentHTML("beforeend", `   <option value="${timesValues[0]}">${times[0]}</option>`)
    // })
    for (let i = 0; i < timesValues.length; i++) {
      selectTime.insertAdjacentHTML(
        "beforeend",
        `   <option class="option-times" value="${
          timesValues[i]
        }">${timesValues[i].replace(/(:\d{2}| [AP]M)$/, "")}</option>`
      );
    }
    let arr = document.querySelectorAll(".option-times");
    console.log(arr);

    // return `
    // <table class="table-times" border="3">
    //                     <tbody>
    //                         <tr>
    //                             <td><input class="table-item" name="time" type="radio" value="${timesValues[0]}">${times[0]}</td>
    //                             <td><input class="table-item" name="time" type="radio" value="${timesValues[1]}">${times[1]}</td>
    //                             </tr>
    //                             <tr>
    //                             <td><input class="table-item" name="time" type="radio" value="${timesValues[2]}">${times[2]}</td>
    //                             <td><input class="table-item" name="time" type="radio" value="${timesValues[3]}">${times[3]}</td>
    //                             </tr>
    //                             <tr>
    //                             <td><input class="table-item" name="time" type="radio" value="${timesValues[4]}">${times[4]}</td>
    //                             <td><input class="table-item" name="time" type="radio" value="${timesValues[5]}">${times[5]}</td>
    //                             </tr>
    //                             <tr>
    //                             <td><input class="table-item" name="time" type="radio" value="${timesValues[6]}">${times[6]}</td>
    //                             <td><input class="table-item" name="time" type="radio" value="${timesValues[7]}">${times[7]}</td>
    //                         </tr>
    //                         <tr>
    //                             <td><input class="table-item" name="time" type="radio" value="${timesValues[8]}">${times[8]}</td>
    //                             <td><input class="table-item" name="time" type="radio" value="${timesValues[9]}">${times[9]}</td>
    //                             </tr>
    //                             <tr>
    //                             <td><input class="table-item" name="time" type="radio" value="${timesValues[10]}">${times[10]}</td>
    //                             <td><input class="table-item" name="time" type="radio" value="${timesValues[11]}">${times[11]}</td>
    //                         </tr>
    //                         <tr>
    //                             <td><input class="table-item" name="time" type="radio" value="${timesValues[12]}">${times[12]}</td>
    //                             <td><input class="table-item" name="time" type="radio" value="${timesValues[13]}">${times[13]}</td>
    //                             </tr>
    //                             <tr>
    //                             <td><input class="table-item" name="time" type="radio" value="${timesValues[14]}">${times[14]}</td>
    //                             <td><input class="table-item" name="time" type="radio" value="${timesValues[15]}">${times[15]}</td>
    //                         </tr>
    //                     </tbody>
    //                 </table>

    // `;
  }

  document.addEventListener("click", (event) => {
    console.log("Проверка тута");
    console.log(event.target);
    if (event.target.name == "date") {
      console.log("date");
      OutTimes();
    }
  });
});
