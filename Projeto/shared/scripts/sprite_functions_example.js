//Tamanho de cada emoji
let length = 20;

//Posição de cada emoji
let positionX = length * -1;
let positionY = length;

//Inicialização <canvas>
var canvas = document.querySelector('#canvas');
var ctx = canvas.getContext("2d");
ctx.font = `${length}px Arial`;
ctx.padding = '0px';

//Tamanho e altura do <canvas>
let size = canvas.width;
let canvasHeight = canvas.height;


console.log('início');


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
    fillCanvas(chunks[i])
    save(i, null);
    clear();
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
function save(data, dimension) {
  //Envia imagem para gravação, arquivo save_canvas.php
  var image = canvas.toDataURL("img/png", 1);
  var ajax = new XMLHttpRequest();
  var suffix = `${length}x${length}-${data}`;
  var fileName = `source/Boot/save_canvas.php?suffix=${suffix}`;
  ajax.open("POST", `${fileName}`, true);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.send("image=" + image);
  ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
    }
  };
  return fileName;
}


/**
 * Formata data em [yyy-MM-dd-HH-mm-ss]
 */
function getDate() {
  let d = new Date();
  return `${d.getSeconds()}`;
}

/**
 * 
 * @param {*} array 
 */
function fillCanvas(array = []) {

  positionX = 0;
  positionY = 20;

  for (let line = 0; line < array.length; line++) {
    ctx.fillText(array[line].replace(/\"/g, ""), positionX, positionY);

    if (positionX == 320) {
      positionX = 0;
      positionY += length;
    } else {
      positionX += length;
    }
  }
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
  var data = {
    'icons': []
  };
  data.icons.push(`{
    "height": ${height},
    "width": ${width},
    "positionX": ${positionX},
    "positionY": ${positionY},
    "id": ${id}
  }`);
  console.log(data);
  return JSON.stringify(data);
}

/**
 * Adiciona classes css aos elementos do arquivo sprite
 */
function addClass(element) {
  var classEl = "";
  switch (element.width) {
    case 20:
      classEl += 'emoji x-small';
      break;
    case 32:
      classEl += 'emoji small';
      break;
    case 36:
      classEl += 'emoji medium';
      break;
    case 48:
      classEl += 'emoji large';
      break;
    default:
      classEl += 'emoji';
  }
  return classEl;
}