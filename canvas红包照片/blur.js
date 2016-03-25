
var canvasWidth = 800;
var canvasHeight = 600;

var canvas = document.getElementById("canvas");
var context = canvas.getContext("2d");

canvas.width = canvasWidth;
canvas.height = canvasHeight;

var radius = 80;
var clipRegion = {x:400,y:200,r:80};//剪辑区域对象
var image = new Image();
image.src = "1.jpg";
//因为图片可能比较大，等待加载完了再运行逻辑
image.onload = function(e){
    initCanvas();
}

function initCanvas(){
    clipRegion = {  x:Math.random()*(canvas.width-2*radius)+radius,
                    y:Math.random()*(canvas.height-2*radius)+radius,r:radius};
    draw(image,clipRegion);
}

//绘制剪辑区域
function setClipRegion(clipRegion){
    context.beginPath();
    context.arc(clipRegion.x,clipRegion.y,clipRegion.r,0,Math.PI*2,false);
    context.clip();
}
function draw(image,clipRegion){
    context.clearRect(0,0,canvas.width,canvas.height);
    context.save();
    setClipRegion(clipRegion);
    context.drawImage(image,0,0,canvas.width,canvas.height);
    context.restore();
}

function reset(){
    initCanvas();
}

function show(){
    clipRegion.r = 1000;
    draw(image,clipRegion);
}