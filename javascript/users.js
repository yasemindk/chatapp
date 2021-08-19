const searchBar = document.querySelector(".users .search input"),
searchBtn = document.querySelector(".users .search button"),
usersList = document.querySelector(".users .users-list");


searchBtn.onclick = ()=>{
  searchBar.classList.toggle("active");
  searchBar.focus();
  searchBtn.classList.toggle("active");
  searchBar.value = "";
}

searchBar.onkeyup = ()=>{
  let searchTerm = searchBar.value;
  if(searchTerm != ""){
    searchBar.classList.add("active");
  }else {
    searchBar.classList.remove("active");
  }///????1.56
  // ajax başlatılıyor
  let xhr = new XMLHttpRequest(); //xml objesi
  xhr.open("POST", "php/search.php", true);//get metodu kullanılır çünkü göndermemize ihtiyaç yok
  xhr.onload = ()=>{
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        usersList.innerHTML = data;

      }
      }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchTerm);//aramayı ajax ile php ye gönderme
}

setInterval(()=>{
  // ajax başlatılıyor
  let xhr = new XMLHttpRequest(); //xml objesi
  xhr.open("GET", "php/users.php", true);//get metodu kullanılır çünkü göndermemize ihtiyaç yok
  xhr.onload = ()=>{
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if (!searchBar.classList.contains("active")){//??
          usersList.innerHTML = data;//?
        }

      }
      }
    }
    xhr.send();
}, 500);//500ms sonra çalışacak
