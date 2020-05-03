//Tamanho de cada emoji
let length = 20;

//Inicialização <canvas>
var canvas = document.querySelector('#canvas');
var ctx = canvas.getContext("2d");
ctx.textAlign = "left";
ctx.fillStyle = "#ffffff";

//Tamanho e altura do <canvas>
let size = canvas.width;
let canvasHeight = canvas.height;

let lines = document.querySelector('#fileToUpload').onchange = function () {
  let file = this.files[0];
  createCanvas(file);
}

/**
 * 
 * @param {*} file 
 */
async function createCanvas(file) {

  const lines = await readFile(file);
  const chunks = chunkArray(lines, Math.pow((size / length), 2));
  for (let i = 0; i < chunks.length; i++) {
    let result = fillCanvas(chunks[i]);
    let suffix = save(i);
    clear();
    saveCSS(result, suffix);

  }
}

/**
 * 
 * @param {*} file 
 */
var readFile = function (file) {
  return new Promise(function (resolve, reject) {
    let reader = new FileReader();
    reader.readAsText(file);

    reader.onload = function (event) {
      console.log(`Total bytes: ${event.total}`);
      resolve(this.result.split('\n'));
    }
  });
}

/**
 * 
 * @param {*} array 
 */
function removeDuplicate(array = []) {
  const newArray = [...new Set(array)];
  return newArray;
}

/**
 * 
 * @param {*} myArray 
 * @param {*} chunk_size 
 */
function chunkArray(myArray, chunk_size) {
  var index = 0;
  var arrayLength = myArray.length;
  var tempArray = [];

  for (index = 0; index < arrayLength; index += chunk_size) {
    myChunk = myArray.slice(index, index + chunk_size);

    tempArray.push(myChunk);
  }
  return tempArray;
}

/**
 * 
 */
function save(data) {
  //Envia imagem para gravação, arquivo save_canvas.php
  var image = canvas.toDataURL("img/png", 1);
  var ajax = new XMLHttpRequest();
  var suffix = `${length}x${length}-${data}`;
  var fileName = `source/Boot/save_canvas.php?suffix=${suffix}`;
  ajax.open("POST", `${fileName}`, true);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.send(`image=${image}`);
  ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      this.responseText;
    }
  };
  return suffix;
}

/**
 * 
 * @param {*} dimensions 
 */
function saveCSS(dimensions, suffix) {
  const ajax = new XMLHttpRequest();
  ajax.open("POST", `source/Boot/save_sprite.php?suffix=${suffix}`, true);
  ajax.setRequestHeader("Content-type", "application/json");
  ajax.send(JSON.stringify(dimensions));
  ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
       this.responseText;
    }
  };
}


/**
 * 
 * @param {*} array 
 */
function fillCanvas(array = []) {
  let positionX = 0;
  let positionY = 20;
  let temp = [];
  let unicode = [];
  let res = [];
  for (let line = 0; line < array.length; line++) {
    ctx.fillText(array[line].split(',')[0], positionX, positionY);
    temp.push(array[line].split(','));
    unicode.push(temp[line][2]);
    res.push(generateJSONObj(length, length, positionX, positionY, unicode[line]));

    if (positionX >= size) {
      positionX = 0;
      positionY += length;
    } else {
      positionX += length;
    }
  }

  return res;
}

/**
 * 
 */
function clear() {
  ctx.beginPath();
  ctx.closePath();
  ctx.clearRect(0, 0, size, canvasHeight);
}

/**
 * 
 * @param {*} height 
 * @param {*} width 
 * @param {*} positionX 
 * @param {*} positionY 
 * @param {*} id 
 * @param {*} url 
 */
function generateJSONObj(height, width, positionX, positionY, id) {
  let icons = `{
    "height": ${height},
    "width": ${width},
    "positionX": ${positionX},
    "positionY": ${positionY},
    "id": "${id}"
  } `;

  return icons;
}

