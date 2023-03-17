var modal = document.getElementById("myModal");

var btn = document.getElementById("myBtn");

btn.onclick = function() {
  modal.style.display = "block";
}

modal.onclick = function() {
  modal.style.display = "none";
}
