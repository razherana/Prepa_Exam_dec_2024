const moveButton = document.getElementById("button1");
const moveButton2 = document.getElementById("button2");
const myDiv = document.getElementById("contentDate");
const div = myDiv.querySelectorAll("button");
const divs = div.length;

let currentPosition = 0; // Position initiale
let indice = 0;

moveButton.addEventListener("click", () => {
  if (currentPosition >= 200) {
    currentPosition -= 200;
    indice -= 1;
  }
  indice += 1;
  currentPosition += 200; // Ajouter 200px à chaque clic
  myDiv.style.transform = `translateX(${currentPosition}px)`; // Appliquer la transformation
  div.forEach((Element) => {
    if (Element.classList.contains("actif")) {
      Element.classList.remove("actif");
    }
  });
  if (indice - 1 < 0) {
    indice *= 1;
  }
  div[indice * -1 + 1].classList.add("actif");
});

moveButton2.addEventListener("click", () => {
  if (divs * -200 + 400 >= currentPosition) {
    currentPosition += 200;
    indice += 1;
  }
  indice -= 1;
  currentPosition -= 200; // Ajouter 200px à chaque clic
  myDiv.style.transform = `translateX(${currentPosition}px)`; // Appliquer la transformation
  div.forEach((Element) => {
    if (Element.classList.contains("actif")) {
      Element.classList.remove("actif");
    }
  });
  div[indice * -1 + 1].classList.add("actif");
});

function getJour(nbr) {
  const jour = document.getElementById("jour");
  jour.style.transform = "translateX(-" + nbr + "%)";
}
