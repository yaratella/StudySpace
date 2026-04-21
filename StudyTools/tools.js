//selecting all of the documen's elements

const container = document.querySelector(".container");
const addQuestionCard = document.getElementById("add-question-card");
const cardButton = document.getElementById("save-btn");
const question = document.getElementById("question");
const answer = document.getElementById("answer");
const errorMessage = document.getElementById("error");
const addQuestion = document.getElementById("add-flashcard");
const closeBtn = document.getElementById("close-btn");

//Initializing all of the variables
let editBool = false;
let originalID = null;
let flashcards = JSON.parse(localStorage.getItem('flashcards')) || [];

//how the user will add the questions

addQuestion.addEventListener("click", () =>{
    //if they click on add question then it will show the add question card and hide the full container
    container.classList.add("hide");
    question.value = "";
    answer.value = "";
    addQuestionCard.classList.remove("hide");
});

closeBtn.addEventListener("click", () =>{
    //if they click on close button then it will show the full container and hide the add question card
    container.classList.remove("hide");
    addQuestionCard.classList.add("hide");
    if(editBool){
        editBool = false;
    }
});

cardButton.addEventListener("click", () =>{
    //save the flashcard
    let tempQuestion = question.value.trim();
    let tempAnswer = answer.value.trim();
    if(!tempQuestion || !tempAnswer){
        //display the error message if a question or answer is empty
        errorMessage.classList.remove("hide");
    }else{
        if(editBool){
            //if the user is editing an existing flashcard, remove the original flashcard from the array
            flashcards = flashcards.filter(flashcard => flashcard.id !== originalID);
        }

        let id = Date.now();

        //add the new flashcard into the array
        flashcards.push({id, question: tempQuestion, answer: tempAnswer});

        //save the flashcards array to local storage (MIGHT: change this later so that it saves all data into the database)
        localStorage.setItem('flashcards', JSON.stringify(flashcards));
        container.classList.remove("hide");
        errorMessage.classList.add("hide");
        viewList();
        //reseting all of the values
        question.value = "";
        answer.value = "";
        editBool = false;
        addQuestionCard.classList.add("hide");
    }
});

//Now to display the whole flashcard list

function viewList(){
    const listCard = document.querySelector(".card-list-container");
    listCard.innerHTML = '';
    flashcards = JSON.parse(localStorage.getItem('flashcards')) || [];
    flashcards.forEach(flashcard => {
        const div = document.createElement("div");
        div.classList.add("card");
        div.innerHTML = `
        <p class="question-div">${flashcard.question}</p>
        <p class="answer-div hide">${flashcard.answer}</p>
        <a href="#" class="show-hide-btn">Show/Hide</a>
        <div class="buttons-con">
            <button class="edit"><i class="fa-solid fa-pen-to-square"></i></button>
            <button class="delete"><i class="fa-solid fa-trash-can"></i></button>
        </div>
        `;
        div.setAttribute('data-id', flashcard.id);

        const displayAnswer = div.querySelector(".answer-div");
        const showHideBtn =  div.querySelector(".show-hide-btn");
        const editButton = div.querySelector(".edit");
        const deleteButton = div.querySelector(".delete");

        showHideBtn.addEventListener("click", () => {
            //toggle the visibility of the answer
            displayAnswer.classList.toggle("hide");
        });

        editButton.addEventListener("click", () => {
            //Allow user to edit and add a question card
            editBool = true;
            modifyElement(editButton, true);
            addQuestionCard.classList.remove("hide");
        });

        deleteButton.addEventListener("click", () => {
            //delete the flashcard
            modifyElement(deleteButton);
        });

        listCard.appendChild(div);
    });
}

//Now to modify a flashcard element

const modifyElement = (element, edit = false) => {
  const parentDiv = element.parentElement.parentElement;
  const id = Number(parentDiv.getAttribute('data-id'));
  const parentQuestion = parentDiv.querySelector(".question-div").innerText;
  if (edit) {
    const parentAns = parentDiv.querySelector(".answer-div").innerText;
    answer.value = parentAns;
    question.value = parentQuestion;
    originalID = id;
    disableButtons(true);
  } else {
    // Remove the flashcard from the array and update local storage
    flashcards = flashcards.filter(flashcard => flashcard.id !== id);
    localStorage.setItem('flashcards', JSON.stringify(flashcards));
  }
  parentDiv.remove();
};

//Now to disable edit buttons

const disableButtons = (value) => {
    const editButtons = document.getElementsByClassName("edit");
    Array.from(editButtons).forEach((element) => {
        element.disabled = value;
    });
};

//Adding an event listener to display the flashcard list with the DOM is loaded
document.addEventListener("DOMContentLoaded", viewList);