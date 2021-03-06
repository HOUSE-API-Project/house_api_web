var img;
var all_wifi_bool = true;
var wifi_twof_bool =true;
var wifi_1f_bool = true;
var wifi_bf_bool = true;
var digi_pir_bool = true;
var digi_temp_bool = true;


onload = function() {
    draw();
};

function draw() {
  /* canvas要素のノードオブジェクト */
    var canvas = document.getElementById('canvas');
    var canvasWidth = 1000;
    var canvasWidthLine = 1000;
    var canvasHeight = 400;
  /* canvas要素の存在チェックとCanvas未対応ブラウザの対処 */
    if ( ! canvas || ! canvas.getContext ) {
	return false;
    }
  /* 2Dコンテキスト */
    var ctx = canvas.getContext('2d');


var loop = function() { 
    ctx.fillStyle = 'rgba(255,255,255,0.8)';
    ctx.beginPath();
    ctx.fillRect(0, 0, canvasWidth * 2, canvasHeight * 2);
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
//フレームレート：６０
//横ピクセル：１０００ｐｘ
//一０分：１００ｐｘ
//１分：１０ｐｘ
//６０秒：１０ｐｘ
//6sec = 1px
//0.6 = 0.1px
    }

    //canvasWidthLine += -0.1;
    if(canvasWidthLine < 990) {
      canvasWidthLine = 1000;
    }
    //ctx.translate(-10, 0);
    if(digi_pir_bool) {
    //digital room pir
    drawGraph(canvasWidthLine,canvasHeight, array_digi_pir, array_digi_pir_length, 'RGB(204,51,51)');
    }
    if(digi_temp_bool) {
    //digital room temperature
    drawGraph(canvasWidthLine,canvasHeight, array_digi_temp, 100, 'RGB(51,51,102)');
    }
    if(wifi_bf_bool) {
    //bf wifi clients
    drawGraph(canvasWidthLine,canvasHeight, array_wifi_bf, 100, 'RGB(51,153,51)');
    }
    if(wifi_twof_bool) {
    //2f wifi clients
    drawGraph(canvasWidthLine,canvasHeight, array_wifi_twof, 100, 'RGB(102,102,255)');
    }
    if(wifi_1f_bool) {
    //1f wifi clients
    drawGraph(canvasWidthLine,canvasHeight, array_wifi_digi, 100, 'RGB(153,0,102)');
    }
    if(all_wifi_bool) {
    //all wifi clients
    drawGraph(canvasWidthLine,canvasHeight, array_wifi_clients, 100, 'RGB(153,0,102)');
    }

    
    setTimeout(loop, 600);
   };

     // 初期起動
     loop();

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


