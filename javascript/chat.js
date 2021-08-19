const form = document.querySelector(".typing-area"),
inputField= form.querySelector(".input-field"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chat-box");

form.onsubmit = (e)=>{
  e.preventDefault();
}
sendBtn.onclick = () =>{
  // ajax başlatılıyor
  let xhr = new XMLHttpRequest(); //xml objesi
  xhr.open("POST", "php/insert-chat.php", true);
  xhr.onload = ()=>{
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200){
        inputField.value= "";//mesaj gönderdikten sonra input alanını temizler
        scrollToBottom();
        }
      }
      }


// form verilerini ajaxtan phpye gönderme sanırım 1.07
  let formData = new FormData(form);
  xhr.send(formData);
}

chatBox.onmouseenter = ()=>{
  chatBox.classList.add("active");
}
chatBox.onmouseleave = ()=>{
  chatBox.classList.remove("active");
}

setInterval(()=>{
  // ajax başlatılıyor
  let xhr = new XMLHttpRequest(); //xml objesi
  xhr.open("POST", "php/get-chat.php", true);//get metodu kullanılır çünkü göndermemize ihtiyaç yok
  xhr.onload = ()=>{
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
          chatBox.innerHTML = data;//?
          if(!chatBox.classList.contains("active")){//aktif değilse aşağı kaycak
            scrollToBottom();
          }
      }
    }
  }
    let formData = new FormData(form);
    xhr.send(formData);
  }, 500);//500ms sonra çalışacak
function scrollToBottom(){
  chatBox.scrollTop = chatBox.scrollHeight;//???
}
