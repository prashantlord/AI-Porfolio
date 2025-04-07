let Ebtn1 = document.getElementById("btn1");
let Ebtn2 = document.getElementById("btn2");
let Ebtn3 = document.getElementById("btn3");
let Ebtn4 = document.getElementById("btn4");
let Ebtn5 = document.getElementById("btn5");
let Ebtn6 = document.getElementById("btn6");
let Ebtn7 = document.getElementById("btn7");
let Ebtn8 = document.getElementById("btn8");
let Ebtn9 = document.getElementById("btn9");

let Eturn = document.getElementById("turn");
let Ereset = document.getElementById("reset");

globalVar = 0;
Abtn = [Ebtn1, Ebtn2, Ebtn3, Ebtn4, Ebtn5, Ebtn6, Ebtn7, Ebtn8, Ebtn9];
EAbtn = [];

Ereset.onclick = () => resetFn();

Ebtn1.onclick = () => changer(1 - 1);
Ebtn2.onclick = () => changer(2 - 1);
Ebtn3.onclick = () => changer(3 - 1);
Ebtn4.onclick = () => changer(4 - 1);
Ebtn5.onclick = () => changer(5 - 1);
Ebtn6.onclick = () => changer(6 - 1);
Ebtn7.onclick = () => changer(7 - 1);
Ebtn8.onclick = () => changer(8 - 1);
Ebtn9.onclick = () => changer(9 - 1);

function changer(n) {
  // console.log(n);
  if (Abtn[n].value == 100) {
    if (globalVar % 2 == 0) {
      Eturn.innerHTML = "Turn: X";
      Abtn[n].innerHTML = "O";
      Abtn[n].value = 1;
      globalVar += 1;
      let champ = Ewin(Abtn[n].value);
        
        
     
    } else {
      Eturn.innerHTML = "Turn: O";
      Abtn[n].innerHTML = "X";
      Abtn[n].value = 2;
      globalVar += 1;

    let champ = Ewin(Abtn[n].value);
     
    }
  } else {
    console.log("error");
  }
}

function Ewin(a) {
  if (
    (Abtn[0].value == 1 && Abtn[1].value == 1 && Abtn[2].value == 1) ||
    (Abtn[3].value == 1 && Abtn[4].value == 1 && Abtn[5].value == 1) ||
    (Abtn[6].value == 1 && Abtn[7].value == 1 && Abtn[8].value == 1) ||
    (Abtn[0].value == 1 && Abtn[3].value == 1 && Abtn[6].value == 1) ||
    (Abtn[1].value == 1 && Abtn[4].value == 1 && Abtn[7].value == 1) ||
    (Abtn[2].value == 1 && Abtn[5].value == 1 && Abtn[8].value == 1) ||
    (Abtn[0].value == 1 && Abtn[4].value == 1 && Abtn[8].value == 1) ||
    (Abtn[2].value == 1 && Abtn[4].value == 1 && Abtn[6].value == 1)
  ) {
    EDwin("X");
  } else if (
    (Abtn[0].value == 2 && Abtn[3].value == 2 && Abtn[6].value == 2) ||
    (Abtn[1].value == 2 && Abtn[4].value == 2 && Abtn[7].value == 2) ||
    (Abtn[2].value == 2 && Abtn[5].value == 2 && Abtn[8].value == 2) ||
    (Abtn[0].value == 2 && Abtn[1].value == 2 && Abtn[2].value == 2) ||
    (Abtn[3].value == 2 && Abtn[4].value == 2 && Abtn[5].value == 2) ||
    (Abtn[6].value == 2 && Abtn[7].value == 2 && Abtn[8].value == 2) ||
    (Abtn[0].value == 2 && Abtn[4].value == 2 && Abtn[8].value == 2) ||
    (Abtn[2].value == 2 && Abtn[4].value == 2 && Abtn[6].value == 2)
  ) {
    EDwin("O");
  } else {
    EDwin(true);
  }
}

function EDwin(champ) {

  if (champ == "O") {
    console.log("X wins");
  resetFn("X");
  } else if (champ == "X") {
    console.log("O wins");
    resetFn("O");
  } else if (globalVar == 10) {
    console.log("Draw");
    resetFn("L");
  }
}

function resetFn(win){
  
    for (item in Abtn) {
      Abtn[item].innerHTML = " ";
      Abtn[item].value = 100;
      EAbtn.push(100);
      globalVar = 1;
      if(win == "X") Eturn.innerHTML = "X wins";
      else if(win == "O") Eturn.innerHTML = "O wins";
      else if(win == "L") Eturn.innerHTML = "Draw";

      // Abtn.forEach(btn => btn.innerHTML = " ");
    }
  };
