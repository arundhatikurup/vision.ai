$(document).ready(function(){
  $.ajax({
    url: "http://localhost:82/final/search.php",
    method: "GET",
    success: function(data) {
      console.log(data);
      var timestamp = [];
      var score = [];

      for(var i in data) {
        timestamp.push(data[i].timestamp);
        score.push(data[i].score);
      }

      var chartdata = {
        labels: timestamp,
        datasets : [
          {
            label: 'Anomaly Score',
            backgroundColor: 'rgba(200, 200, 200, 0.75)',
            borderColor: 'rgba(200, 200, 200, 0.75)',
            hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
            hoverBorderColor: 'rgba(200, 200, 200, 1)',
            data: score
          }
        ]
      };

      var ctx = $("#mycanvas");

      var barGraph = new Chart(ctx, {
        type: 'bar',
        data: chartdata
      });
    },
    error: function(data) {
      console.log(data);

    }
  });
});