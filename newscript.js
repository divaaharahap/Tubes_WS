document.addEventListener("DOMContentLoaded", function () {

    var input = document.querySelector("input[name='detail']");
    var table = document.querySelector(".table");
    var rows = table.getElementsByTagName("tr");


    input.addEventListener("keyup", function () {

        var searchTerm = input.value.toLowerCase();


        for (var i = 1; i < rows.length; i++) {
            var row = rows[i];
            var cityNameCell = row.querySelector("td:first-child");
            var cityName = cityNameCell.textContent.toLowerCase();
            var found = cityName.indexOf(searchTerm) > -1;

            row.style.display = found ? "" : "none";
        }
    });
});