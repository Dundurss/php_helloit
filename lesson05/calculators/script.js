window.onload = function() {
    let button = document.getElementById("basic_rekinat");

    button.onclick = function() {
      let pirmaisskaitlis = parseFloat(document.getElementById("basic_pirmais_skaitlis").value);
      let otraisskaitlis = parseFloat(document.getElementById("basic_otrais_skaitlis").value);

      let summa = pirmaisskaitlis + otraisskaitlis;

      document.getElementById("basic_rezultats").textContent = "Rezultāts: " + summa;
    };
  };