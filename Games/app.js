//Leaving this for the interactions only!

//Step 4:
//Color selection
//And coordinate alert!
//Using .strip-cell class when clicked to removed the selected class then add the selected color to the selected, then change the actual defined variable



$('.strip-cell').on('click', function(){
    $('.strip-cell').removeClass('selected');
    //adding the other color so that it's now selected (changing the selected class)
    $(this).addClass('selected');

    var newColor = $(this).data('color');

    //Update all currently colored cells
    $('.game-cell').each(function(){
        var hasColor = false;
        var cell = $(this);

        colorOptions.split(' ').forEach(function(c){
            if(cell.hasClass(c)){
                hasColor = true;
            }
        });

        if(hasColor){
            $(this).removeClass(colorOptions).addClass(newColor);
            $(this).css('background-color', newColor);
        }
    });
    
    currentColor = newColor;

});

//Making the alert. on click of the game-cell class
/*
$('#game-grid').on('click', '.game-cell', function(){
    var id = $(this).attr('id');
    var coordinates = id.replace('cell', ''); //replacing it so that it only outputs the numbers
    //columns go from 1-20
    //rows go from one to 20
    //Maybe if statements?

    var row;
    var column;

    if(coordinates.length > 3){

        //so that means it'll be like 1110
        //row 11 col 10

        column = parseInt(coordinates.slice(-2), 10);
        row = parseInt(coordinates.slice(0, -2), 10);

    }else if(coordinates.length === 3){

        //for if the column is 1 digit and the row is 2 digits
        //so 110 could either be row 1 col 10 or row 11 col 0??
        row = parseInt(coordinates.slice(0, 1), 10);
        column = parseInt(coordinates.slice(1), 10);

    }else{

        //this means they're both one digit
        //like 55 would be split between the both
        row = parseInt(coordinates.slice(0, 1), 10);
        column = parseInt(coordinates.slice(1), 10);

    }

    //making an alert that displays
    alert('Row ' + row + ', Col ' + column);
});
*/

//Step 5:
//When they click, the color will come
var colorOptions = 'black red blue yellow green purple orange cyan magenta gray';

function getRowCol(id){
    //Using similar logic as my commented out alert values
    var coordinates = id.replace('cell', '');

    coordinates = id.split('-');

    return {row: parseInt(coordinates[1], 10), col: parseInt(coordinates[2], 10)};

}

/*
 //Adding all the applied changes to the css
    $(this).css('background-color', currentColor);
*/

function applyColor(row, column){
    if(row < 1 || row > 20 || column < 1 || column > 20){
        return; //Can't have any rows or columns out of bounds
    }
    var cell = $('#cell' + '-' + row + '-' + column);

    cell.removeClass(colorOptions).addClass(currentColor);
    //cell.css('background-color', currentColor);
}

function toggleColor(row, col){
    if(row < 1 || row > 20 || col < 1 || col > 20){
        return; //Can't have any rows or columns out of bounds
    }

    var cell = $('#cell' + '-' + row + '-' + col);
    if(cell.hasClass(currentColor)){
        cell.removeClass(colorOptions);
        //it goes white if it already has that color

        cell.css('background-color', ''); //clears the style to show white
    }else{
        //if it's a different color then it'll apply that active color
        cell.removeClass(colorOptions).addClass(currentColor);
        cell.css('background-color', currentColor);
    }
}

$('#game-grid').on('click', '.game-cell', function(){
    var position = getRowCol($(this).attr('id'));

    var ro = position.row;
    var col = position.col;

    toggleColor(ro, col); //on the clicked cell
    toggleColor(ro - 1, col); // then up
    toggleColor(ro + 1, col); // then down
    toggleColor(ro, col -1); // then left
    toggleColor(ro, col + 1); // then right
});

