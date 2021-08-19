const form = document.querySelector(".login form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-txt");

form.onsubmit = (e)=>{
  e.preventDefault();
}

continueBtn.onclick = ()=>{
  // ajax başlatılıyor
  let xhr = new XMLHttpRequest(); //xml objesi
  xhr.open("POST", "php/login.php", true);
  xhr.onload = ()=>{
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        console.log(data);
        if (data== "başarılı") {
          location.href = "users.php";
        }else {
          errorText.textContent = data;//1.26
          errorText.style.display = "block";///????

        }
      }
      }
    }

// form verilerini ajaxtan phpye gönderme sanırım 1.07
  let formData = new FormData(form);
  xhr.send(formData);
}
