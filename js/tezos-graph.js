 $(function () {
    let data = {}
    function reqListener() {

    }

    var oReq = new XMLHttpRequest(); // New request object
    oReq.onload = function () {
      d1 = this.responseText;
      makeGraph(d1);
     

    };
    oReq.open("get", "tezos.php", true);
    //                               ^ Don't block the rest of the execution.
    //                                 Don't wait until the request finishes to
    //                                 continue.
    oReq.send();

    function makeGraph(data) {
      data = JSON.parse(data)
      
      var today = new Date()
       var days = 86400000 //number of milliseconds in a day
       var fiveDaysAgo = new Date(today - (100*days))
      var newArray = [];
      for (let k in data.data) {
      
       if(data.data[k].time>fiveDaysAgo){
        newArray.push({ 'x': parseFloat(k), 'y': parseFloat(data.data[k].priceUsd)});
      }}
     
      // Area Chart 
      //         var seriesData = [ ];
      //         var random = new Rickshaw.Fixtures.RandomData(100);
      // console.log(data.data.priceUsd)
      //         for (var i = 0; i < 100; i++) {
      //             seriesData[i].x = data.data.priceUsd;
      //             seriesData[i].y = data.data.time;
      //              //   random.addData(seriesData);
      //         }
      // console.log(seriesData)
      var graph = new Rickshaw.Graph({
        element: document.getElementById("charts-legend"),
        renderer: 'area',
        stack: true,
        width: $("#charts-legend").width(),
        series: [{ color: "#33414E", data: newArray, name: 'Tezos' }
        ]
      });
      graph.render();
    
      var hoverDetail = new Rickshaw.Graph.HoverDetail({
        graph: graph,
        formatter: function (series, x, y) {
           
            date = data.data.filter(
            function(a){ return a.priceUsd.includes(parseFloat(y.toString().slice(0, 7))) ;  }
             )
          $('.rickshaw_graph .detail .x_label').text(new Date(date[0].time).toLocaleString("en-US"))
          var content = series.name + ": $" +y.toFixed(2);
          return content;}
       
      });


      var legend = new Rickshaw.Graph.Legend({ graph: graph, element: document.getElementById('legend') });
      var shelving = new Rickshaw.Graph.Behavior.Series.Toggle({ graph: graph, legend: legend });
      var order = new Rickshaw.Graph.Behavior.Series.Order({ graph: graph, legend: legend });
      var highlight = new Rickshaw.Graph.Behavior.Series.Highlight({ graph: graph, legend: legend });

      var resize = function () {
        graph.configure({
          width: $("#charts-legend").width(),
          height: $("#charts-legend").height()
        });
        graph.render();
      }

      window.addEventListener('resize', resize);
      resize();
    }
    // eof Area Chart 
  });