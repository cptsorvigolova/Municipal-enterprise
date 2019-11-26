var size = 90;
var offset = (100-size)/2;
var show = 1;
var active = false;
var blockHeight = 100;
var blocksTop = 0;

class Block{
	constructor(id, isLeft){
		this.flag = false;
		this.position = show-size;
		this.height = blockHeight;
		this.font_size = 21;
	}
}
class Pulse{
	constructor(width){
		this.active = false;
		this.width = width;
		this.defaultSize = width;
	}
}
var objects = new Map();
var blocks = document.getElementsByClassName('block');
for (var i = 0; i <blocks.length; i++) {
	objects.set(blocks[i], new Block(i));
	blocks[i].style.position = 'fixed';
	if($(blocks[i]).hasClass('left'))
		blocks[i].style.left = show-size + '%';
	else
		blocks[i].style.right = show-size + '%';
	blocks[i].style.height = blockHeight + 'px';
	blocks[i].style.width = size+'%';
	blocks[i].style.fontSize = 21+'px';
	blocks[i].style.top = blocksTop + 'px';	
	blocksTop+=blockHeight*1.5;
	blocks[i].style.textAlign='left';
	blocks[i].addEventListener('mouseover',moveRL, false);
	blocks[i].addEventListener('mouseout',moveRL, false);
}
var pulses = new Map();
blocks = document.getElementsByClassName('pulse');
for (var i = 0; i <blocks.length; i++) {
	blocks[i].style.width='400px';
	blocks[i].style.height = '400px';
	blocks[i].style.position = 'absolute';
	blocks[i].style.marginLeft = parseInt(document.documentElement.clientWidth)/2-200+'px';
	blocks[i].style.marginTop = parseInt(blocks[i].parentNode.style.height)/2-200+'px';
	pulses.set(blocks[i], new Pulse(400));
	blocks[i].addEventListener('mouseover',pulse, false);
	blocks[i].addEventListener('mouseout',stopPulse, false);
}

function moveRL(event){
	objects.get(event.target).flag=!objects.get(event.target).flag;
	move(event.target);
}

function move(object){
	let start = Date.now(); 
	let timer = setInterval(function(){
		let timePassed = Date.now() - start;
		let speed = 20;
		let heiCoeff = 6;
		let fontCoeff = 0.5;
		objects.get(object).position += objects.get(object).flag ? (offset - objects.get(object).position)/speed :(show-size - objects.get(object).position)/speed;
		objects.get(object).height += objects.get(object).flag ? heiCoeff*(offset - objects.get(object).position)/speed :heiCoeff*(show-size - objects.get(object).position)/speed;
		objects.get(object).font_size += objects.get(object).flag ? fontCoeff*(offset - objects.get(object).position)/speed :fontCoeff*(show-size - objects.get(object).position)/speed;
		if (objects.get(object).position >= offset-1 || objects.get(object).position < show-size){
			clearInterval(timer); 
			objects.get(object).position = objects.get(object).position > show-size/2 ? offset : show-size;
			return;
		}
		draw(objects.get(object).position, objects.get(object).height, objects.get(object).font_size, object);
	},10);
}
function stopPulse(){
	pulses.get(event.target).active = false;
}
function pulse(){
	let object = event.target;
	let start = Date.now();
	let flag = true;
	pulses.get(object).active = true;		
	let scale = 20;
	let defaultSize = parseInt(object.style.width);
	let timer = setInterval(function(){
		let timePassed = Date.now() - start;
		if (!pulses.get(object).active){
			clearInterval(timer); 
			return;
		}		
		pulses.get(object).width += flag ? (pulses.get(object).width % (pulses.get(object).defaultSize)+1) / scale : -(pulses.get(object).defaultSize - pulses.get(object).width % (pulses.get(object).defaultSize)+1) / scale;
		if(pulses.get(object).width > pulses.get(object).defaultSize*1.2 || pulses.get(object).width < pulses.get(object).defaultSize)
			flag=!flag;
		drawpulse(pulses.get(object).width, object);
	},25);
}
function drawpulse(width, object) {
	object.style.marginLeft = parseInt(document.documentElement.clientWidth-width) / 2+'px';
	object.style.marginTop = parseInt(600-width) / 2+'px';
	object.style.width = width + 'px';	
	object.style.height = width + 'px';
}
function draw(pos, height, font_size, object) {
	if($(object).hasClass('left'))
		object.style.left = pos>0?'0%':pos + '%';	
	else
		object.style.right = pos>0?'0%':pos + '%';
	object.style.height = blockHeight<height?height:blockHeight + 'px';
	object.style.fontSize = font_size + 'px';
}
	
