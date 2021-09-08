document.getElementById("burger").addEventListener("click", function () {
  document.getElementById("cross").style.display = "block";
  document.getElementById("burger").style.display = "none";
  document.querySelector("header nav").className = "opened";
  document.querySelector("body").style.overflowY = "hidden";
});

document.getElementById("cross").addEventListener("click", function () {
  document.getElementById("cross").style.display = "none";
  document.getElementById("burger").style.display = "block";
  document.querySelector("header nav").className = "";
  document.querySelector("body").style.overflowY = "auto";
});

document.addEventListener("click", (event) => {
  let dropDownPannel = event.target.nextElementSibling;
  document.querySelectorAll(".dropdown-content").forEach((element) => {
    if (element == dropDownPannel) {
      dropDownPannel.classList.contains("open")
        ? dropDownPannel.classList.remove("open")
        : dropDownPannel.classList.add("open");
    } else {
      element.classList.remove("open");
    }
  });
});
