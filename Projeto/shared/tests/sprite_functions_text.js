//Variáveis usadas pela função loadImage
var input = document.querySelector('#filesToUpload');
var count = 0;

var c = document.getElementById("canvas");
var ctx = c.getContext("2d");
var marginLeft = 0;
var positionY = 0;
var canvasWidth = c.width;
//var emojiHeight =  ;
//var emojiWidth =  ;
var countY = 0;

/**
 * Função responsável por criar as imagens e enviá-las para
 * armazenamento em arquivo.
 */
function loadEmojis() {

    //
    //imageObj.onload = function() {
        var images = ["😄", "😍", "💗"];
        ctx.font = "50px Arial";
        //ctx.drawImage(imageObj, marginLeft, positionY, images[count].width, images[count].height);
        ctx.fillText(images[count], 40, 40);
        //marginLeft += images[count].width;
        marginLeft += images[count];
        count++;
        //countY++;

        if (count < images.length) {
            loadEmojis();

            // if ((countY * imageWidth) >= canvasWidth){
            //     countY = 0;
            //     marginLeft = 0;
            //     positionY += imageHeight  
            // }

        } 
       else {
            console.log("Imagens carregadas");
            //Envia imagem para gravação, arquivo save_canvas.php
            //var image = c.toDataURL("image/png", 1);
            var image = c.toDataURL("text/html", 1);
            var ajax = new XMLHttpRequest();
            //${imageWidth}x${imageWidth}
            ajax.open("POST", `source/Boot/save_canvas.php?width=${getDate()}`, true);
            ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            ajax.send("image=" + image);

            ajax.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                }
            };
        }
    //}
}

/**
 * 
 */
function getDate(){
    let d = new Date();
    return `${d.getFullYear()}-${d.getMonth()}-${d.getDate()}-${d.getHours()}-${d.getMinutes()}-${d.getSeconds()}`;
}

loadEmojis();


