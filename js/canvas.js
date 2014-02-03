var img;

onload = function() {
    draw();
};
function draw() {
  /* canvas要素のノードオブジェクト */
    var canvas = document.getElementById('canvas');
    var canvasWidth = 1000;
    var canvasHeight = 400;
  /* canvas要素の存在チェックとCanvas未対応ブラウザの対処 */
    if ( ! canvas || ! canvas.getContext ) {
	return false;
    }
  /* 2Dコンテキスト */
    var ctx = canvas.getContext('2d');
    
    ctx.fillStyle = 'rgba(255,255,255,0.8)';
    ctx.beginPath();
    ctx.fillRect(0, 0, canvasWidth, canvasHeight);
    ctx.stroke();
    ctx.fillStyle = 'RGB(200, 200, 200)';

    function drawMinPath (pathX, pathColor, minStr) {
	ctx.lineWidth = 0.2; 
	ctx.strokeStyle = "black";
	ctx.beginPath();
	ctx.lineTo(pathX, 0);
	ctx.lineTo(pathX, canvasHeight);
	ctx.lineTo(pathX, 0);
	ctx.closePath();
	ctx.stroke();
	ctx.font = "12px";
	ctx.textAlign = "right";
	ctx.fillText(minStr, pathX - 5, 15);
    }

    drawMinPath(canvasWidth, "red", "0 minute ago");
    drawMinPath(canvasWidth - 100, "red", "10 minutes ago");
    drawMinPath(canvasWidth - 200, "red", "20 minutes ago");
    drawMinPath(canvasWidth - 300, "red", "30 minutes ago");
    drawMinPath(canvasWidth - 600, "red", "60 minutes ago");
    drawMinPath(canvasWidth - 900, "red", "90 minutes ago");
    
    ctx.fillStyle = 'RGB(0,0,0)';
    ctx.strokeStyle = 'RGB(200,200,200)';
    ctx.lineWidth = 1;  
    ctx.font = "9px";
    ctx.textAlign = "center";
    function drawGraph (cw, ch, av, al, pc) {
	var inc = 0;
	ctx.strokeStyle = pc;
	ctx.beginPath();
	ctx.moveTo(cw, ch - (av[0] * 10));
	var inc = 0;
	for (i = cw; i > 0; i = i-10){
	    av[i];
	    if (al > inc) {
		ctx.lineTo(i, ch- (av[inc] * 10));
		if(inc % 5 == 0 || inc == 99) {
		    ctx.fillText(av[inc], i, ch - (av[inc] * 10) -5);
		}
		inc++;
	    }
	}
	ctx.stroke();
    }
    //digital room pir
    drawGraph(canvasWidth,canvasHeight, array_digi_pir, array_digi_pir_length, 'RGB(204,51,51)');
    //digital room temperature
    drawGraph(canvasWidth,canvasHeight, array_digi_temp, 100, 'RGB(51,51,102)');
    //bf wifi clients
    drawGraph(canvasWidth,canvasHeight, array_wifi_bf, 100, 'RGB(51,153,51)');
    //2f wifi clients
    drawGraph(canvasWidth,canvasHeight, array_wifi_twof, 100, 'RGB(102,102,255)');
    //1f wifi clients
    drawGraph(canvasWidth,canvasHeight, array_wifi_digi, 100, 'RGB(153,0,102)');
    //all wifi clients
    drawGraph(canvasWidth,canvasHeight, array_wifi_clients, 100, 'RGB(153,0,102)');

    //export to img
    img=new Image();
    //保存できるタイプは、'image/png'と'image/jpeg'の2種類
    var type = 'image/png';
    //imgオブジェクトのsrcに格納。
    img.src = canvas.toDataURL(type);
}

function graph_to_img(){
  //例：現在のウィンドウに出力。
  location.href = img.src;
}


