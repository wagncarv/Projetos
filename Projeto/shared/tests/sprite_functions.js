//Variáveis usadas pela função loadImage
var images = document.getElementsByTagName("img") || [];

var input = document.querySelector('#filesToUpload');
var count = 0;

var c = document.getElementById("canvas");
var ctx = c.getContext("2d");
var marginLeft = 0;
var positionY = 0;
var canvasWidth = c.width;
var imageHeight =  images[count].height;
var imageWidth =  images[count].width;
var countY = 0;

/**
 * Função responsável por criar as imagens e enviá-las para
 * armazenamento em arquivo.
 */
function loadImage() {
    var imageObj = new Image();
    imageObj.src = images[count].src;

    //Cria imagens uma a uma e as adiciona ao array
    imageObj.onload = function() {
        ctx.drawImage(imageObj, marginLeft, positionY, images[count].width, images[count].height);
        marginLeft += images[count].width;
        count++;
        countY++;

        if (count < images.length) {
           loadImage();

            if ((countY * imageWidth) >= canvasWidth){
                countY = 0;
                marginLeft = 0;
                positionY += imageHeight  
            }
        } 
       else {
            console.log("Imagens carregadas");
            //Envia imagem para gravação, arquivo save_canvas.php
            var image = c.toDataURL("image/png", 1);
            var ajax = new XMLHttpRequest();
            var suffix = `${imageWidth}x${imageWidth}-${getDate()}`;
            ajax.open("POST", `source/Boot/save_canvas.php?suffix=${suffix}`, true);
            ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            ajax.send("image=" + image);

            ajax.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                }
            };
        }
    }
}

/**
 * Adiciona classes css aos elementos do arquivo sprite
 */
function addClass(element, container){
    switch(element.width){
        case 20:
            container.classList.add('emoji', 'x-small');
            break;
        case 32:
            container.classList.add('emoji', 'small');
            break;
        case 36:
            container.classList.add('emoji', 'medium');
            break;
        case 48:
            container.classList.add('emoji', 'large');
            break;
        default:
            container.classList.add('emoji');
    }
}

/**
 * Retorna data yyyy-MM-dd HH-mm-ss em formato String
 * Esta função é utilizada para gerar um identificador único para
 * cada arquivo sprite css gerado.
 */
function getDate(){
    let d = new Date();
    return `${d.getFullYear()}-${d.getMonth()}-${d.getDate()}-${d.getHours()}-${d.getMinutes()}-${d.getSeconds()}`;
}

loadImage();


