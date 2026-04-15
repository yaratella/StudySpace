const display = document.getElementById("display");
const timerDropdown = document.getElementById("timerDropdown");
const timerDisplay = document.getElementById("timerDisplay");
const dropdownContainer = document.getElementById("dropdownContainer");

let timer = null;
let timeLeft = 0;
let totalTime = 0;
let isRunning = false;

function setTimer() {
    const selectedValue = timerDropdown.value;

    if(selectedValue === ''){
        timerDisplay.style.display = "none";
        dropdownContainer.style.display = "flex";
        return;
    }

    totalTime = parseInt(selectedValue);
    timeLeft = totalTime;
    isRunning = false;

    if(timer){
        clearInterval(timer);
    }

    updateDisplay();
    timerDisplay.style.display = "block";
    dropdownContainer.style.display = "flex";
}

function start(){
    if(!isRunning && timeLeft > 0){
        isRunning = true;
        timer = setInterval(countDown, 100); //Call the update function every 100 miliseconds
    }
}

function stop(){
    //Check to see if it's running

    if(isRunning){
        clearInterval(timer); //Stop it from running
        isRunning = false;
    }
}

function reset(){
    //Copy everything we have from when we initially assigned these variables
    clearInterval(timer);
    timeLeft = 0;
    isRunning = false;
    updateDisplay();

    //NEED TO FIGURE OUT A WAY TO SAVE ALL THE TIME THAT PEOPLE STUDIED SO THAT I CAN DISPLAY IT
}

//Rather than adding the time, this time I'll be counting down
function countDown() {
    timeLeft -= 100; //Decrease the time by 100 miliseconds

    if(timeLeft <= 0){
        timeLeft = 0; //Can't go lower than 0
        clearInterval(timer);
        isRunning = false;
        //TIMe is done test: alert("Time's up!");
    }

    updateDisplay();
}

//Updates the display
function updateDisplay(){
    //Converting everything into a readable format
    let totalSeconds = Math.floor(timeLeft / 1000); //for calculating seconds, mins, and hours


    let hours = Math.floor(totalSeconds / 3600);
    let minutes = Math.floor((totalSeconds % 3600) / 60);
    let seconds = Math.floor(totalSeconds %  60);

    //Adding some padding (zeros) by converting into strings
    hours = String(hours).padStart(2,"0");
    minutes = String(minutes).padStart(2,"0");
    seconds = String(seconds).padStart(2,"0");

    display.querySelector('p').textContent = `${hours}:${minutes}:${seconds}`;
}