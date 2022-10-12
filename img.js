///* 
// * To change this license header, choose License Headers in Project Properties.
// * To change this template file, choose Tools | Templates
// * and open the template in the editor.
// */
var data = document.getElementById("aasksfot_embed_script").getAttribute("data-name");
var res = data.split("\*");
var host=res[0];
var id=res[1];
//alert(id);
//alert(name);
function show_image() {

    var img = document.getElementById("img");
//    img.src = json.img;
//    img.alt = json.title;
    
    img.className = "center ri";
    //document.body.appendChild(img);
//    var mydiv = document.getElementById("span");
//    var aTag = document.createElement('a');
//    aTag.setAttribute('href', json.url);
//    aTag.setAttribute('target', '_blank');
//    aTag.innerText = "Tahaan Pest Solution";
//    mydiv.appendChild(aTag);

}
function loadjscssfile(filename, filetype) {
    if (filetype == "js") { //if filename is a external JavaScript file
        var fileref = document.createElement('script')
        fileref.setAttribute("type", "text/javascript")
        fileref.setAttribute("src", filename)
    }
    else if (filetype == "css") { //if filename is an external CSS file
        var fileref = document.createElement("link")
        fileref.setAttribute("rel", "stylesheet")
        fileref.setAttribute("type", "text/css")
        fileref.setAttribute("href", filename)
    }
    if (typeof fileref != "undefined")
        document.getElementsByTagName("head")[0].appendChild(fileref)
}
function loadImage()
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //console.log(this.responseText);
            var obj = JSON.parse(this.responseText);
            show_image(obj);
        }
    };
    xhttp.open("POST", "http://pest.lcl/?r=C_GetBlog&id=" + id, true);
    xhttp.send();
}
//loadImage();
show_image();
loadjscssfile(host+"mystyle.css", "css"); ////dynamically load and add this .css file