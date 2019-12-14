<script>
import { Bar, mixins } from 'vue-chartjs'
const { reactiveProp } = mixins
const moment = require('jalali-moment');
import shared from '../../../shared';

export default {
  extends: Bar,
  mixins: [reactiveProp],
  data() {
    return {
			options: {
				scales: {
					xAxes: [{
						type: 'time',
            distribution: 'linear',
            time: {
              unit: 'day',
              displayFormats: {
                day: 'MMM D'
              },
            },
						ticks: {
							source: 'data',
              autoSkip: true,
            },
					}],
					yAxes: [{
						scaleLabel: {
							display: true,
							labelString: 'جمع پرداختی'
						}
					}]
				},
				tooltips: {
					intersect: false,
					mode: 'index',
					callbacks: {
            title: function(tooltipItem, data) {
              //console.log(tooltipItem[0].index);
							return shared.constructor(moment(data.datasets[0].data[tooltipItem[0].index].t).locale('fa').format('YYYY/MM/DD'));
						},
						label: function(tooltipItem, data) {
							var label = data.datasets[tooltipItem.datasetIndex].label || '';
							if (label) {
								label += ': ';
							}
							label += parseInt(tooltipItem.yLabel);
							return label;
						}
					}
				}
      }
    }
  },
  mounted () {
    // this.chartData is created in the mixin.
    // If you want to pass options please create a local options object
    this.renderChart(this.chartData, this.options)
  }
}
</script>

<style>
</style>