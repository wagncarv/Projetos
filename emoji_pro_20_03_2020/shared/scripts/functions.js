window.onload = function(){

    var container = document.querySelector('.container');
    var tableElement = document.createElement('table');

    var img = new Image();
    img.src = document.querySelector('#sprite').src;

    var imgWidth = img.naturalWidth;
    var imgHeight = img.naturalHeight;

    var xpos = 2;
    var ypos = 0;
    

    var hsize = -imgWidth;
    var vsize = -imgHeight;

    createImage(xpos, ypos, hsize, vsize);

    function createImage(xpos, ypos, hsize, vsize){
        var trElement = document.createElement('tr');
        while(xpos > hsize){
            var tdElement = document.createElement('td');
            var aElement = document.createElement('a');
            var divElement = document.createElement('div');
            divElement.style.backgroundPosition = xpos + "px " + ypos + "px"; 
            divElement.classList.add("image");
            aElement.appendChild(divElement);
            aElement.setAttribute("href", "#");
            tdElement.appendChild(aElement);
            trElement.appendChild(tdElement);
            tableElement.appendChild(trElement);
            container.appendChild(tableElement);
            xpos -= 35;

        }

        if ((vsize - ypos) <= ypos){
            createImage(xpos = 2, ypos -= 35, hsize, vsize);
        }

    }
}
  








    