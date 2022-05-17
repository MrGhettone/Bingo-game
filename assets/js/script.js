let select = document.querySelector("#bet-select");
let colCartel1 = document.querySelectorAll(".num-1-9");
let colCartel2 = document.querySelectorAll(".num-10-19");
let colCartel3 = document.querySelectorAll(".num-20-29");
let colCartel4 = document.querySelectorAll(".num-30-39");
let colCartel5 = document.querySelectorAll(".num-40-49");
let colCartel6 = document.querySelectorAll(".num-50-59");
let colCartel7 = document.querySelectorAll(".num-60-69");
let colCartel8 = document.querySelectorAll(".num-70-79");
let colCartel9 = document.querySelectorAll(".num-80-90");
let rowCartel1 = document.querySelector(".rowcartel1");
let rowCartel2 = document.querySelector(".rowcartel2");
let rowCartel3 = document.querySelector(".rowcartel3");
let allNumCartel = document.querySelectorAll(".num-cartel");
let balance = parseInt(document.getElementById("balance").innerText);
let intervalCartel = "";
let index2 = 0;
let numCartel = [];
let row1 = 0;
let row2 = 0;
let row3 = 0;
let cartelempty = true;
let extractionStart = false;
let playerWin = false;
let newBalance = 0;
let winningBalance = 0;
let index = 0;
let stopNumber = "";
let extractedNum = [];
let bet = 0;
let numMetch = [];
let multiplyer = 0;

function betSelect() {
  if(!isNaN(select.value)) {
    return select.value;
  }
  return null;
}

function clearcartel() {
  for (let i = 0; i < 3; i++) {
    if(colCartel1[i] != ""){
      colCartel1[i].innerHTML = "";
      colCartel1[i].style.backgroundColor = "";
      let p = createPEmpty();
      colCartel1[i].appendChild(p);
    }
    if(colCartel2[i] != ""){
      colCartel2[i].innerHTML = "";
      colCartel2[i].style.backgroundColor = "";
      let p = createPEmpty();
      colCartel2[i].appendChild(p);
    }
    if(colCartel3[i] != ""){
      colCartel3[i].innerHTML = "";
      colCartel3[i].style.backgroundColor = "";
      let p = createPEmpty();
      colCartel3[i].appendChild(p);
    }
    if(colCartel4[i] != ""){
      colCartel4[i].innerHTML = "";
      colCartel4[i].style.backgroundColor = "";
      let p = createPEmpty();
      colCartel4[i].appendChild(p);
    }
    if(colCartel5[i] != ""){
      colCartel5[i].innerHTML = "";
      colCartel5[i].style.backgroundColor = "";
      let p = createPEmpty();
      colCartel5[i].appendChild(p);
    }
    if(colCartel6[i] != ""){
      colCartel6[i].innerHTML = "";
      colCartel6[i].style.backgroundColor = "";
      let p = createPEmpty();
      colCartel6[i].appendChild(p);
    }
    if(colCartel7[i] != ""){
      colCartel7[i].innerHTML = "";
      colCartel7[i].style.backgroundColor = "";
      let p = createPEmpty();
      colCartel7[i].appendChild(p);
    }
    if(colCartel8[i] != ""){
      colCartel8[i].innerHTML = "";
      colCartel8[i].style.backgroundColor = "";
      let p = createPEmpty();
      colCartel8[i].appendChild(p);
    }
    if(colCartel9[i] != ""){
      colCartel9[i].innerHTML = "";
      colCartel9[i].style.backgroundColor = "";
      let p = createPEmpty();
      colCartel9[i].appendChild(p);
    }
  }
  if(extractionStart == false) {
    intervalCartel = "";
    index2 = 0;
    numCartel = [];
    row1 = 0;
    row2 = 0;
    row3 = 0;
    cartelempty = true;
    intervalCartel = setInterval(getSize, 10);
  }
}

function createPEmpty() {
  let p = document.createElement("p");
  p.classList.add("m-0");
  p.classList.add("text-center");
  p.classList.add("hidden");
  p.innerText = "xx";
  return p;
}

function generateNum() {
  if(extractionStart != true) {
    if(betSelect() != null){
      if(balance > 0) {
        if(bet == 0) {
          bet = betSelect();
          balance -= bet;
          document.getElementById("balance").innerText = balance + ".00 €";
        }
        clearcartel();
      } else {
        alert("saldo insuficente!!");
      }
    } else {
      alert("devi prima selezionare una puntata!!")
    }
  }
}

function getSize() {
  index2++;
  if(index2 >= 16) {
    clearInterval(intervalCartel);
    cartelempty = false;
  }
  let numCart = randomNumCartel();
  if(numCart == 0) numCart = 1;
  if(!numCartel.includes(numCart)) {
    if(numCart >= 1 && numCart <=9) {
      if(checkNum(colCartel1, numCart)) {
        printNum(numCart, 1);
      } else {
        return null;
      }
    }
    if(numCart >= 10 && numCart <=19) {
      if(checkNum(colCartel2, numCart)) {
        printNum(numCart, 3);
      } else {
        return null;
      }
    }
    if(numCart >= 20 && numCart <=29) {
      if(checkNum(colCartel3, numCart)) {
        printNum(numCart, 5);
      } else {
        return null;
      }
    }
    if(numCart >= 30 && numCart <=39) {
      if(checkNum(colCartel4, numCart)) {
        printNum(numCart, 7);
      } else {
        return null;
      }
    }
    if(numCart >= 40 && numCart <=49) {
      if(checkNum(colCartel5, numCart)) {
        printNum(numCart, 9);
      } else {
        return null;
      }
    }
    if(numCart >= 50 && numCart <=59) {
      if(checkNum(colCartel6, numCart)) {
        printNum(numCart, 11);
      } else {
        return null;
      }
    }
    if(numCart >= 60 && numCart <=69) {
      if(checkNum(colCartel7, numCart)) {
        printNum(numCart, 13);
      } else {
        return null;
      }
    }
    if(numCart >= 70 && numCart <=79) {
      if(checkNum(colCartel8, numCart)) {
        printNum(numCart, 15);
      } else {
        return null;
      }
    }
    if(numCart >= 80 && numCart <=90) {
      if(checkNum(colCartel9, numCart)) {
        printNum(numCart, 17);
      } else {
        return null;
      }
    }
  } else {
    --index2;
  }
}

function checkNum(cartel, num) {
  for (let i = 0; i < cartel.length; i++) {
    if(parseInt(cartel[i].childNodes[0].innerText) == num) {
      --index2;
      return false;
    }
  }
  return true;
}

function printNum(num, i) {
  if(rowCartel1.childNodes[i].childNodes[0].innerText == "" && row1 < 5) {
    rowCartel1.childNodes[i].innerHTML = "";
    let p = createP(num);
    rowCartel1.childNodes[i].appendChild(p);
    row1++;
    numCartel.push(num);
  } else if(rowCartel2.childNodes[i].childNodes[0].innerText == "" && row2 < 5) {
    rowCartel2.childNodes[i].innerHTML = "";
    let p = createP(num);
    rowCartel2.childNodes[i].appendChild(p);
    row2++;
    numCartel.push(num);
  } else if(rowCartel3.childNodes[i].childNodes[0].innerText == "" && row3 < 5) {
    rowCartel3.childNodes[i].innerHTML = "";
    let p = createP(num);
    rowCartel3.childNodes[i].appendChild(p);
    row3++;
    numCartel.push(num);
  } else {
    --index2;
  }
}

function createP(num) {
  let p = document.createElement("p");
  p.classList.add("m-0");
  p.classList.add("text-center");
  p.innerText = num;
  return p;
}

function randomNumCartel() {
  return Math.ceil(Math.random() * 90);
}

// estrazione numeri tabellone

function randomNumber(){
  index++;
  if (index >= 30){
    clearInterval(stopNumber);
    index = 0;
    checkWin();
  }
  let numberGenerator = Math.ceil(Math.random() * 90);
  if(!extractedNum.includes(numberGenerator) && numberGenerator != 0){
    checkNumExatracted(numberGenerator);
    extractedNum.push(numberGenerator);
    let div = document.getElementById(numberGenerator);
    div.classList.add("green");
  } else {
    --index;
  }
}

function luckyNumber(int){
  if(betSelect() != null && cartelempty == false) {
    if(extractionStart != true) {
      stopNumber = setInterval(randomNumber, int);
      extractionStart = true;
    } else {
      alert("hai gia estratto i numeri!!");
    }
  } else {
    alert("seleziona quanto vuoi puntare in alto a destra e genera una cartella!!")
  }
}

function checkNumExatracted(num) {
  for (let i = 0; i < allNumCartel.length; i++) {
    if(allNumCartel[i].childNodes[0].innerText == num) {
      allNumCartel[i].style = "background-color: green;";
      numMetch.push(num);
    }
  }
}

function checkWin() {
  let numRow1 = 0;
  let numRow2 = 0;
  let numRow3 = 0;
  for (let i = 0; i < numMetch.length; i++) {
    if(rowCartel1.childNodes[1].childNodes[0].innerText == numMetch[i] || rowCartel1.childNodes[3].childNodes[0].innerText == numMetch[i] || rowCartel1.childNodes[5].childNodes[0].innerText == numMetch[i] || rowCartel1.childNodes[7].childNodes[0].innerText == numMetch[i] || rowCartel1.childNodes[9].childNodes[0].innerText == numMetch[i] || rowCartel1.childNodes[11].childNodes[0].innerText == numMetch[i] || rowCartel1.childNodes[13].childNodes[0].innerText == numMetch[i] || rowCartel1.childNodes[15].childNodes[0].innerText == numMetch[i] || rowCartel1.childNodes[17].childNodes[0].innerText == numMetch[i]) {
      numRow1++;
    } else if(rowCartel2.childNodes[1].childNodes[0].innerText == numMetch[i] || rowCartel2.childNodes[3].childNodes[0].innerText == numMetch[i] || rowCartel2.childNodes[5].childNodes[0].innerText == numMetch[i] || rowCartel2.childNodes[7].childNodes[0].innerText == numMetch[i] || rowCartel2.childNodes[9].childNodes[0].innerText == numMetch[i] || rowCartel2.childNodes[11].childNodes[0].innerText == numMetch[i] || rowCartel2.childNodes[13].childNodes[0].innerText == numMetch[i] || rowCartel2.childNodes[15].childNodes[0].innerText == numMetch[i] || rowCartel2.childNodes[17].childNodes[0].innerText == numMetch[i]) {
      numRow2++;
    } else if(rowCartel3.childNodes[1].childNodes[0].innerText == numMetch[i] || rowCartel3.childNodes[3].childNodes[0].innerText == numMetch[i] || rowCartel3.childNodes[5].childNodes[0].innerText == numMetch[i] || rowCartel3.childNodes[7].childNodes[0].innerText == numMetch[i] || rowCartel3.childNodes[9].childNodes[0].innerText == numMetch[i] || rowCartel3.childNodes[11].childNodes[0].innerText == numMetch[i] || rowCartel3.childNodes[13].childNodes[0].innerText == numMetch[i] || rowCartel3.childNodes[15].childNodes[0].innerText == numMetch[i] || rowCartel3.childNodes[17].childNodes[0].innerText == numMetch[i]) {
      numRow3++;
    }
  }
  if(numRow1 == 5 && numRow2 == 5 && numRow3 == 5) {
    multiplyer = 25;
  } else if(numRow1 == 5 || numRow2 == 5 || numRow3 == 5) {
    multiplyer = 5;
  } else if(numRow1 == 4 || numRow2 == 4 || numRow3 == 4) {
    multiplyer = 3;
  } else if(numRow1 == 3 || numRow2 == 3 || numRow3 == 3) {
    multiplyer = 2;
  }
  if (multiplyer >= 2) {
    win();
    playerWin = true;
  } else {
    loose();
  }
}

function win() {
  winningBalance = bet * multiplyer;
  newBalance = balance + winningBalance;
  document.getElementById("balance").innerText = newBalance + ".00 €";
  
  setTimeout(conclusion,2000);
  updateDB();
}

function loose() {
  newBalance = balance;
  document.getElementById("balance").innerText = newBalance + ".00 €";
  setTimeout(conclusion,2000);
  updateDB();
}

function conclusion() {
  if (playerWin == true) {
    alert("hai vinto " + winningBalance +".00 € premi ok per rigiocare di nuovo");
  } else {
    alert("hai perso fallito " + bet +".00 € premi ok per rigiocare di nuovo");
  }
  clearcartel();
  resetTable();
  resetData();
}

function resetData() {
  intervalCartel = "";
  index2 = 0;
  numCartel = [];
  row1 = 0;
  row2 = 0;
  row3 = 0;
  cartelempty = true;
  extractionStart = false;
  index = 0;
  stopNumber = "";
  extractedNum = [];
  bet = 0;
  multiplyer = 0;
  numMetch = [];
  playerWin = false;
  newBalance = 0;
  balance = parseInt(document.getElementById("balance").innerText);
  winningBalance = 0;
}

function resetTable() {
  let tabelNum = document.querySelectorAll(".colmd");
  for (let i = 0; i < tabelNum.length; i++) {
    tabelNum[i].classList.remove("green");   
  }
}

function updateDB() {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "updatedb.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onload = function () {
    console.log(this.responseText); // Stampa la risposta del server
  };
  let content = "balance=" + newBalance +"&bet=" + bet + "&win=" + winningBalance;
  xhr.send(content);
}

let response;
let tbody = document.getElementById("modal");

function history() {
  let xhr = new XMLHttpRequest();   
  xhr.open("POST", "gethistory.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onload = function () {
    response = this.responseText;
    response = JSON.parse(response);
    tdCreator();
  };
  xhr.send();
}

function tdCreator() {
  response.forEach(element => {
    let tr = document.createElement("tr");
    let td1 = document.createElement("td");
    let td2 = document.createElement("td");
    let td3 = document.createElement("td");

    td1.innerText = element.created_at;
    td2.innerText = element.bet;
    td3.innerText = element.win;

    tr.appendChild(td1);
    tr.appendChild(td2);
    tr.appendChild(td3);
    tbody.appendChild(tr);
  });
}