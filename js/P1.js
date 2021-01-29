const inputs = document.querySelectorAll(".value");
const clearBtn = document.querySelector(".btn-clear");

clearBtn.addEventListener("click", () => {
  for (let i = 0; i < inputs.length; ++i) {
    inputs[i].value = "";
  }
});
