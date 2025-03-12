window.onload = function () 
{
    let range = document.getElementById("range_age");
    range.oninput = function (){
        document.getElementById("range_val").innerText = range.value

    }

}
