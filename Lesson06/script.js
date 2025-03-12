window.onload = function () 
{
    let range = document.getElementById("age_range");
    range.oninput = function (){
        document.getElementById("range_val").innerText = document.getElementById("age_range").value;

    }

}
