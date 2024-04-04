<div class="card">
    <div class="font-weight-bolder text-info text-gradiend">Reports</div>
</div>
<div class="card-body">
    <div class="chart">
        <div class="chartjs-size-monitor-expand">
            <div class=""></div>
        </div>
        <div class="chartjs-size-monitor-shrink">
        <div class=""></div>
        </div>
    </div>
    <canvas id="orders" style="min-height: 450px; height: 458px; max-height: 458px; max-width:100%; display:block; width: 634px;"
     width="634" height="258" class=""chartjs-render-monitor>   
    </canvas>

</div>
<script>

    $(document).ready(function (){
        $.getJSON('/api/orders', function (result){
            var labels = result.map(function (e){
                return e.datum;
            });
            var dataValues = result.map(function (e){
                return e.ukupna_cena;
            });
            var graph = $("#orders").get(0).getContext('2d');

            createGraph(dataValues, labels, graph, "", "Izvestaj o narudzbenicama", "line");
        });
    });

    function createGraph(dataValues, labels, graph, dataSetLabel, reportLabel, type){
        new Chart(graph, {
            type: type,
            data: {
                labels: labels,
                datasets:[{
                    data:dataValues,
                    label: dataSetLabel,
                    backgroundColor: 'rgb(173, 5, 5)',
                    borderColor: 'rgb(173, 5, 5)',
                    fill:false
                }]
            },
            options:{
                title: {
                    display: true,
                    text: reportLabel
                },
                scales:{
                    yAxes: [{
                        ticks: {
                            max:700,
                            min: 0,
                        }
                    }]
                },
                legend: {
                    display: true
                }
            }
        });

    }
</script>