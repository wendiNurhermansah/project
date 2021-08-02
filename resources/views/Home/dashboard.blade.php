@extends('layouts.main')
@section('title', 'Dashboard')

@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-box"></i>
                        Dashboard
                    </h4>
                </div>
            </div>
        </div>
    </header>
<div class="container-fluid relative animatedParent animateOnce">
    <div class="tab-content pb-3" id="v-pills-tabContent">
        <div class="tab-pane animated fadeInUpShort show active" id="v-pills-1">

            {{-- COUNT --}}
            <div class="row mt-2 mb-4" style="height: 100%">

                <div class="col-md-3" style="cursor:pointer">
                    <div class="counter-box white r-5 p-3" style="height: 110%">
                        <div class="p-4">
                            <div class="float-right">
                                <span class="icon icon-users  s-48"></span>
                            </div>
                            <div class="counter-title"><strong>Jumlah Anggota</strong></div>
                            <h5 class="sc-counter mt-3">2000</h5>
                            <div class="counter-title">Anggota</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" style="cursor:pointer">
                    <div class="counter-box white r-5 p-3"  style="height: 110%">
                        <div class="p-4">
                            <div class="float-right">
                                <span class="icon icon-arrow-circle-o-up  s-48"></span>
                            </div>
                            <div class="counter-title"><strong>Pengeluaran</strong></div>
                            <h5 class="sc-counter mt-3">1000</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" style="cursor:pointer">
                    <div class="counter-box white r-5 p-3"  style="height: 110%">
                        <div class="p-4">
                            <div class="float-right">
                                <span class="icon icon-arrow-circle-o-down  s-48"></span>
                            </div>
                            <div class="counter-title"><strong>Pemasukan</strong></div>
                            <h5 class="sc-counter mt-3">1000</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" style="cursor:pointer">
                    <div class="counter-box white r-5 p-3"  style="height: 110%">
                        <div class="p-4">
                            <div class="float-right">
                                <span class="icon icon-money  s-48"></span>
                            </div>
                            <div class="counter-title"><strong>Saldo</strong></div>
                            <h5 class="sc-counter mt-3">1000</h5
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="d-flex row row-eq-height my-3">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header white">
                <div class="row justify-content-end">
                    <div class="center">
                        <h2>Grafik Pemasukan per Bulan</h2>
                    </div>

                </div>
            </div>
            <div class="card-body no-p">
                <canvas id="shadowChart" width="600" height="300" style="background-color:rgb(182, 202, 69)"></canvas>
                <script>
                    $(function(){
                        'use strict';
                        let draw = Chart.controllers.line.prototype.draw;
                        Chart.controllers.line = Chart.controllers.line.extend({
                            draw: function() {
                                draw.apply(this, arguments);
                                let ctx = this.chart.chart.ctx;
                                let _stroke = ctx.stroke;
                                ctx.stroke = function() {
                                    ctx.save();
                                    ctx.shadowColor = '#E56590';
                                    ctx.shadowBlur = 10;
                                    ctx.shadowOffsetX = 0;
                                    ctx.shadowOffsetY = 4;
                                    _stroke.apply(this, arguments)
                                    ctx.restore();
                                }
                            }
                        });

                        let ctx = document.getElementById("shadowChart").getContext('2d');
                        let myChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: ["January", "February", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September",
                                        "Oktober", "November", "Desember"],
                                datasets: [{
                                    label: "My First dataset",
                                    data: [65, 59, 80, 81, 56, 55, 40, 30, 70, 80, 100, 20],
                                    borderColor: '#ffb88c',
                                    pointBackgroundColor: "#fff",
                                    pointBorderColor: "#ffb88c",
                                    pointHoverBackgroundColor: "#ffb88c",
                                    pointHoverBorderColor: "#fff",
                                    pointRadius: 4,
                                    pointHoverRadius: 4,
                                    fill: false
                                }]
                            }
                        });
                    });
                </script>
            </div>
        </div>

    </div>
    <div class="col-md-4">
        <div class="white">
            <div class="card">
                <div class="card-header bg-primary text-white b-b-light">
                   <div class="center">
                       <H2>KALENDER</H2>
                   </div>
                </div>
                <div class="card-body no-p">
                    <div>
                        <div class="container-fluid relative animatedParent animateOnce p-0">
                            <div class="white " style="min-height:100px; max-height: 80vh;overflow:auto;border:none">
                                <div class="table-responsive" style="padding-right:5px;min-height:350px">
                                    <div id='calendar'></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')

@endsection
