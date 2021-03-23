// alert("hello world");

const loginBtn = document.querySelector("#loginBtn");
const registerBtn = document.querySelector("#registerBtn");
const container = document.querySelector(".containa");

registerBtn.addEventListener("click", ()=>{
    container.classList.add("sign-up-mode");
});


loginBtn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});
