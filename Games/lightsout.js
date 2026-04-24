//document.ready(function(){}); runs after everything in the page FULLY loads
//Without it, my data wont be brought to index.php to load.
$(document).ready(function(){
var currentColor = "black"; //step2: variable to track the "active game color" --set to black default

//index.php: (class="strip-cell")
//This is where the color's will be displayed!
$('.strip-cell').each(function(){
    //getting all the colors before dynamically applying them to each choice

    var color = $(this).data('color'); //returns whatever the selected color is so that the blocks (once selected can work)

    //adding the color to the strip-cell class!
    $(this).addClass(color);

    //selectedColor is automatically black (sourced from the canvas image, so if it's black selected again then we have to padd that with an if statement)
    if(color === "black"){
        $(this).addClass("selected"); //Applying this to the selected class to indicate it's the selected/active color
    }
});

//Making the grid!
//index.php: "game-grid div id"
var table = $("#game-grid");

//Step 3:
//adding hte for loops to make the full grid.
//Grid in canvas is 20x20
//each td must have unique id (format): cell + row+ colum
for (var row = 1; row < 21; row++){ //This puts it at 20 after the loop is done
    var tablerow = $("<tr></tr>");

    //another nested loop for the cells in the rows
    for(var column = 1; column < 21; column++){
        var tablecolumn = $("<td></td>"); //this will define the format for each td cell
        tablecolumn.attr("id","cell" + "-" + row + "-" + column); //cell + row+ colum or "cell-13-15" TO HELP WITH READING DATA LATER ON

        tablecolumn.addClass("game-cell");
        tablerow.append(tablecolumn);
    }

    table.append(tablerow);
}

});
