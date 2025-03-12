window.onload = function() {
    let button = document.getElementById("rekinat");

    button.onclick = function() {
      let pirmaisskaitlis = parseFloat(document.getElementById("pirmais_skaitlis").value);
      let otraisskaitlis = parseFloat(document.getElementById("otrais_skaitlis").value);

      let summa = pirmaisskaitlis + otraisskaitlis;

      document.getElementById("rezultats").textContent = "Resultāts: " + summa;
    };
  };