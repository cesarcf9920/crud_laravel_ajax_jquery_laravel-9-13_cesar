  //Create horizontalBar plug-in for ChartJS
    var originalLineDraw = Chart.controllers.horizontalBar.prototype.draw;
    Chart.helpers.extend(Chart.controllers.horizontalBar.prototype, {
  
        draw: function () {
            originalLineDraw.apply(this, arguments);

            var chart = this.chart;
            var ctx = chart.chart.ctx;

            var arr = chart.config.options.lineVertical;
            var top = chart.config.options.lineVertical.top ? chart.config.options.lineVertical.top : 0;
            $.each(arr.index, function(indx, value){
                    var xaxis = chart.scales['x-axis-0'];
                    var yaxis = chart.scales['y-axis-0'];

                    var x1 = xaxis.getPixelForValue(value);                       
                    var y1 = top;                                                   

                    var x2 = xaxis.getPixelForValue(value);                       
                    var y2 = yaxis.height+top;                                        
                    
                    var color = '';
                    if (arr.color[indx] !== undefined) {
                        color = arr.color[indx];
                    }
 
                    ctx.save();
                    ctx.beginPath();
                    ctx.moveTo(x1, y1);
                    ctx.strokeStyle = color ? color : 'gray';
                    ctx.lineTo(x2, y2);
                    ctx.stroke();
            });
            
        }
  });
