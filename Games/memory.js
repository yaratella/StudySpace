/*
document.querySelectorAll(".front-image").forEach(img => {
    console.log(img.src, img.naturalWidth);
});
*/

const gridContainer = document.querySelector(".grid-container");
let cards = []; //cards will be saved onto an array
let firstCard, secondCard; //defining these to see if they match in the future
let lockBoard = false;
let score = 0; //start off with o, the score goes up as you miss matching the cards

document.querySelector(".score").textContent = score;

fetch("./data/cards.json")
//fetching all of the possible card outcomes
  .then((res) => res.json())
  .then((data) => {
    cards = [...data, ...data];
    shuffleCards(); //automatically shuffling the cards as the user resets everything
    generateCards(); //after shuffling the cards, the cards will be generated
  });



function shuffleCards() {
  let currentIndex = cards.length, //however long the array is
    randomIndex,
    temporaryValue;
  while (currentIndex !== 0) {
    //random index for the cards
    randomIndex = Math.floor(Math.random() * currentIndex);
    currentIndex -= 1;
    temporaryValue = cards[currentIndex]; //making a temporary value to hold the card at the current index
    cards[currentIndex] = cards[randomIndex];
    cards[randomIndex] = temporaryValue;
  }
}

function generateCards() {
  for (let card of cards) {
    const cardElement = document.createElement("div");
    cardElement.classList.add("card");
    cardElement.setAttribute("data-name", card.name);
    cardElement.innerHTML = `
      <div class="front">
        <img class="front-image" src="${card.image}" />
      </div>
      <div class="back"></div>
    `;
    //interface adds a node to the end of the list of children of a specified parent node.
    gridContainer.appendChild(cardElement);
    //adds the event click to flip the card and reveal what image it has
    cardElement.addEventListener("click", flipCard);
  }
}

function flipCard() {
  if (lockBoard) return;
  if (this === firstCard) return; //basically if the two cards are matching

  this.classList.add("flipped");

  if (!firstCard) {
    firstCard = this;
    return;
  }

  secondCard = this;
  score++; //if they dont match then the score will go up
  document.querySelector(".score").textContent = score;
  lockBoard = true;

  checkForMatch(); //after the cards are flipped then the system will check to see if they're matching
}

function checkForMatch() {

  let isMatch = firstCard.dataset.name === secondCard.dataset.name; //if they're matching then their defined name has to be the same

  isMatch ? disableCards() : unflipCards(); //if it's not matching the cards will be unflipped again by disabling the event listener that they have
}

function disableCards() {
  firstCard.removeEventListener("click", flipCard);
  secondCard.removeEventListener("click", flipCard);

  //board will be reset (unless the values are matching)
  resetBoard();
}

function unflipCards() {
  setTimeout(() => {
    firstCard.classList.remove("flipped");
    secondCard.classList.remove("flipped");
    resetBoard();
  }, 1000);
}

function resetBoard() {
  firstCard = null;
  secondCard = null;
  lockBoard = false;
}

function restart() {
  resetBoard();
  shuffleCards(); //restarting the game (when clicked by user) will then shuffle the cards again so that they'll be at random placees
  score = 0;
  document.querySelector(".score").textContent = score;
  gridContainer.innerHTML = "";
  generateCards(); //cards will be outputted again
}