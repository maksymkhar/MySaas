import Chart from 'chart.js';

export default {
    template: '<canvas height="227" width="510" style="height: 227px; width: 510px;"></canvas>',

    props: ['labels', 'values'],

    ready() {

        var ctx = this.$el.getContext("2d");

        var data = {
            labels: this.labels,
            datasets: [
                {
                    label: "Daily Sales",
                    fillColor: "rgba(255,154,0,0.5)",
                    strokeColor: "rgba(174,104,0,0.8)",
                    highlightFill: "rgba(255,154,0,0.75)",
                    highlightStroke: "rgba(174,104,0,1)",
                    data: this.values
                }
            ]
        };

        var myBarChart = new Chart(ctx).Line(data);
    }
}