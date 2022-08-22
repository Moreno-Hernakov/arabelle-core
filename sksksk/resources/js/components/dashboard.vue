<template>
    <div class="row">
        <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="panel panel-primary text-center no-boder bg-color-green">
                <div class="panel-body">
                    <i class="fa fa-heart fa-5x"></i>
                    <h3>8,457</h3>
                </div>
                <div class="panel-footer back-footer-green">
                    Likes

                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="panel panel-primary text-center no-boder bg-color-blue">
                <div class="panel-body">
                    <i class="fas fa-user fa-5x"></i>
                    <h3>52,160 </h3>
                </div>
                <div class="panel-footer back-footer-blue">
                    Users

                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="panel panel-primary text-center no-boder bg-color-red">
                <div class="panel-body">
                    <i class="fa fa fa-comments fa-5x"></i>
                    <h3>15,823 </h3>
                </div>
                <div class="panel-footer back-footer-red">
                    Comments

                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="panel panel-primary text-center no-boder bg-color-brown">
                <div class="panel-body">
                    <i class="fa fa-camera fa-5x"></i>
                    <h3>36,752 </h3>
                </div>
                <div class="panel-footer back-footer-brown">
                    Posts

                </div>
            </div>
        </div>
        <div class="row"> 
            <div class="col-md-9 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Bar Chart Example
                    </div>
                    <div class="panel-body">
                        <div id="morris-bar-chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Donut Chart Example
                    </div>
                    <div class="panel-body">
                        <div id="morris-donut-chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</template>

<script>
    export default {
        mounted() {
            console.log('Halaman Dashboard')
        }
    }
</script>