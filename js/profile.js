function skill_radar(profile_id) {
  $.ajax({
    type: "POST",
    url: "../js/ajax/skill_info.php",
    data: {userid : profile_id},
    success: function(returnData){
      var skills = returnData.split(",");
      skill=skills[0].split(" ");
      skill_rate=skills[1].split(" ");
      var ctx = document.getElementById("myChart");
      var myRadarChart = new Chart(ctx, {
        type: 'radar',
        data : {
          labels: skill,
          datasets: [
            {
              label: "Mes compétences",
              backgroundColor: "rgba(179,181,198,0.2)",
              borderColor: "rgba(179,181,198,1)",
              pointBackgroundColor: "rgba(179,181,198,1)",
              pointBorderColor: "#fff",
              pointHoverBackgroundColor: "#fff",
              pointHoverBorderColor: "rgba(179,181,198,1)",
              data: skill_rate
            }],
          },
          options: {
            scale: {
              reverse: false,
              ticks: {
                beginAtZero: true,
                max: 5,
              }
            },
            legend: {
              display: false,
            }
          }
        });
      },
      error : function(returnData) {
        console.log("error");
      }
    });
}
function viewProfile (formId) {
  document.getElementById("profile_id" + formId).submit();
}
